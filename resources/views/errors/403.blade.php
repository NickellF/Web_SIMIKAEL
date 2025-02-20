@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8 text-center">
        <div class="mb-6">
            <i class="fas fa-lock text-red-500 text-6xl mb-4"></i>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">403</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Akses Ditolak</h2>
        </div>
        
        <p class="text-gray-600 mb-6">
            Anda tidak memiliki izin untuk mengakses halaman ini. 
            Silakan hubungi administrator jika Anda merasa ini adalah kesalahan.
        </p>
        
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Kembali ke Beranda
            </a>
            <a href="javascript:history.back()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">
                Kembali Sebelumnya
            </a>
        </div>
    </div>
</div>
@endsection