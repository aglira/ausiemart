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
        Schema::create('cabang', function (Blueprint $table) {
            $table->integer('id_cabang',true)->nullable(false);
            $table->integer('id_perusahaan', false)->index('FkIdPerusahaan');
            $table->string('nama_cabang', 100)->nullable(false);
            $table->text('alamat');

            //foreign key
            $table->foreign('id_perusahaan')
                  ->references('id_perusahaan')->on('perusahaan')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabang');
    }
};
