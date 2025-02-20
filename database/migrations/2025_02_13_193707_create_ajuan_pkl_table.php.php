<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ajuan_pkl', function (Blueprint $table) {
            $table->id('id_ajuan');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_industri');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamp('tanggal_pengajuan')->useCurrent();
            $table->enum('status', ['pending', 'disetujui', 'ditolak']);
            
            // Foreign keys
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
            $table->foreign('id_industri')->references('id_industri')->on('industri')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajuan_pkl');
    }
};
