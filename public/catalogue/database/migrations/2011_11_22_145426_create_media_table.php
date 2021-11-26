<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('id_media');
            $table->string('title');
            $table->string('poster_link')->nullable();
            $table->string('release_date')->nullable();
            $table->string('actors')->nullable();
            $table->string('duration')->nullable();
            $table->string('genre')->nullable();
            $table->string('synopsis')->nullable();
            $table->foreignId('code_type')->references('code')->on('keyvalue');
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
        Schema::dropIfExists('media');
    }
}
