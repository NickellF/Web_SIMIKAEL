@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-cyan-50 to-blue-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform transition-all duration-500 hover:scale-[1.005]">
            <!-- Header Section -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-blue-700 opacity-90"></div>
                <div class="relative z-10 px-8 py-10 flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-extrabold text-white">Edit Data Siswa</h1>
                        <p class="text-sm text-cyan-100 mt-2">{{ $siswa->nama_siswa }} - {{ $siswa->nis }}</p>
                    </div>
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-edit text-4xl text-white"></i>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.siswa.update', $siswa) }}" method="POST" class="px-8 py-10 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div>
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-cyan-500"></i>Nama Lengkap
                            </label>
                            <input type="text" name="nama_siswa" id="nama_siswa" required 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                                value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                            >
                            @error('nama_siswa')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-id-card mr-2 text-cyan-500"></i>Nomor Induk Siswa (NIS)
                            </label>
                            <input type="text" name="nis" id="nis" required 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                                value="{{ old('nis', $siswa->nis) }}"
                            >
                            @error('nis')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-graduation-cap mr-2 text-cyan-500"></i>Kelas
                            </label>
                            <select name="kelas" id="kelas" required 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                            >
                                <option value="X" {{ old('kelas', $siswa->kelas) == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ old('kelas', $siswa->kelas) == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ old('kelas', $siswa->kelas) == 'XII' ? 'selected' : '' }}>XII</option>
                            </select>
                            @error('kelas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-laptop-code mr-2 text-cyan-500"></i>Jurusan
                            </label>
                            <select name="jurusan" id="jurusan" required 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                            >
                                <option value="Teknik Komputer dan Jaringan" 
                                    {{ old('jurusan', $siswa->jurusan) == 'Teknik Komputer dan Jaringan' ? 'selected' : '' }}>
                                    Teknik Komputer dan Jaringan
                                </option>
                                <option value="Rekayasa Perangkat Lunak" 
                                    {{ old('jurusan', $siswa->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                                    Rekayasa Perangkat Lunak
                                </option>
                                <option value="Multimedia" 
                                    {{ old('jurusan', $siswa->jurusan) == 'Multimedia' ? 'selected' : '' }}>
                                    Multimedia
                                </option>
                            </select>
                            @error('jurusan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-cyan-500"></i>Username
                            </label>
                            <input type="text" name="username" id="username" required 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                                value="{{ old('username', $siswa->users ? $siswa->users->username : '') }}"
                            >
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-lock mr-2 text-cyan-500"></i>Password Baru
                            </label>
                            <input type="password" name="password" id="password" 
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl 
                                focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent 
                                transition duration-300"
                                placeholder="Kosongkan jika tidak ingin mengubah"
                            >
                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6 flex justify-end space-x-4">
                    <a href="{{ route('admin.siswa.index') }}" 
                       class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-xl 
                       hover:bg-gray-100 transition duration-300 flex items-center">
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                    <button type="submit" 
                        class="px-6 py-2.5 bg-gradient-to-r from-cyan-600 to-blue-600 
                        text-white rounded-xl hover:opacity-90 transition duration-300 
                        transform hover:scale-105 active:scale-95 flex items-center">
                        <i class="fas fa-save mr-2"></i>Perbarui Data
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('input, select');
        
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.relative').classList.add('ring-2', 'ring-cyan-500', 'rounded-xl');
            });

            input.addEventListener('blur', function() {
                this.closest('.relative').classList.remove('ring-2', 'ring-cyan-500', 'rounded-xl');
            });

            // Add hover effect
            input.addEventListener('mouseenter', function() {
                this.classList.add('border-cyan-300');
            });

            input.addEventListener('mouseleave', function() {
                if (!this.matches(':focus')) {
                    this.classList.remove('border-cyan-300');
                }
            });
        });
    });
</script>
@endsection