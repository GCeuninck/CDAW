<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_media', function (Blueprint $table) {
            $table->foreignId('id_playlist_pm')->references('id_playlist')->on('playlist')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_media_pm');
            $table->foreign('id_media_pm')->references('id_media')->on('media')->onUpdate('cascade');
            $table->timestamps();
            $table->primary(['id_playlist_pm', 'id_media_pm']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_media');
    }
}
