<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyvalueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyvalue', function (Blueprint $table) {
            // $table->id('id_keyvalue');
            $table->string('type');
            $table->unsignedBigInteger('code')->index();
            $table->string('label');
            $table->timestamps();
            $table->primary(['type', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keyvalue');
    }
}
