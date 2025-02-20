@extends('layouts.app')

@section('title', 'Daftar Pengajuan PKL')

@section('styles')
<style>
    /* Button styles and hover effects */
    .hover\:shadow:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .bg-blue-500:hover {
        transform: translateY(-1px);
        transition: all 0.3s ease;
    }
    
    /* Table styles */
    .divide-y.divide-gray-200 > tr {
        border-color: rgba(229, 231, 235, 0.7);
    }
    
    /* Status badge enhancements */
    .status-badge {
        @apply px-2 py-1 rounded-full text-xs font-semibold;
        transition: all 0.2s ease-in-out;
    }
    
    /* Action button animations */
    .text-blue-500 {
        transition: all 0.2s ease-in-out;
    }
    
    .text-blue-500:hover {
        transform: scale(1.2);
    }
    
    /* Table row hover effect */
    tbody tr {
        transition: background-color 0.2s ease-in-out;
    }
    
    tbody tr:hover {
        background-color: rgba(243, 244, 246, 0.5);
    }
    
    /* Print icon enhancement */
    .fas.fa-print {
        transition: transform 0.2s ease;
    }
    
    .fas.fa-print:hover {
        transform: scale(1.2);
    }
    
    /* Empty state styling */
    .empty-state {
        @apply flex flex-col items-center justify-center py-8;
    }
    
    /* Pagination enhancement */
    .pagination-container {
        @apply bg-white px-4 py-3 border-t border-gray-200 sm:px-6;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Pengajuan PKL</h1>
        <a href="{{ route('siswa.pengajuan.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 hover:shadow-lg transform hover:-translate-y-0.5">
            <i class="fas fa-plus-circle mr-2"></i>Buat Pengajuan Baru
        </a>
    </div>

    <div class="bg-white shadow-lg overflow-hidden sm:rounded-lg">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Industri</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pengajuan as $item)
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $item->industri->nama_industri }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge {{ 
                                $item->status == 'pending' ? 'bg-yellow-200 text-yellow-800' : 
                                ($item->status == 'disetujui' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800') 
                            }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            @if($item->status == 'disetujui')
                                <a href="{{ route('siswa.pengajuan.cetak', $item) }}" 
                                   class="text-blue-500 hover:text-blue-700 inline-flex items-center">
                                    <i class="fas fa-print text-lg"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i class="fas fa-folder-open text-gray-400 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg">Belum ada pengajuan</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($pengajuan->hasPages())
            <div class="pagination-container">
                {{ $pengajuan->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Table row hover enhancement
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.classList.add('bg-gray-50');
            });
            row.addEventListener('mouseleave', function() {
                this.classList.remove('bg-gray-50');
            });
        });

        // Print button animation
        const printButtons = document.querySelectorAll('.text-blue-500');
        printButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.classList.add('transform', 'scale-110');
                }
            });
            button.addEventListener('mouseleave', function() {
                const icon = this.querySelector('i');
                if (icon) {
                    icon.classList.remove('transform', 'scale-110');
                }
            });
        });
    });
</script>
@endsection