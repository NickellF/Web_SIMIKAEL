@extends('layouts.app')

@section('title', 'Daftar Pengajuan PKL')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p class="font-bold">Error</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 sm:mb-0">Daftar Pengajuan PKL</h1>
        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
            <select id="filter-status" class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="disetujui">Disetujui</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <button id="filter-btn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center shadow-sm hover:shadow">
                <i class="fas fa-filter mr-2"></i> Filter
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Siswa</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Industri</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Mulai</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Selesai</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($pengajuan as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->siswa->nama_siswa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->industri->nama_industri }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $item->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($item->status == 'disetujui' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-3">
                                <button onclick="showPengajuanDetail({{ json_encode($item) }})" 
                                    class="text-blue-600 hover:text-blue-800 transition-colors duration-200" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @if($item->status == 'pending')
                                    <button onclick="showKonfirmasiModal({{ $item->id_ajuan }}, 'disetujui', '{{ $item->siswa->nama_siswa }}')" 
                                        class="text-green-600 hover:text-green-800 transition-colors duration-200" title="Setujui">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                    <button onclick="showKonfirmasiModal({{ $item->id_ajuan }}, 'ditolak', '{{ $item->siswa->nama_siswa }}')" 
                                        class="text-red-600 hover:text-red-800 transition-colors duration-200" title="Tolak">
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            <i class="fas fa-inbox text-gray-400 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg">Belum ada pengajuan PKL</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($pengajuan->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $pengajuan->links() }}
        </div>
    @endif

    <!-- Modal Detail Pengajuan -->
    <div id="pengajuanDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900">Detail Pengajuan PKL</h2>
                <button onclick="closePengajuanDetailModal()" class="text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="modalDetailContent" class="space-y-4">
                <!-- Content will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Status -->
    <div id="konfirmasiStatusModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-4">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 mb-4">
                    <i id="konfirmasiIcon" class="text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2" id="konfirmasiJudul"></h3>
                <p class="text-gray-600 mb-6" id="konfirmasiPesan"></p>
                
                <form id="konfirmasiForm" method="POST" class="flex justify-center space-x-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" id="konfirmasiStatus">
                    <button type="button" onclick="closePengajuanKonfirmasiModal()" 
                            class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                    <button type="submit" id="konfirmasiButton" 
                            class="font-bold py-2 px-4 rounded-lg transition duration-300">
                        Ya, Konfirmasi
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover\:shadow:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    .hover\:bg-blue-700:hover {
        transform: translateY(-1px);
    }
    
    .flex.justify-end.space-x-3 {
        display: flex !important;
    }
    
    .divide-y.divide-gray-200 > tr {
        border-color: rgba(229, 231, 235, 0.7);
    }
    
    .text-blue-600, .text-green-600, .text-red-600 {
        transition: all 0.2s ease-in-out;
    }
    
    .text-blue-600:hover, .text-green-600:hover, .text-red-600:hover {
        transform: scale(1.2);
    }

    .modal-open {
        overflow: hidden;
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Alert auto-dismiss
    const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('opacity-0', 'transition-opacity', 'duration-500');
            setTimeout(() => {
                alert.remove();
            }, 500);
        }, 5000);
    });

    // Table row hover effect
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
    const filterBtn = document.getElementById('filter-btn');
    const filterStatus = document.getElementById('filter-status');
    
    filterBtn.addEventListener('click', function() {
        const selectedStatus = filterStatus.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const statusElement = row.querySelector('td:nth-child(5) span');
            if (!statusElement) return;
            
            const rowStatus = statusElement.textContent.toLowerCase().trim();
            row.style.display = (!selectedStatus || rowStatus === selectedStatus) ? '' : 'none';
        });
    });
});

// Rest of your modal functions remain the same...
[Previous JavaScript for modals]
</script>
@endsection