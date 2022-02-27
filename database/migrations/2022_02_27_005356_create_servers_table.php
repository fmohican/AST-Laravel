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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('NiceName');
            $table->string('SlugName');
            $table->ipAddress('serverIp');
            $table->smallInteger('serverPort')->unsigned();
            $table->string('serverPassword')->nullable();
            $table->ipAddress('rconIp');
            $table->smallInteger('rconPort')->unsigned();
            $table->string('rconPassword');
            $table->softDeletes();
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
        Schema::dropIfExists('servers');
    }
};
