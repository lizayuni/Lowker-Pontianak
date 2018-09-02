<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLowkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowkers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tipeberkas_id')->unsigned();
            $table->integer('tipepekerjaan_id')->unsigned();
            $table->string('judul');
            $table->text('isi');
            $table->string('namaperusahaan');
            $table->string('alamatperusahaan');
            $table->string('penempatan');
            $table->string('bagian');
            $table->tinyInteger('suratlamaran')->default(0);
            $table->tinyInteger('cv')->default(0);
            $table->tinyInteger('ktp')->default(0);
            $table->tinyInteger('ijazah')->default(0);
            $table->tinyInteger('transkripnilai')->default(0);
            $table->tinyInteger('pasfoto')->default(0);
            $table->tinyInteger('skck')->default(0);
            $table->tinyInteger('suratketerangandokter')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->date('penutupan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipeberkas_id')->references('id')->on('tipe_berkas')->onDelete('cascade');
            $table->foreign('tipepekerjaan_id')->references('id')->on('tipe_pekerjaans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lowkers');
    }
}
