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
        Schema::create('player_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('funcomId');
            $table->unsignedBigInteger('from');
            $table->foreign('from')->references('id')->on('servers');
            $table->unsignedBigInteger('to');
            $table->foreign('to')->references('id')->on('servers');
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
        Schema::dropIfExists('player_transfers');
    }
};
