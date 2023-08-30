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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->integer('id_detail_transaksi',true,false)->nullable(false);
            $table->integer('id_transaksi', false)->index('idTransaksi')->nullable(false);
            $table->integer('id_barang', false)->index('idBarang')->nullable(false);
            $table->integer('jumlah', false)->nullable(false);
            $table->timestamps();

            //foreign key
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')
                 ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_barang')->references('id_barang')->on('barang')
                 ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
