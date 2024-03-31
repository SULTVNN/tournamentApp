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
        Schema::table('teams', function (Blueprint $table) {
            $table->foreign(['team-leader'], 'team-leader')->references(['username'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['member1'], 'member1')->references(['username'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member3'], 'member3')->references(['username'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member2'], 'member2')->references(['username'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member4'], 'member4')->references(['username'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign('member1');
            $table->dropForeign('member3');
            $table->dropForeign('team-leader');
            $table->dropForeign('member2');
            $table->dropForeign('member4');
        });
    }
};
