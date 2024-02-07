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
           Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('produk_id');
            $table->string('quantity');
            $table->string('nama_pembeli');
            $table->string('no_telepone');
            $table->text('alamat');
            $table->string('courier');
            $table->string('estimasi');
            $table->string('total_pemesanan');
            $table->date('tanggal_pemesanan')->nullable();
            $table->enum('status_pemesanan',['Unpaid','Paid'])();
            $table->string('metode_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
