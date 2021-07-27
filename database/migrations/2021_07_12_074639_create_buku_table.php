<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->nullable();
            $table->string('judul_buku');
            $table->string('cover')->nullable();
            $table->integer('id_kategori')->nullable();
            $table->integer('harga')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->integer('id_penulis')->nullable();
            $table->integer('id_penerbit')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('buku');
    }
}
