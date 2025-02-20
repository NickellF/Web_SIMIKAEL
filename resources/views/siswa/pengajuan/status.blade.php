@extends('layouts.app')

@section('title', 'Status Pengajuan PKL')

@section('styles')
<style>
    /* Card hover effects */
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    /* Status badge styles */
    .status-badge {
        transition: all 0.2s ease-in-out;
    }
    
    /* Print button animation */
    .print-button {
        transition: all 0.3s ease;
    }
    
    .print-button:hover {
        transform: translateY(-1px);
    }
    
    .print-button:hover i {
        animation: bounce 0.5s ease infinite;
    }
    
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-2px);
        }
    }
    
    /* Empty state styling */
    .empty-state-icon {
        transition: all 0.3s ease;
    }
    
    .empty-state:hover .empty-state-icon {
        transform: scale(1.1);
    }
    
    /* Data row styling */
    .data-row {
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(229, 231, 235, 0.5);
    }
    
    .data-row:last-child {
        border-bottom: none;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Status Pengajuan PKL</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($pengajuan as $item)
            <div class="bg-white shadow-md rounded-lg overflow-hidden card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900 truncate" title="{{ $item->industri->nama_industri }}">
                            {{ $item->industri->nama_industri }}
                        </h2>
                        <span class="status-badge px-2 py-1 rounded-full text-xs font-semibold
                            {{ $item->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : 
                               ($item->status == 'disetujui' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800') }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>

                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="data-row flex justify-between items-center">
                            <span class="text-gray-500">Tanggal Mulai:</span>
                            <strong class="text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</strong>
                        </div>
                        <div class="data-row flex justify-between items-center">
                            <span class="text-gray-500">Tanggal Selesai:</span>
                            <strong class="text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</strong>
                        </div>
                        <div class="data-row flex justify-between items-center">
                            <span class="text-gray-500">Alamat:</span>
                            <strong class="text-gray-700 text-right ml-2 truncate" title="{{ $item->industri->alamat }}">
                                {{ $item->industri->alamat }}
                            </strong>
                        </div>
                    </div>

                    @if($item->status == 'disetujui')
                        <div class="mt-6">
                            <a href="{{ route('siswa.pengajuan.cetak', $item) }}" 
                               class="print-button w-full block text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-sm hover:shadow-md">
                                <i class="fas fa-print mr-2"></i>Cetak Surat Pengajuan
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="empty-state bg-white shadow-md rounded-lg p-8 text-center">
                    <i class="fas fa-file-alt text-gray-400 text-6xl mb-4 empty-state-icon"></i>
                    <p class="text-gray-600 text-lg mb-6">Belum ada pengajuan PKL</p>
                    <a href="{{ route('siswa.pengajuan.create') }}" 
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                        <i class="fas fa-plus-circle mr-2"></i>Buat Pengajuan Baru
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effect to cards
        const cards = document.querySelectorAll('.card-hover');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('shadow-lg');
            });
            card.addEventListener('mouseleave', function() {
                this.classList.remove('shadow-lg');
            });
        });

        // Add tooltip functionality for truncated text
        const truncatedElements = document.querySelectorAll('.truncate');
        truncatedElements.forEach(element => {
            if (element.scrollWidth > element.clientWidth) {
                element.title = element.textContent.trim();
            }
        });

        // Animate print button icon
        const printButtons = document.querySelectorAll('.print-button');
        printButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.classList.add('animate-bounce');
                }
            });
            button.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.classList.remove('animate-bounce');
                }
            });
        });
    });
</script>
@endsection