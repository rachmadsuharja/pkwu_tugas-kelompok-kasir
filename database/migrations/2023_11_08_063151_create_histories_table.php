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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->string('nama_menu');
            $table->string('total_beli');
            $table->string('harga_menu');
            $table->string('nama_kasir');
            $table->string('total_harga');
            $table->string('total_bayar');
            $table->string('uang_kembali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
