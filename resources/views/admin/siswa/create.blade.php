@extends('layouts.app')

@section('title', 'Tambah Siswa Baru')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 hover:scale-[1.01]">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-90"></div>
                <div class="relative z-10 px-6 py-8 sm:px-10">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Siswa Baru</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <p class="mt-2 text-sm text-blue-100">Lengkapi informasi siswa dengan cermat dan akurat</p>
                </div>
            </div>

            <form action="{{ route('admin.siswa.store') }}" method="POST" class="px-6 py-8 sm:px-10 space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <div class="relative">
                                <input type="text" name="nama_siswa" id="nama_siswa" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('nama_siswa') border-red-500 @enderror"
                                    value="{{ old('nama_siswa') }}"
                                    placeholder="Nama lengkap siswa"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            @error('nama_siswa')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Induk Siswa (NIS)</label>
                            <div class="relative">
                                <input type="text" name="nis" id="nis" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('nis') border-red-500 @enderror"
                                    value="{{ old('nis') }}"
                                    placeholder="Nomor Induk Siswa"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                </div>
                            </div>
                            @error('nis')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <div class="relative">
                                <select name="kelas" id="kelas" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('kelas') border-red-500 @enderror"
                                >
                                    <option value="">Pilih Kelas</option>
                                    <option value="X" {{ old('kelas') == 'X' ? 'selected' : '' }}>X</option>
                                    <option value="XI" {{ old('kelas') == 'XI' ? 'selected' : '' }}>XI</option>
                                    <option value="XII" {{ old('kelas') == 'XII' ? 'selected' : '' }}>XII</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            @error('kelas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jurusan</label>
                            <div class="relative">
                                <select name="jurusan" id="jurusan" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('jurusan') border-red-500 @enderror"
                                >
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Teknik Komputer dan Jaringan" {{ old('jurusan') == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                                    <option value="Rekayasa Perangkat Lunak" {{ old('jurusan') == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                    <option value="Multimedia" {{ old('jurusan') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                            @error('jurusan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <div class="relative">
                                <input type="text" name="username" id="username" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('username') border-red-500 @enderror"
                                    value="{{ old('username') }}"
                                    placeholder="Username untuk login"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                            </div>
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('password') border-red-500 @enderror"
                                    placeholder="Password untuk login"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('admin.siswa.index') }}" class="w-full sm:w-auto text-center px-6 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-300">
                    Batal
                </a>
                <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                    Tambah Siswa
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('styles')
<style>
@media screen and (max-width: 640px) {
    input, select {
        font-size: 16px !important;
    }
}
</style>
@endsection