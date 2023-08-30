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
        Schema::create('kasir', function (Blueprint $table) {
            $table->integer('id_kasir',true)->nullable(false);
            $table->integer('id_cabang', false)->nullable(false)->unique('idCabang');
            $table->integer('id_akun', false)->nullable(false)->unique('idAkun');
            $table->string('nama_lengkap', 100)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false)->default('2005-05-05');
            $table->enum('jenis_kelamin', ['L','P'])->nullable(false);
            $table->text('alamat')->nullable(false);

            //foreign key cabang -> kasir
            $table->foreign('id_cabang')->references('id_cabang')->on('cabang')
                  ->onDelete('cascade')->onUpdate('cascade');

            //foreign key akun
            $table->foreign('id_akun')->references('id_akun')->on('tbl_akun')
                  ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasir');
    }
};
