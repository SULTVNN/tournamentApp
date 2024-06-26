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
        Schema::create('teams', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('team-leader')->index('team-leader');
            $table->string('member1')->nullable()->index('member1');
            $table->string('member2')->nullable()->index('member2');
            $table->string('member3')->nullable()->index('member3');
            $table->string('member4')->nullable()->index('member4');
            $table->string('team-name')->unique('team-name');
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
        Schema::dropIfExists('teams');
    }
};
