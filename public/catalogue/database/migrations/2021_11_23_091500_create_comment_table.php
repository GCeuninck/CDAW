<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id('id_comment');
            $table->string('date_comment');
            $table->string('pseudo_comment');
            $table->foreign('pseudo_comment')->references('pseudo')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_media_comment');
            $table->foreign('id_media_comment')->references('id_media')->on('media')->onDelete('cascade')->onUpdate('cascade');
            $table->text('comment');
            $table->foreignId('code_status')->references('code')->on('keyvalue')->default(0)->onUpdate('cascade');
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
        Schema::dropIfExists('comment');
    }
}
