@extends('layouts.app')

@section('title', 'Buat Pengajuan PKL')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 hover:scale-[1.01]">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-600 opacity-90"></div>
                <div class="relative z-10 px-6 py-8 sm:px-10">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-extrabold text-white tracking-tight">Buat Pengajuan PKL Baru</h1>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="mt-2 text-sm text-blue-100">Lengkapi informasi pengajuan PKL dengan cermat</p>
                </div>
            </div>

            <form action="{{ route('siswa.pengajuan.store') }}" method="POST" class="px-6 py-8 sm:px-10 space-y-6">
                @csrf
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Industri</label>
                            <div class="relative">
                                <select name="id_industri" id="id_industri" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('id_industri') border-red-500 @enderror"
                                >
                                    <option value="">Pilih Industri</option>
                                    @foreach($industri as $item)
                                        <option value="{{ $item->id_industri }}">
                                            {{ $item->nama_industri }} - {{ $item->alamat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                            </div>
                            @error('id_industri')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai PKL</label>
                            <div class="relative">
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('tanggal_mulai') border-red-500 @enderror"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            @error('tanggal_mulai')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai PKL</label>
                            <div class="relative">
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" required
                                    class="w-full pl-10 pr-4 py-3 border-2 border-transparent bg-gray-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300
                                    @error('tanggal_selesai') border-red-500 @enderror"
                                >
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            @error('tanggal_selesai')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200 flex justify-end space-x-4">
                    <a href="{{ route('siswa.pengajuan.index') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition duration-300">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                        Ajukan PKL
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');

        tanggalMulai.addEventListener('change', function() {
            tanggalSelesai.min = this.value;
        });

        tanggalSelesai.addEventListener('change', function() {
            tanggalMulai.max = this.value;
        });
    });
</script>
@endsection
@endsection