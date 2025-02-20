@extends('layouts.app')

@section('title', 'Pengajuan PKL')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Pengajuan PKL</h1>
        <div class="flex space-x-3">
            <select id="filter-status" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="disetujui">Disetujui</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <button id="filter-btn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                Filter
            </button>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Industri</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pengajuan as $item)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->siswa->nama_siswa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->industri->nama_industri }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($item->status == 'disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form action="{{ route('guru.pengajuan.status', $item->id_ajuan) }}" method="POST" class="inline-flex space-x-2">
                                @csrf
                                @method('PUT')
                                @if($item->status == 'pending')
                                    <button type="submit" name="status" value="disetujui" 
                                            class="text-green-600 hover:text-green-900 transition duration-150">
                                        <i class="fas fa-check-circle text-lg"></i>
                                    </button>
                                    <button type="submit" name="status" value="ditolak" 
                                            class="text-red-600 hover:text-red-900 transition duration-150">
                                        <i class="fas fa-times-circle text-lg"></i>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            Belum ada pengajuan PKL
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($pengajuan->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $pengajuan->links() }}
            </div>
        @endif
    </div>
</div>

@section('styles')
<style>
    /* Custom hover effects for buttons */
    .hover\:shadow:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    /* Ensure consistent hover states */
    .hover\:bg-blue-700:hover, 
    .hover\:bg-green-700:hover {
        transform: translateY(-1px);
    }
    
    /* Ensure icons are properly aligned */
    .flex.justify-end.space-x-3 {
        display: flex !important;
    }
    
    /* Soften table appearance */
    .divide-y.divide-gray-200 > tr {
        border-color: rgba(229, 231, 235, 0.7);
    }
    
    /* Animated transitions for action buttons */
    .text-blue-600, 
    .text-amber-500, 
    .text-red-600,
    .text-green-600 {
        transition: all 0.2s ease-in-out;
    }
    
    /* Subtle scale effect on hover */
    .text-blue-600:hover, 
    .text-amber-500:hover, 
    .text-red-600:hover,
    .text-green-600:hover {
        transform: scale(1.2);
    }

    /* Status badge styles */
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-pending {
        background-color: #FEF3C7;
        color: #92400E;
    }

    .status-approved {
        background-color: #D1FAE5;
        color: #065F46;
    }

    .status-rejected {
        background-color: #FEE2E2;
        color: #991B1B;
    }
</style>
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterSelect = document.getElementById('filter-status');
        const filterButton = document.getElementById('filter-btn');
        const tableRows = document.querySelectorAll('tbody tr');

        // Filter functionality
        filterButton.addEventListener('click', function() {
            const selectedStatus = filterSelect.value.toLowerCase();
            
            tableRows.forEach(row => {
                const statusElement = row.querySelector('span');
                if (!statusElement) return; // Skip if no status element found
                
                const rowStatus = statusElement.textContent.trim().toLowerCase();
                
                if (selectedStatus === '' || rowStatus === selectedStatus) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        });

        // Add hover effect to action buttons
        const actionButtons = document.querySelectorAll('button[name="status"]');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.querySelector('i').classList.add('transform', 'scale-110');
            });
            button.addEventListener('mouseleave', function() {
                this.querySelector('i').classList.remove('transform', 'scale-110');
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete confirmation
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    this.closest('form.delete-form').submit();
                }
            });
        });
        
        // Alert messages fade-out animation
        const alertBoxes = document.querySelectorAll('.bg-red-100, .bg-green-100');
        alertBoxes.forEach(box => {
            setTimeout(() => {
                box.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => {
                    box.remove();
                }, 500);
            }, 5000);
        });
        
        // Table row hover effects
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.classList.add('bg-gray-50');
            });
            row.addEventListener('mouseleave', function() {
                this.classList.remove('bg-gray-50');
            });
        });

        // Filter functionality
        const filterSelect = document.getElementById('filter-status');
        const filterButton = document.getElementById('filter-btn');
        
        if (filterSelect && filterButton) {
            filterButton.addEventListener('click', function() {
                const selectedStatus = filterSelect.value.toLowerCase();
                
                tableRows.forEach(row => {
                    const statusElement = row.querySelector('span');
                    if (!statusElement) return;
                    
                    const rowStatus = statusElement.textContent.trim().toLowerCase();
                    
                    if (selectedStatus === '' || rowStatus === selectedStatus) {
                        row.classList.remove('hidden');
                    } else {
                        row.classList.add('hidden');
                    }
                });
            });
        }

        // Action button hover effects
        const actionButtons = document.querySelectorAll('button[name="status"], .action-icon');
        actionButtons.forEach(button => {
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
@endsection