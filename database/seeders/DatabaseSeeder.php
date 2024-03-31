<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //"first tournment and events"

        Tournament::create([
        'tournament-name'=>"Academic Quiz Bowl Tournaments",
        'tournament-type'=>"team",
        'image'=>"corporate-football-tournament-winter-09.jpg",
        'expired-date'=>now("Africa/cairo")->addMonth(),
        'description'=>"These tournaments feature teams of students competing against each other in a quiz format, answering questions on a wide range of academic subjects such as history, literature, science, and current events. ",
        ]);
        Event::create([
            'event-name'=>"Preliminary Rounds",
            'event-description'=>"Teams compete in multiple rounds of quiz bowl matches. Questions cover a variety of academic subjects including history, literature, science, math, fine arts, and current events. Each match consists of toss-up questions, where any player can buzz in to answer, and bonus questions awarded to the team that correctly answers the toss-up.",
            'number-of-teams'=>0,
            'points'=>1000,
            'tournament-id'=>1,
        ]);
        Event::create([
            'event-name'=>"Playoff Rounds",
            'event-description'=>"Teams with the highest scores from the preliminary rounds advance to the playoff rounds. The playoff rounds may feature more challenging questions or a different format, such as longer toss-ups or more complex bonus questions.",
            'number-of-teams'=>0,
            'points'=>2000,
            'tournament-id'=>1,
        ]);
        Event::create([
            'event-name'=>"Semi-Final Rounds",
            'event-description'=>"The top-performing teams from the playoff rounds advance to the semi-final rounds. These rounds typically have fewer teams competing and may feature specialized categories or themes for the questions.",
            'number-of-teams'=>0,
            'points'=>3000,
            'tournament-id'=>1,
        ]);
        Event::create([
            'event-name'=>"Final Rounds",
            'event-description'=>"The top two teams from the semi-final rounds face off in the final rounds. The questions in the final rounds are usually the most challenging and may cover advanced topics within the academic subjects. The team with the highest score at the end of the final rounds is declared the tournament champion.",
            'number-of-teams'=>0,
            'points'=>4000,
            'tournament-id'=>1,
        ]);
        Event::create([
            'event-name'=>"All-Star Exhibition Match",
            'event-description'=>"After the tournament champion is determined, an all-star exhibition match can be held. This match features standout players from various teams competing against each other in a friendly but competitive atmosphere. It's a chance to showcase individual talents and celebrate the achievements of all participants in the tournament.",
            'number-of-teams'=>0,
            'points'=>5000,
            'tournament-id'=>1,
        ]);

// create admine
        User::create([
            'username'=>"admin",
            'email'=>"ss@gmail.com",
            'privileges'=>"admin",
            'password'=>"123456"
        ]);
    }
}
