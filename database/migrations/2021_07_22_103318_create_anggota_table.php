<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('akad')->default('Mudharabah');
            $table->string('jenisproduk')->default('Takaful Dana Pendidikan (FULNADI)');
            $table->string('namaortu');
            $table->date('tglortu');
            $table->string('usiaortu');
            $table->string('jkortu', ['l', 'p']);
            $table->string('namaanak');
            $table->date('tglanak');
            $table->string('usiaanak');
            $table->enum('jkanak', ['l', 'p']);
            $table->enum('perokok', ['perokok', 'non-perokok']);
            $table->text('alamat');
            $table->string('pekerjaan');
            $table->string('notelp');
            $table->string('email');
            $table->enum('standart', ['Y', 'N']);
            $table->enum('kontribusi', ['1000000']);
            $table->enum('carabayar', ['1']);
            $table->enum('tahapan', ['TK', 'SD', 'SMP', 'SMA', 'PT']);
            $table->string('namaagen');
            $table->string('nomoragen');
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
        Schema::dropIfExists('anggota');
    }
}
