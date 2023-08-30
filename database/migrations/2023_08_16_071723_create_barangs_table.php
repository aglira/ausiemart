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
        Schema::create('barang', function (Blueprint $table) {
            $table->integer('id_barang',true)->nullable(false);
            $table->integer('id_cabang', false)->nullable(false)->index('idCabangBarang');
            $table->string('nama_barang', 100)->nullable(false);
            $table->integer('harga', false)->nullable(false);
            $table->integer('stok', false, false);
            $table->timestamps();

            //foreign key
            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')
                  ->onDelete('cascade')->onUpdate('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
