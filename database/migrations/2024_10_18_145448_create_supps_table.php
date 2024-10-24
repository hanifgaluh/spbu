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
        Schema::create('supps', function (Blueprint $table) {
            $table->id();
            $table->string('nm_supp');
            $table->string('jns_bbm');
            $table->integer('jml_bbm');
            $table->decimal('hrg_beli');
            $table->decimal('hrg_total', 10, 2)->nullable();
            $table->date('tgl_beli')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supps');
    }
};
