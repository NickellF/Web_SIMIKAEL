<?php

namespace App\Http\Controllers;

use App\Models\AjuanPkl;
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function dashboard()
    {
        $data = [
            'total_pengajuan' => AjuanPkl::count(),
            'pengajuan_pending' => AjuanPkl::where('status', 'pending')->count(),
            'pengajuan_disetujui' => AjuanPkl::where('status', 'disetujui')->count(),
            'pengajuan_ditolak' => AjuanPkl::where('status', 'ditolak')->count()
        ];

        return view('guru.dashboard', $data);
    }

    public function pengajuanIndex()
    {
        $pengajuan = AjuanPkl::with(['siswa', 'industri'])
            ->latest()
            ->paginate(10);
        
        return view('guru.pengajuan.index', compact('pengajuan'));
    }

    public function updatePengajuanStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,disetujui,ditolak'
        ]);

        $pengajuan = AjuanPkl::findOrFail($id);
        $pengajuan->update(['status' => $validated['status']]);

        return redirect()->route('guru.pengajuan.index')
            ->with('success', 'Status pengajuan berhasil diupdate');
    }

    public function updateProfileGuru(Request $request)
{
    $guru = Guru::findOrFail(Auth::user()->guru->id_guru); // Ambil data guru yang login

    $validated = $request->validate([
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        $fileName = time() . '_' . $request->file('profile_picture')->getClientOriginalName();
        $request->file('profile_picture')->storeAs('profile_pictures', $fileName, 'public');

        // Hapus foto lama jika ada
        if ($guru->profile_picture && $guru->profile_picture != 'default.jpg') {
            Storage::disk('public')->delete('profile_pictures/' . $guru->profile_picture);
        }

        $guru->update(['profile_picture' => $fileName]);
    }

    return redirect()->route('guru.profile')->with('success', 'Foto profil berhasil diperbarui');
}
}