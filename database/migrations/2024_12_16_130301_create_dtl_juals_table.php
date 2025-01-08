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
        Schema::create('dtl_juals', function (Blueprint $table) {
            $table->id('id_dtl_jual',10); // Primary Key
            $table->unsignedBigInteger('id_jual')->nullable(); // Foreign Key ke tabel penjualan
            $table->string('kd_bbm', 20)->nullable(); // Kode BBM dengan panjang maksimum 20 karakter
            $table->integer('qty_dtl_jual'); // Jumlah detail jual
            $table->string('stats_jual', 50)->nullable(); // Status jual dengan panjang maksimum 50 karakter
            $table->foreign('id_jual')->references('id_jual')->on('transaksis')->onDelete('cascade');
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dtl_jual');
    }
};
