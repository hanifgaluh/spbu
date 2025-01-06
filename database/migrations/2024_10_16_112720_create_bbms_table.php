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
        Schema::create('bbms', function (Blueprint $table) {
            $table->bigIncrements('kd_bbm');
            $table->string('nm_bbm');
            $table->integer('ltr_bbm');
            $table->decimal('hrg_jual')->nullable();
            $table->decimal('hrg_beli')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bbms');
    }
};
