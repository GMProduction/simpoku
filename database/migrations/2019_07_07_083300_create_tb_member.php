<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', '25')->unique();
            $table->string('email', '191')->unique();
            $table->string('password', '191');
            $table->string('firstname', '191');
            $table->string('lastname', '191');
            $table->text('address');
            $table->string('phone', '15');
            $table->enum('job', ['Dokter Splesialis', 'Dokter Umum', 'PPDS', 'Mahasiswa Kedokteran', 'Perawat', 'Apoteker', 'Farmasi', 'Others']);
            $table->date('dateofbirth');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('tb_member');
    }
}
