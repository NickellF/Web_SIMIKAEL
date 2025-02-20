@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-1">
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->username) }}&background=0D8ABC&color=fff" 
                     alt="Profil" 
                     class="w-32 h-32 rounded-full mx-auto mb-4"
                >
                <h2 class="text-xl font-bold text-gray-900">{{ auth()->user()->username }}</h2>
                <p class="text-gray-600 mb-4">{{ ucfirst(auth()->user()->role) }}</p>
                
                @if(auth()->user()->role == 'siswa')
                    <div class="bg-blue-50 border border-blue-200 p-3 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <strong>NIS:</strong> {{ auth()->user()->siswa->nis }}<br>
                            <strong>Kelas:</strong> {{ auth()->user()->siswa->kelas }}<br>
                            <strong>Jurusan:</strong> {{ auth()->user()->siswa->jurusan }}
                        </p>
                    </div>
                @elseif(auth()->user()->role == 'guru')
                    <div class="bg-green-50 border border-green-200 p-3 rounded-lg">
                        <p class="text-sm text-green-800">
                            <strong>NIP:</strong> {{ auth()->user()->guru->nip }}<br>
                            <strong>Bidang:</strong> {{ auth()->user()->guru->bidang }}
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Ubah Profil</h2>
                
                <form action="{{ route('profil.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                Username
                            </label>
                            <input type="text" name="username" id="username" 
                                value="{{ old('username', auth()->user()->username) }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                            @error('username')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_baru" class="block text-sm font-medium text-gray-700 mb-2">
                                Password Baru (Kosongkan jika tidak ingin mengubah)
                            </label>
                            <input type="password" name="password_baru" id="password_baru" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                            @error('password_baru')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password_konfirmasi" class="block text-sm font-medium text-gray-700 mb-2">
                            Konfirmasi Password Lama
                        </label>
                        <input type="password" name="password_konfirmasi" id="password_konfirmasi" required
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                        >
                        @error('password_konfirmasi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                            Perbarui Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection