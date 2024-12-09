<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkmDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikm_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->string('nib');
            $table->string('nama_pemilik');
            $table->text('alamat_pemilik');
            $table->text('alamat_usaha');
            $table->string('kapasitas_bulan');
            $table->string('kapasitas_tahun');
            $table->string('halal')->nullable();
            $table->string('pirt')->nullable();
            $table->string('bpom')->nullable();
            $table->string('bidang_usaha');
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
        Schema::dropIfExists('ikm_data');
    }
}
