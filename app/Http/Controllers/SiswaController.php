<?php

namespace App\Http\Controllers;

use App\Models\AjuanPkl;
use App\Models\Industri;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
   protected function getSiswaId()
   {
       $user = Auth::user();
       if (!$user) {
           throw new \Exception('Pengguna tidak terautentikasi');
       }

       $siswa = $user->siswa;
       if (!$siswa) {
           throw new \Exception('Data siswa tidak ditemukan untuk pengguna ini');
       }
       
       return $siswa->id_siswa;
   }
   
   public function index()
   {
       $siswa = Siswa::with('users')->latest()->paginate(10);
       return view('admin.siswa.index', compact('siswa'));
   }

   public function store(Request $request) 
   {
       $validated = $request->validate([
           'nama_siswa' => 'required|string|max:100',
           'nis' => 'required|string|max:20|unique:siswa',
           'kelas' => 'required|string|max:20',
           'jurusan' => 'required|string|max:50',
           'username' => 'required|string|max:50|unique:users',
           'password' => 'required|string|min:6'
       ]);

       $users = User::create([
           'username' => $validated['username'],
           'password' => Hash::make($validated['password']),
           'role' => 'siswa'
       ]);

       $siswa = $users->siswa()->create([
           'nama_siswa' => $validated['nama_siswa'],
           'nis' => $validated['nis'],
           'kelas' => $validated['kelas'],
           'jurusan' => $validated['jurusan']
       ]);

       return response()->json(['message' => 'Data siswa berhasil ditambahkan']);
   }

   public function show(Siswa $siswa)
   {
       $siswa->load('user');
       return response()->json($siswa);
   }

   public function update(Request $request, Siswa $siswa)
   {
       $validated = $request->validate([
           'nama_siswa' => 'required|string|max:100',
           'nis' => 'required|string|max:20|unique:siswa,nis,'.$siswa->id_siswa.',id_siswa',
           'kelas' => 'required|string|max:20',
           'jurusan' => 'required|string|max:50',
           'username' => 'required|string|max:50|unique:users,username,'.$siswa->user->id_user.',id_user',
           'password' => 'nullable|string|min:6'
       ]);

       $siswa->update([
           'nama_siswa' => $validated['nama_siswa'],
           'nis' => $validated['nis'],
           'kelas' => $validated['kelas'],
           'jurusan' => $validated['jurusan']
       ]);

       $userData = ['username' => $validated['username']];
       if(!empty($validated['password'])) {
           $userData['password'] = Hash::make($validated['password']);
       }
       
       $siswa->user()->update($userData);

       return response()->json(['message' => 'Data siswa berhasil diupdate']);
   }

   public function destroy(Siswa $siswa)
   {
       $user = $siswa->user;
       $siswa->delete();
       $user->delete();
       
       return response()->json(['message' => 'Data siswa berhasil dihapus']);
   }

   public function dashboard()
   {
       $id_siswa = $this->getSiswaId();
       
       $data = [
           'pengajuan_aktif' => AjuanPkl::with(['industri'])
               ->where('id_siswa', $id_siswa)
               ->whereIn('status', ['pending', 'disetujui'])
               ->first(),
           'total_pengajuan' => AjuanPkl::where('id_siswa', $id_siswa)->count(),
           'pengajuan_disetujui' => AjuanPkl::where('id_siswa', $id_siswa)
               ->where('status', 'disetujui')
               ->count(),
           'pengajuan_ditolak' => AjuanPkl::where('id_siswa', $id_siswa)
               ->where('status', 'ditolak')
               ->count(),
           'riwayat_pengajuan' => AjuanPkl::with(['industri'])
               ->where('id_siswa', $id_siswa)
               ->latest()
               ->take(5)
               ->get()
       ];

       return view('siswa.dashboard', $data);
   }

   public function pengajuanIndex()
   {
       $pengajuan = AjuanPkl::with('industri')
           ->where('id_siswa', $this->getSiswaId())
           ->latest()
           ->paginate(10);
       
       return view('siswa.pengajuan.index', compact('pengajuan'));
   }

   public function pengajuanCreate()
   {
       $industri = Industri::all();
       return view('siswa.pengajuan.create', compact('industri'));
   }

   public function pengajuanStore(Request $request)
   {
       $validated = $request->validate([
           'id_industri' => 'required|exists:industri,id_industri',
           'tanggal_mulai' => 'required|date',
           'tanggal_selesai' => 'required|date|after:tanggal_mulai'
       ]);

       $validated['id_siswa'] = $this->getSiswaId();
       $validated['status'] = 'pending';
       $validated['tanggal_pengajuan'] = now();

       AjuanPkl::create($validated);

       return redirect()->route('siswa.pengajuan.index')
           ->with('success', 'Pengajuan PKL berhasil dibuat');
   }

   public function statusPengajuan()
   {
       $pengajuan = AjuanPkl::with('industri')
           ->where('id_siswa', $this->getSiswaId())
           ->latest()
           ->get();

       return view('siswa.pengajuan.status', compact('pengajuan'));
   }

   public function cetakPengajuan(AjuanPkl $ajuanPkl)
   {
       if($ajuanPkl->id_siswa != $this->getSiswaId()) {
           return redirect()->back()->with('error', 'Anda tidak memiliki akses');
       }

       if($ajuanPkl->status != 'disetujui') {
           return redirect()->back()->with('error', 'Pengajuan belum disetujui');
       }

       $pdf = PDF::loadView('siswa.pengajuan.cetak', compact('ajuanPkl'));
       return $pdf->download('pengajuan_pkl.pdf');
   }
}