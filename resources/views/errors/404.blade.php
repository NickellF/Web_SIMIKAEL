@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="max-w-md w-full bg-white shadow-lg rounded-lg p-8 text-center">
        <div class="mb-6">
            <i class="fas fa-exclamation-triangle text-yellow-500 text-6xl mb-4"></i>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">404</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Halaman Tidak Ditemukan</h2>
        </div>
        
        <p class="text-gray-600 mb-6">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. 
            Mungkin sudah dipindahkan atau tidak tersedia.
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