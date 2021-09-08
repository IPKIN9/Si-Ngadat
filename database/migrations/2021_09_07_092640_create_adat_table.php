<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adat', function (Blueprint $table) {
            $table->id();
            $table->string('isi_perjanian');
            $table->string('keterangan');
            $table->string('ttd');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('desa')->nullable()->constrained('desa');
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
        Schema::dropIfExists('adat');
    }
}
