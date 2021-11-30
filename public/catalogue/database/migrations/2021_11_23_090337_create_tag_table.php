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
            $table->foreignId('code_keyvalue_tag')->references('code')->on('keyvalue')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_media_tag');
            $table->foreign('id_media_tag')->references('id_media')->on('media')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->primary(['code_keyvalue_tag', 'id_media_tag']);
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
