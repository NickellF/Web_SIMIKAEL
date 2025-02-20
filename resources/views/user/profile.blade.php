@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-1">
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_picture) }}" 
                         alt="Profil" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-blue-500 shadow-lg"
                    >
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->username) }}&background=0D8ABC&color=fff" 
                         alt="Profil" 
                         class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-blue-500 shadow-lg"
                    >
                @endif
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
                
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Profil
                            </label>
                            <div class="mt-1 flex items-center">
                                <input type="file" name="profile_picture" id="profile_picture"
                                    class="w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    accept="image/jpeg,image/png,image/jpg"
                                >
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Format: JPG, JPEG, PNG (Maks. 2MB)</p>
                            @error('profile_picture')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="password_baru" class="block text-sm font-medium text-gray-700 mb-2">
                                Password Baru <span class="text-gray-500">(Kosongkan jika tidak ingin mengubah)</span>
                            </label>
                            <input type="password" name="password_baru" id="password_baru" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                            @error('password_baru')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_konfirmasi" class="block text-sm font-medium text-gray-700 mb-2">
                                Konfirmasi Password Saat Ini <span class="text-red-500">*</span>
                            </label>
                            <input type="password" name="password_konfirmasi" id="password_konfirmasi" required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                            >
                            @error('password_konfirmasi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                            <i class="fas fa-save mr-2"></i> Perbarui Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const profilePictureInput = document.getElementById('profile_picture');
    const profileImage = document.querySelector('.rounded-full');
    
    if (profilePictureInput && profileImage) {
        profilePictureInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Check file type
                if (!file.type.match('image/jpeg') && 
                    !file.type.match('image/png') && 
                    !file.type.match('image/jpg')) {
                    alert('File harus berformat JPG, JPEG, atau PNG');
                    event.target.value = '';
                    return;
                }
                
                // Check file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    event.target.value = '';
                    return;
                }
                
                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush    