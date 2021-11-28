<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->string('pseudo_sub');
            $table->foreign('pseudo_sub')->references('pseudo')->on('users')->onDelete('cascade');
            $table->foreignId('id_playlist_sub')->references('id_playlist')->on('playlist')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['pseudo_sub', 'id_playlist_sub']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
}
