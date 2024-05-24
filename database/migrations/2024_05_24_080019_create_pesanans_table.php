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
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('kategori_id');
            $table->string('nama_pemesan');
            $table->string('kontak');
            $table->integer('harga');
            $table->string('referensi')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('status_selesai');
            $table->date('tanggal_pesanan');
            $table->date('estimasi');
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('id_kategori')
                ->on('m_kategori')
                ->onUpdate('cascade')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pesanan');
    }
};
