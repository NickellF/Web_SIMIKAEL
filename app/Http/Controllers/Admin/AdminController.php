<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\AjuanPkl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Dashboard Admin
    public function dashboard()
    {
        $data = [
            'total_siswa' => Siswa::count(),
            'total_industri' => Industri::count(),
            'total_guru' => Guru::count(),
            'total_pengajuan' => AjuanPkl::count(),
            'pengajuan_pending' => AjuanPkl::where('status', 'pending')->count()
        ];

        return view('admin.dashboard', $data);
    }

    // Manajemen Siswa
    public function siswaIndex()
{
    $siswa = Siswa::with(['users' => function($query) {
        $query->select('id_user', 'username', 'role');
    }])->paginate(10);

    return view('admin.siswa.index', compact('siswa'));
}

    public function siswaCreate()
    {
        return view('admin.siswa.create');
    }

    public function siswaStore(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nis' => 'required|unique:siswa,nis',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
            'username' => 'required|unique:users,username', // Perbaiki nama tabel
            'password' => 'required|min:6'
        ]);

        // Buat user baru
        $user = User::create([ 
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => 'siswa'
        ]);

        Siswa::create([
            'nama_siswa' => $validated['nama_siswa'],
            'nis' => $validated['nis'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
            'id_user' => $user->id_user
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    // Tambahkan method edit, update, dan destroy
    public function siswaEdit(Siswa $siswa)
    {
        $siswa->load('users');
        return view('admin.siswa.edit', compact('siswa'));
    }
    public function siswaUpdate(Request $request, Siswa $siswa)
    {
        $user = $siswa->user ?? User::where('id_user', $siswa->id_user)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:100',
            'nis' => 'required|unique:siswa,nis,' . $siswa->id_siswa . ',id_siswa',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
            'username' => 'required|unique:users,username,' . $user->id_user . ',id_user',
            'password' => 'nullable|min:6'
        ]);

        $siswa->users->update([
            'username' => $validated['username'],
            'password' => !empty($validated['password']) 
                ? Hash::make($validated['password']) 
                : $siswa->users->password
        ]);

        $siswa->update([
            'nama_siswa' => $validated['nama_siswa'],
            'nis' => $validated['nis'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan']
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil diperbarui');
    }

    public function siswaDestroy(Siswa $siswa)
    {
        // Hapus relasi pengajuan PKL
        $siswa->ajuanPkl()->delete();
        
        // Hapus user terkait
        $siswa->users()->delete();
        
        // Hapus siswa
        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }

    // Manajemen Industri
    public function industriIndex()
    {
        $industri = Industri::paginate(10);
        return view('admin.industri.index', compact('industri'));
    }

    public function industriCreate()
    {
        return view('admin.industri.create');
    }

    public function industriStore(Request $request)
    {
        $validated = $request->validate([
            'nama_industri' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:50'
        ]);

        Industri::create($validated);

        return redirect()->route('admin.industri.index')
            ->with('success', 'Industri berhasil ditambahkan');
    }

    // Manajemen Guru
    public function guruIndex()
    {
        $guru = Guru::paginate(10);
        return view('admin.guru.index', compact('guru'));
    }

    public function guruCreate()
    {
        return view('admin.guru.create');
    }

    public function guruStore(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip' => 'required|unique:guru,nip',
            'bidang' => 'required|string|max:50'
        ]);

        Guru::create($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Guru berhasil ditambahkan');
    }
    public function guruEdit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }


    public function guruUpdate(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:100',
            'nip' => 'required|unique:guru,nip,' . $guru->id_guru . ',id_guru',
            'bidang' => 'required|string|max:50'
        ]);

        $guru->update($validated);

        return redirect()->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diperbarui');
    }

    public function guruDestroy(Guru $guru)
    {
        try {
            $guru->delete();

            return redirect()->route('admin.guru.index')
                ->with('success', 'Guru berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.guru.index')
                ->with('error', 'Gagal menghapus guru. Pastikan tidak ada data terkait.');
        }
    }

    public function pengajuanIndex()
{
    
    $pengajuan = AjuanPkl::with(['siswa', 'industri'])
        ->latest()
        ->paginate(5);

    return view('admin.pengajuan.index', compact('pengajuan'));
}

public function updatePengajuanStatus(Request $request, $id)
{
    // Validasi status yang diperbolehkan
    $validated = $request->validate([
        'status' => 'required|in:pending,disetujui,ditolak'
    ]);

    // Cari pengajuan yang dimaksud
    $pengajuan = AjuanPkl::findOrFail($id);

    // Cek apakah status sudah diubah sebelumnya
    if ($pengajuan->status == $validated['status']) {
        return redirect()->route('admin.pengajuan.index')
            ->with('error', 'Status sudah sama, tidak perlu diubah');
    }
    $pengajuan->status = $validated['status'];
    $pengajuan->save();

    // Kirim notifikasi berdasarkan status
    switch ($validated['status']) {
        case 'disetujui':
            // Logika tambahan jika diperlukan, misal:
            // - Kirim email ke siswa
            // - Catat log persetujuan
            $message = 'Pengajuan PKL berhasil disetujui';
            break;
        
        case 'ditolak':
            // Logika tambahan untuk penolakan
            // - Kirim alasan penolakan
            // - Beri kesempatan pengajuan ulang
            $message = 'Pengajuan PKL ditolak';
            break;
        
        default:
            $message = 'Status pengajuan diperbarui';
    }

    return redirect()->route('admin.pengajuan.index')
        ->with('success', $message);
}

public function detailPengajuan($id)
{
    $pengajuan = AjuanPkl::with(['siswa', 'industri', 'siswa.user'])
        ->findOrFail($id);

    return view('admin.pengajuan.detail', compact('pengajuan'));
}

public function filterPengajuan(Request $request)
{
    $query = AjuanPkl::with(['siswa', 'industri']);
    if ($request->has('status') && $request->status != '') {
        $query->where('status', $request->status);
    }
    if ($request->has('industri') && $request->industri != '') {
        $query->whereHas('industri', function($q) use ($request) {
            $q->where('id_industri', $request->industri);
        });
    }
    if ($request->has('tanggal_mulai') && $request->tanggal_mulai != '') {
        $query->whereDate('tanggal_mulai', '>=', $request->tanggal_mulai);
    }
    if ($request->has('tanggal_selesai') && $request->tanggal_selesai != '') {
        $query->whereDate('tanggal_selesai', '<=', $request->tanggal_selesai);
    }
    $pengajuan = $query->latest()->paginate(10);
    return view('admin.pengajuan.index', compact('pengajuan'));
}
}