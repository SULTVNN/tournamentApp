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
        Schema::table('team-score', function (Blueprint $table) {
            $table->foreign(['event-id'], 'event')->references(['id'])->on('events')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['team-id'], 'teamid')->references(['id'])->on('teams')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team-score', function (Blueprint $table) {
            $table->dropForeign('event');
            $table->dropForeign('teamid');
        });
    }
};
