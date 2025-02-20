@extends('layouts.app')

@section('title', 'Data Industri')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 sm:mb-0">Data Industri</h1>
        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
            <a href="{{ route('admin.industri.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center shadow-sm hover:shadow">
                <i class="fas fa-plus mr-2"></i> Tambah Industri
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Industri</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kontak</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($industri as $item)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->nama_industri }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $item->alamat }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->kontak }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.industri.edit', $item) }}" 
                                   class="text-amber-500 hover:text-amber-700 transition-colors duration-200" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.industri.destroy', $item) }}" method="POST" class="inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                           class="text-red-600 hover:text-red-800 transition-colors duration-200 delete-button" 
                                           data-id="{{ $item->id }}"
                                           title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            <i class="fas fa-inbox text-gray-400 text-5xl mb-4"></i>
                            <p class="text-gray-500 text-lg">Belum ada data industri</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($industri->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $industri->links() }}
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    /* Custom hover effects for buttons */
    .hover\:shadow:hover {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    /* Ensure consistent hover states */
    .hover\:bg-blue-700:hover {
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
    .text-amber-500, .text-red-600 {
        transition: all 0.2s ease-in-out;
    }
    
    /* Subtle scale effect on hover */
    .text-amber-500:hover, .text-red-600:hover {
        transform: scale(1.2);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete confirmation with a better UX
        const deleteButtons = document.querySelectorAll('.delete-button');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                
                if (confirm('Apakah Anda yakin ingin menghapus industri ini?')) {
                    this.closest('form.delete-form').submit();
                }
            });
        });
        
        // Add fade-out animation for alert messages
        const alertBox = document.querySelector('.bg-green-100');
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => {
                    alertBox.remove();
                }, 500);
            }, 5000);
        }
        
        // Add hover effect for table rows
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.classList.add('bg-gray-50');
            });
            row.addEventListener('mouseleave', function() {
                this.classList.remove('bg-gray-50');
            });
        });
    });
</script>
@endsection