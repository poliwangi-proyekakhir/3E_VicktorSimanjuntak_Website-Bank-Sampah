<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('nik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_rekening')->nullable();
            $table->double('saldo')->default(0);
            $table->string('email')->unique();
            $table->string('no_hp')->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('warga');
            $table->rememberToken();
            
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
        Schema::dropIfExists('users');
    }
}
