<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHukumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hukum', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pelanggaran');
            $table->string('keterangan');
            $table->foreignId('adat_id')->nullable()->constrained('adat');
            $table->foreignId('denda_id')->nullable()->constrained('denda');
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
        Schema::dropIfExists('hukum');
    }
}
