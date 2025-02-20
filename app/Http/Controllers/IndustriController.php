<?php

namespace App\Http\Controllers;

use App\Models\Industri;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
    public function index()
    {
        $industri = Industri::latest()->paginate(5);
        return view('admin.industri.index', compact('industri'));
    }

    public function store(Request $request)
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
    
    public function create()
    {
        return view('admin.industri.create');
    }

    public function show(Industri $industri)
    {
        return response()->json($industri);
    }

    public function edit(Industri $industri)
    {
        return view('admin.industri.edit', compact('industri'));
    }

    public function update(Request $request, Industri $industri)
    {
        $validated = $request->validate([
            'nama_industri' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:50'
        ]);

        $industri->update($validated);

        return redirect()->route('admin.industri.index')
            ->with('success', 'Industri berhasil diperbarui');
    }

    public function destroy(Industri $industri)
    {
        $industri->delete();

        return redirect()->route('admin.industri.index')
            ->with('success', 'Industri berhasil dihapus');
    }
}