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
        Schema::create('detail_penulis', function (Blueprint $table) {
            $table->id();
            $table->string('domsili')->nullable();
            $table->string('agama')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twtter')->nullable();
            $table->string('linked_in')->nullable();
            $table->string('blog')->nullable();
            $table->string('youtube')->nullable();
            $table->foreignId('id_penulis')->notNull()->references('id')->on('penulis')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('detail_penulis');
    }
};
