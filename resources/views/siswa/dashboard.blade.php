@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@push('styles')
<style>
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
@endpush

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Welcome Section --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Welcome back, 
                        <span class="text-blue-600 capitalize">{{ auth()->user()->name }}</span>
                    </h1>
                    <p class="text-gray-500 mt-2">
                        {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                    </p>
                </div>
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Quick Stats</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Total Pengajuan</span>
                    <span class="font-bold text-blue-600 dashboard-card-number">{{ $total_pengajuan }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Disetujui</span>
                    <span class="font-bold text-green-600 dashboard-card-number">{{ $pengajuan_disetujui }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Pending</span>
                    <span class="font-bold text-yellow-600 dashboard-card-number">{{ $total_pengajuan - $pengajuan_disetujui - $pengajuan_ditolak }}</span>
                </div>
            </div>
        </div>

        {{-- Detailed Statistics --}}
        <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Total Pengajuan</h3>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dashboard-card-number">{{ $total_pengajuan }}</div>
                </div>
                <div class="bg-blue-100 text-blue-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Disetujui</h3>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dashboard-card-number">{{ $pengajuan_disetujui }}</div>
                </div>
                <div class="bg-green-100 text-green-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pending</h3>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dashboard-card-number">{{ $total_pengajuan - $pengajuan_disetujui - $pengajuan_ditolak }}</div>
                </div>
                <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Ditolak</h3>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dashboard-card-number">{{ $pengajuan_ditolak }}</div>
                </div>
                <div class="bg-red-100 text-red-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Active Submission & History --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Pengajuan Aktif</h2>
                @if($pengajuan_aktif)
                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                        {{ ucfirst($pengajuan_aktif->status) }}
                    </span>
                @endif
            </div>

            @if($pengajuan_aktif)
                <div class="space-y-4">
                    <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                        <span class="text-gray-600">Industri</span>
                        <span class="font-semibold text-gray-900">{{ $pengajuan_aktif->industri->nama_industri }}</span>
                    </div>
                    <div class="flex justify-between items-center pb-4 border-b border-gray-100">
                        <span class="text-gray-600">Tanggal Mulai</span>
                        <span class="font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($pengajuan_aktif->tanggal_mulai)->format('d M Y') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Tanggal Selesai</span>
                        <span class="font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($pengajuan_aktif->tanggal_selesai)->format('d M Y') }}
                        </span>
                    </div>
                </div>
            @else
                <div class="text-center text-gray-500 py-8">
                    Belum ada pengajuan aktif
                </div>
            @endif
        </div>

        <div class="lg:col-span-1 bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Riwayat Pengajuan</h2>
            <div class="space-y-4">
                @forelse($riwayat_pengajuan as $pengajuan)
                    <div class="flex items-center justify-between pb-4 border-b border-gray-100 last:border-b-0 last:pb-0">
                        <div class="flex-1">
                            <p class="font-medium text-gray-900">{{ $pengajuan->industri->nama_industri }}</p>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ \Carbon\Carbon::parse($pengajuan->tanggal_mulai)->format('d M Y') }}
                            </p>
                        </div>
                        <span class="px-2 py-1 rounded-full text-xs font-semibold ml-4
                            {{ $pengajuan->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                               ($pengajuan->status == 'disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($pengajuan->status) }}
                        </span>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-8">
                        Belum ada riwayat pengajuan
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Animate number counters
    const animateNumbers = () => {
        const numberElements = document.querySelectorAll('.dashboard-card-number');
        
        numberElements.forEach(el => {
            const target = parseInt(el.textContent);
            const duration = 1500;
            const increment = target / (duration / 16);
            
            let current = 0;
            const counter = setInterval(() => {
                current += increment;
                
                if (current >= target) {
                    el.textContent = target.toLocaleString();
                    clearInterval(counter);
                } else {
                    el.textContent = Math.round(current).toLocaleString();
                }
            }, 16);
        });
    };

    // Trigger animation
    animateNumbers();

    // Add subtle hover effect
    const cards = document.querySelectorAll('.bg-white');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.transition = 'transform 0.3s ease';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endpush