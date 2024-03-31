<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('tournament-id');
            $table->integer('participant-id')->nullable();
            $table->integer('team-id')->nullable();
            $table->foreign(['tournament-id'], 'tournamentid')->references(['id'])->on('tournaments')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['participant-id'], 'participantid')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['team-id'], 'teamidd')->references(['id'])->on('teams')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joins');
    }
};
