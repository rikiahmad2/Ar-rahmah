<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngsuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_anggota')->unsigned();
            $table->string('nama_pemegang');
            $table->enum('paket_takaful', ['50000000', '100000000']);
            $table->enum('masa_perjanjian', ['5', '10', '25']);
            $table->enum('cara_bayar', ['1']);
            $table->string('total_bayarTahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsuran');
    }
}
