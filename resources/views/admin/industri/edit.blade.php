@extends('layouts.app')

@section('title', 'Edit Industri')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-8">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="px-8 py-10">
                <div class="flex items-center space-x-6 mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Edit Data Industri</h2>
                        <p class="text-sm text-gray-500">{{ $industri->nama_industri }}</p>
                    </div>
                </div>

                <form action="{{ route('admin.industri.update', $industri) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="relative">
                                <label for="nama_industri" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Industri
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <input type="text" name="nama_industri" id="nama_industri" required 
                                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                        @error('nama_industri') border-red-500 @enderror"
                                        value="{{ old('nama_industri', $industri->nama_industri) }}"
                                        placeholder="Nama Industri"
                                    >
                                </div>
                                @error('nama_industri')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="relative">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat Lengkap
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3 left-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <textarea name="alamat" id="alamat" required 
                                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                        @error('alamat') border-red-500 @enderror"
                                        rows="4"
                                        placeholder="Alamat Lengkap"
                                    >{{ old('alamat', $industri->alamat) }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="relative">
                                <label for="kontak" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kontak (Telp/Email)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="kontak" id="kontak" required 
                                        class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                                        @error('kontak') border-red-500 @enderror"
                                        value="{{ old('kontak', $industri->kontak) }}"
                                        placeholder="Nomor Telepon atau Email"
                                    >
                                </div>
                                @error('kontak')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6 flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Terakhir diperbarui: 
                            <span class="font-medium text-gray-700">
                                {{ $industri->updated_at ? $industri->updated_at->translatedFormat('d F Y') : 'Belum pernah' }}
                            </span>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.industri.index') }}" 
                                class="px-5 py-2 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                                Perbarui Data Industri
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection