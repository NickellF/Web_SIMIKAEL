<?php

namespace App\Http\Controllers;

use App\Models\AjuanPkl;
use App\Models\Industri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AjuanPklController extends Controller
{
    public function index()
    {
        $pengajuan = AjuanPkl::with(['siswa', 'industri'])
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->latest()
            ->paginate(10);
            
        return view('pengajuan.index', compact('pengajuan'));
    }

    public function create()
    {
        $industri = Industri::all();
        return view('pengajuan.create', compact('industri'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_industri' => 'required|exists:industri,id_industri',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai'
        ]);

        $validated['id_siswa'] = Auth::user()->siswa->id_siswa;
        $validated['status'] = 'pending';
        $validated['tanggal_pengajuan'] = now();

        AjuanPkl::create($validated);

        return redirect()->route('siswa.pengajuan.index')
            ->with('success', 'Pengajuan berhasil dibuat');
    }

    public function show(AjuanPkl $ajuanPkl)
    {
        $ajuanPkl->load(['siswa', 'industri']);
        return response()->json($ajuanPkl);
    }

    public function updateStatus(Request $request, AjuanPkl $ajuanPkl)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak'
        ]);

        $ajuanPkl->update([
            'status' => $request->status
        ]);

        return response()->json(['message' => 'Status pengajuan berhasil diupdate']);
    }

    public function guruIndex()
    {
        $pengajuan = AjuanPkl::with(['siswa', 'industri'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(5);

        return view('guru.pengajuan.index', compact('pengajuan'));
    }

    public function adminIndex()
    {
        $pengajuan = AjuanPkl::with(['siswa', 'industri'])
            ->latest()
            ->paginate(5);

        return view('admin.pengajuan.index', compact('pengajuan'));
    }

    public function status()
    {
        $pengajuan_aktif = AjuanPkl::with(['industri'])
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->whereIn('status', ['pending', 'disetujui'])
            ->first();

        $riwayat_pengajuan = AjuanPkl::with(['industri'])
            ->where('id_siswa', Auth::user()->siswa->id_siswa)
            ->latest()
            ->get();

        return view('siswa.pengajuan.status', compact('pengajuan_aktif', 'riwayat_pengajuan'));
    }

    public function cetak(AjuanPkl $ajuanPkl)
    {
        if ($ajuanPkl->id_siswa != Auth::user()->siswa->id_siswa) {
            return redirect()->back()->with('error', 'Akses ditolak');
        }

        if ($ajuanPkl->status != 'disetujui') {
            return redirect()->back()->with('error', 'Pengajuan belum disetujui');
        }

        $pdf = PDF::loadView('siswa.pengajuan.cetak', compact('ajuanPkl'));
        return $pdf->download('pengajuan_pkl.pdf');
    }
}