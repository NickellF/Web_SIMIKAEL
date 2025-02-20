@extends('layouts.app')

@section('title', 'Edit Profil Siswa')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Profil Siswa</h1>

    <form action="{{ route('siswa.update') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" 
                           value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('nama_siswa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="text" name="nis" id="nis" 
                           value="{{ old('nis', $siswa->nis) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @error('nis')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                    <select name="kelas" id="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X</option>
                        <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                        <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                    </select>
                    @error('kelas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="Teknik Komputer dan Jaringan" {{ $siswa->jurusan == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>
                            Teknik Komputer dan Jaringan
                        </option>
                        <option value="Rekayasa Perangkat Lunak" {{ $siswa->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                            Rekayasa Perangkat Lunak
                        </option>
                        <option value="Multimedia" {{ $siswa->jurusan == 'Multimedia' ? 'selected' : '' }}>
                            Multimedia
                        </option>
                    </select>
                    @error('jurusan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" 
                       value="{{ old('username', $siswa->user->username) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('siswa.dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">
                Batal
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                Perbarui Profil
            </button>
        </div>
    </form>

    <div class="mt-8 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-red-700 mb-4">Hapus Akun</h2>
        <form action="{{ route('siswa.destroy') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun? Ini akan menghapus semua data Anda.');">
            @csrf
            @method('DELETE')
            <div class="mb-4">
                <label for="password_konfirmasi" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password" id="password_konfirmasi" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                Hapus Akun Permanen
            </button>
        </form>
    </div>
</div>
@endsection