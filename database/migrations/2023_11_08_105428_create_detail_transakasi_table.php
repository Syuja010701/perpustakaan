<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transakasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_buku')->notNull()->references('id')->on('buku')->onUpdate('cascade')->onDelete('cascade');
            $table->string('telat_pengembalian');
            $table->integer('denda');
            $table->foreignId('id_transaksi')->notNull()->references('id')->on('transaksi')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_transakasi');
    }
};
