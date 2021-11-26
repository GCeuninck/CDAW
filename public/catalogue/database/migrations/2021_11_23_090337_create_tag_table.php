<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->foreignId('id_keyvalue_tag')->references('id_keyvalue')->on('keyvalue');
            $table->foreignId('id_media_tag')->references('id_media')->on('media');
            $table->timestamps();
            $table->primary(['id_keyvalue_tag', 'id_media_tag']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag');
    }
}
