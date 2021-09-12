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
            $table->string('isi_perjanjian');
            $table->string('keterangan');
            $table->string('ttd');
            $table->foreignId('desa_id')->nullable()->constrained('desa');
            $table->foreignId('hukum_id')->nullable()->constrained('hukum');
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
