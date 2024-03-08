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
        Schema::table('individual-score', function (Blueprint $table) {
            $table->foreign(['user-id'], 'userid')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['event-id'], 'eventid')->references(['id'])->on('events')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('individual-score', function (Blueprint $table) {
            $table->dropForeign('competitorid');
            $table->dropForeign('eventid');
        });
    }
};
