<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $connection = 'mysql'; #spefisikasikan jenis databasenya
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
           $table->id();
           $table->foreignId('siswaid')->references('id')->on('siswa')->onDelete('cascade');
           $table->string('nama');
           $table->string('plat_nomor')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
