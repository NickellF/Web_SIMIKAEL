@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-8">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="px-8 py-10">
                <div class="flex items-center space-x-6 mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-400 to-blue-500 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Edit Data Guru</h2>
                        <p class="text-sm text-gray-500">{{ $guru->nama_guru }} - {{ $guru->nip }}</p>
                    </div>
                </div>

                <form action="{{ route('admin.guru.update', $guru) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="nama_guru" id="nama_guru"
                                    class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent 
                                    @error('nama_guru') border-red-500 @enderror"
                                    value="{{ old('nama_guru', $guru->nama_guru) }}"
                                    placeholder="Nama Lengkap"
                                    required
                                >
                                @error('nama_guru')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h3m-6 0a3 3 0 006 0v-1m-6 0H9" />
                                    </svg>
                                </div>
                                <input type="text" name="nip" id="nip"
                                    class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent 
                                    @error('nip') border-red-500 @enderror"
                                    value="{{ old('nip', $guru->nip) }}"
                                    placeholder="Nomor Induk Pegawai"
                                    required
                                >
                                @error('nip')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <select name="bidang" id="bidang"
                                    class="w-full pl-10 pr-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent
                                    @error('bidang') border-red-500 @enderror"
                                    required
                                >
                                    <option value="">Pilih Area Keahlian</option>
                                    @foreach([
                                        'Teknik Komputer dan Jaringan' => 'Teknik Komputer dan Jaringan', 
                                        'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak', 
                                        'Multimedia' => 'Multimedia'
                                    ] as $value => $label)
                                        <option value="{{ $value }}" 
                                            {{ old('bidang', $guru->bidang) == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('bidang')
                                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-6 flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Terakhir diperbarui: 
                            <span class="font-medium text-gray-700">
                                {{ $guru->updated_at ? $guru->updated_at->translatedFormat('d F Y') : 'Belum pernah' }}
                            </span>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.guru.index') }}" class="px-5 py-2 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-100 transition duration-300">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2 bg-gradient-to-r from-teal-500 to-blue-500 text-white rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 active:scale-95">
                                Perbarui Data Guru
                            </button>
                        </div>
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
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input, select');

    inputs.forEach(input => {
        input.addEventListener('invalid', function(e) {
            e.preventDefault();
            if (!e.target.validity.valid) {
                e.target.classList.add('border-red-500');
                const errorElement = e.target.closest('.relative').querySelector('.text-red-500');
                if (errorElement) {
                    errorElement.textContent = this.validationMessage;
                }
            }
        });

        input.addEventListener('input', function() {
            if (this.validity.valid) {
                this.classList.remove('border-red-500');
                const errorElement = this.closest('.relative').querySelector('.text-red-500');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }
        });
    });

    const bidangSelect = document.getElementById('bidang');
    if (bidangSelect) {
        bidangSelect.addEventListener('change', function() {
            const selectedValue = this.value;
            console.log('Selected Expertise Area:', selectedValue);
        });
    }
});
</script>
@endpush