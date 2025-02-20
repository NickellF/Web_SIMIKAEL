@extends('layouts.app')

@section('title', 'Tambah Guru Baru')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 hover:scale-[1.01]">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-90"></div>
                <div class="relative z-10 px-6 py-8 sm:px-10">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Guru Baru</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="mt-2 text-sm text-blue-100">Lengkapi informasi guru dengan cermat dan akurat</p>
                </div>
            </div>

            <form action="{{ route('admin.guru.store') }}" method="POST" class="px-6 py-8 sm:px-10 space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <input type="text" name="nama_guru" id="nama_guru" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('nama_guru') border-red-500 @enderror"
                                    value="{{ old('nama_guru') }}"
                                    placeholder="Nama lengkap guru"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            @error('nama_guru')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Pegawai (NIP)</label>
                            <div class="relative">
                                <input type="text" name="nip" id="nip" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('nip') border-red-500 @enderror"
                                    value="{{ old('nip') }}"
                                    placeholder="Nomor Induk Pegawai"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h3m-6 0a3 3 0 006 0v-1m-6 0H9" />
                                    </svg>
                                </div>
                            </div>
                            @error('nip')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bidang Keahlian</label>
                            <div class="relative">
                                <select name="bidang" id="bidang" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('bidang') border-red-500 @enderror"
                                >
                                    <option value="">Pilih Bidang Keahlian</option>
                                    <option value="Teknik Komputer dan Jaringan" {{ old('bidang') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>
                                        Teknik Komputer dan Jaringan
                                    </option>
                                    <option value="Rekayasa Perangkat Lunak" {{ old('bidang') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                                        Rekayasa Perangkat Lunak
                                    </option>
                                    <option value="Multimedia" {{ old('bidang') == 'Multimedia' ? 'selected' : '' }}>
                                        Multimedia
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            @error('bidang')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200 flex justify-end space-x-4">
                    <a href="{{ route('admin.guru.index') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-300">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                        Tambah Guru
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection