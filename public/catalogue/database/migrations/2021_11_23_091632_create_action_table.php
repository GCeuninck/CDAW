<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action', function (Blueprint $table) {
            $table->integer('code_action');
            $table->string('label_action');
            $table->string('date_action');
            $table->string('pseudo_action');
            $table->unsignedBigInteger('id_media_action');
            $table->timestamps();

            $table->primary(['code_action', 'pseudo_action', 'id_media_action']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action');
    }
}