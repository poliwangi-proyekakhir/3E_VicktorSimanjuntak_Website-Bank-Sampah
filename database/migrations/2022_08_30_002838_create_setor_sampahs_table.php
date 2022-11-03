<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorSampahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setor_sampahs', function (Blueprint $table) {
            $table->id();
            $table->integer('warga_id');
            $table->integer('request_id');
            $table->integer('jumlah_setor');
            $table->integer('kuantitas_sampah');
            $table->string('method');
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
        Schema::dropIfExists('setor_sampahs');
    }
}
