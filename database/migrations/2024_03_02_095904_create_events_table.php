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
        Schema::create('events', function (Blueprint $table) {
            $table->string('event-name');
            $table->text('event-description');
            $table->integer('number-of-individuals')->default(0);
            $table->integer('number-of-teams')->default(0);
            $table->integer('id', true);
            $table->integer('points');
            $table->integer('tournament-id')->index('tournament-id');
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
        Schema::dropIfExists('events');
    }
};
