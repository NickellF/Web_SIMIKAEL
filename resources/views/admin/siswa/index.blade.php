@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 w-full sm:w-auto text-center sm:text-left">Data Siswa</h1>
        <a href="{{ route('admin.siswa.create') }}" class="w-full sm:w-auto text-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center justify-center">
            <i class="fas fa-plus mr-2"></i> Tambah Siswa Baru
        </a>
    </div>

    <div class="bg-white shadow overflow-x-auto sm:rounded-lg">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 hidden sm:table-header-group">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">No</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIS</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($siswa as $index => $item)
                    <tr class="flex flex-col sm:table-row">
                        <td class="px-4 py-3 sm:table-cell" data-label="No">
                            <span class="sm:hidden font-bold mr-2"></span>
                            {{ $siswa->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3 sm:table-cell" data-label="NIS">
                            <span class="sm:hidden font-bold mr-2"></span>
                            {{ $item->nis }}
                        </td>
                        <td class="px-4 py-3 sm:table-cell" data-label="Nama">
                            <span class="sm:hidden font-bold mr-2"></span>
                            {{ $item->nama_siswa }}
                        </td>
                        <td class="px-4 py-3 sm:table-cell" data-label="Kelas">
                            <span class="sm:hidden font-bold mr-2"></span>
                            {{ $item->kelas }}
                        </td>
                        <td class="px-4 py-3 sm:table-cell" data-label="Jurusan">
                            <span class="sm:hidden font-bold mr-2"></span>
                            {{ $item->jurusan }}
                        </td>
                        <td class="px-4 py-3 sm:table-cell">
                            <div class="flex justify-end space-x-2">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <button onclick="showSiswaDetail({{ json_encode([
                                        'nama_siswa' => $item->nama_siswa,
                                        'nis' => $item->nis,
                                        'kelas' => $item->kelas,
                                        'jurusan' => $item->jurusan,
                                        'username' => $item->user ? $item->user->username : 'Tidak ada'
                                    ]) }})" 
                                        class="text-green-500 hover:text-green-700 bg-white border border-gray-200 hover:bg-gray-100 p-2 rounded-l-lg">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="{{ route('admin.siswa.edit', $item) }}" 
                                        class="text-blue-500 hover:text-blue-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 p-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.siswa.destroy', $item) }}" method="POST" class="inline" 
                                        onsubmit="return confirm('Yakin ingin menghapus siswa {{ $item->nama_siswa }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="text-red-500 hover:text-red-700 bg-white border border-gray-200 hover:bg-gray-100 p-2 rounded-r-lg">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            <i class="fas fa-exclamation-circle text-yellow-500 mr-2"></i>
                            Belum ada data siswa
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($siswa->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $siswa->links() }}
            </div>
        @endif
    </div>
</div>

<div id="siswaDetailModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-900">Detail Siswa</h2>
            <button onclick="closeSiswaDetailModal()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="space-y-4">
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium text-gray-700">Nama Lengkap</span>
                <span id="modalNamaSiswa"></span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium text-gray-700">NIS</span>
                <span id="modalNis"></span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium text-gray-700">Kelas</span>
                <span id="modalKelas"></span>
            </div>
            <div class="flex justify-between border-b pb-2">
                <span class="font-medium text-gray-700">Jurusan</span>
                <span id="modalJurusan"></span>
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Username</span>
                <span id="modalUsername"></span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    @media screen and (max-width: 640px) {
        tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #e5e7eb;
        }
        
        tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            text-align: right;
        }
        
        tbody td::before {
            content: attr(data-label);
            font-weight: bold;
            margin-right: 0.5rem;
        }
        
        tbody td:last-child {
            justify-content: center;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    function showSiswaDetail(siswa) {
        document.getElementById('modalNamaSiswa').textContent = siswa.nama_siswa;
        document.getElementById('modalNis').textContent = siswa.nis;
        document.getElementById('modalKelas').textContent = siswa.kelas;
        document.getElementById('modalJurusan').textContent = siswa.jurusan;
        document.getElementById('modalUsername').textContent = siswa.username;

        const modal = document.getElementById('siswaDetailModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeSiswaDetailModal() {
        const modal = document.getElementById('siswaDetailModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection