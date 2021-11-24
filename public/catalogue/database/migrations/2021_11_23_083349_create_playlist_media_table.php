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
            $table->unsignedBigInteger('id_playlist_pm');
            $table->unsignedBigInteger('id_media_pm');
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
