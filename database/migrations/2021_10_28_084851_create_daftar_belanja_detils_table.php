<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarBelanjaDetilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_belanja_detils', function (Blueprint $table) {
            $table->id();
            $table->string('daftarbelanja_id');
            $table->bigInteger('nourut');
            $table->string('namabarang');
            $table->bigInteger('jml');
            $table->string('satuan');
            $table->string('memo');
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
        Schema::dropIfExists('daftar_belanja_detils');
    }
}
