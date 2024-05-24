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
        Schema::create('log_selesai', function (Blueprint $table) {
            $table->id('id_log');
            $table->foreignId('pesanan_id');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('pesanan_id')
                ->references('id_pesanan')
                ->on('t_pesanan')
                ->onUpdate('cascade')
                ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_selesai');
    }
};
