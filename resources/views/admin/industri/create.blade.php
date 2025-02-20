@extends('layouts.app')

@section('title', 'Tambah Industri Baru')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 hover:scale-[1.01]">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-90"></div>
                <div class="relative z-10 px-6 py-8 sm:px-10">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Industri Baru</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <p class="mt-2 text-sm text-blue-100">Lengkapi informasi industri dengan cermat dan akurat</p>
                </div>
            </div>

            <form action="{{ route('admin.industri.store') }}" method="POST" class="px-6 py-8 sm:px-10 space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Industri</label>
                            <div class="relative">
                                <input type="text" name="nama_industri" id="nama_industri" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('nama_industri') border-red-500 @enderror"
                                    value="{{ old('nama_industri') }}"
                                    placeholder="Nama industri"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            @error('nama_industri')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                            <div class="relative">
                                <textarea name="alamat" id="alamat" required rows="4"
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('alamat') border-red-500 @enderror"
                                    placeholder="Alamat lengkap industri"
                                >{{ old('alamat') }}</textarea>
                                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            @error('alamat')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kontak (Telp/Email)</label>
                            <div class="relative">
                                <input type="text" name="kontak" id="kontak" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('kontak') border-red-500 @enderror"
                                    value="{{ old('kontak') }}"
                                    placeholder="Nomor telepon atau email"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                            </div>
                            @error('kontak')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200 flex justify-end space-x-4">
                    <a href="{{ route('admin.industri.index') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-300">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                        Tambah Industri
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection