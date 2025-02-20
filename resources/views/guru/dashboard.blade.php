@extends('layouts.app')

@section('title', 'Dashboard Guru')

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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
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
                    <span class="font-bold text-yellow-600 dashboard-card-number">{{ $pengajuan_pending }}</span>
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
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pending</h3>
                    <div class="mt-2 text-3xl font-bold text-gray-900 dashboard-card-number">{{ $pengajuan_pending }}</div>
                </div>
                <div class="bg-yellow-100 text-yellow-500 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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