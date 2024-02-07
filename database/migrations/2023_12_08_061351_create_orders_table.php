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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_order');
            $table->foreignId('user_id');
            $table->foreignId('produk_id');
            $table->string('quantity');
            $table->string('nama_pembeli');
            $table->string('no_telepone');
            $table->text('alamat');
            $table->string('jasa');
            $table->string('estimasi');
            $table->string('kota');
            $table->string('ongkir');
            $table->string('total_pemesanan');
            $table->date('tanggal_pemesanan')->nullable();
            $table->string('status_pemesanan')->nullable();
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
