<div id="konfirmasi-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full">
        <div class="text-center">
            <i class="fas fa-exclamation-triangle text-yellow-500 text-4xl mb-4"></i>
            <h2 class="text-xl font-bold text-gray-900 mb-4" id="modal-judul">Konfirmasi Aksi</h2>
            <p class="text-gray-600 mb-6" id="modal-pesan">Apakah Anda yakin ingin melakukan aksi ini?</p>
            
            <div class="flex justify-center space-x-4">
                <button id="modal-batal" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition duration-300">
                    Batal
                </button>
                <form id="modal-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('konfirmasi-modal');
        const modalJudul = document.getElementById('modal-judul');
        const modalPesan = document.getElementById('modal-pesan');
        const modalForm = document.getElementById('modal-form');
        const modalBatal = document.getElementById('modal-batal');

        // Fungsi untuk membuka modal
        function bukaModal(judul, pesan, formAction) {
            modalJudul.textContent = judul;
            modalPesan.textContent = pesan;
            modalForm.action = formAction;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        // Fungsi untuk menutup modal
        function tutupModal() {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        // Tambahkan event listener untuk tombol batal
        modalBatal.addEventListener('click', tutupModal);

        // Simpan fungsi bukaModal di window agar bisa diakses global
        window.bukaModal = bukaModal;
        window.tutupModal = tutupModal;
    });
</script>