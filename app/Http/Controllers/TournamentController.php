<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use App\Models\TeamScore;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("welcome");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            'email' => 'required|unique:users|email',
            'userName' => 'required|unique:users',
            'Password' => 'required|min:8',
        ]);

        User::create([
            'email' => $request->email,
            'username' => $request->userName,
            'password' => $request->Password
        ]);

        return to_route("index");
    }

    public function login()
    {
        if (Auth::check()) {
            return to_route("index");
        }
        return view("login");
    }

    public function auth(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'Password' => 'required',
        ]);
        $credentials = [
            'username' => $request->userName,
            'password' => $request->Password
        ];
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            return to_route("index");
        }
        return back()->withErrors([
            'userName' => "user not found",
        ])->withInput(['userName']);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    /**
     * Display the specified resource.
     */
    public function tournament()
    {
        $tournaments = Tournament::all();
        $events = Event::all();
        return view("tournament", ["tournaments" => $tournaments, "events" => $events]);
    }

    public function team()
    {
        if (Auth::check()) {
            $team = null;
            $points = 0;
            $tournaments = null;
            if (Auth::user()["team-id"] != null) {
                $team = Team::find(Auth::user()["team-id"]);
                $event_points = TeamScore::where('team-id', Auth::user()["team-id"])->get();
                foreach ($event_points as $event) {
                    $points += $event->points;
                }
                /*$events = Event::where()*/
            }
            return view("team", ["team" => $team, "points" => $points, "tournaments" => $tournaments]);
        } else {
            return to_route("index");
        }
    }
    public function createTeam()
    {
        if (Auth::check()) {
            $currentUserId = Auth::id();
            $otherUsers = User::whereNot('id', $currentUserId)->get();
            return view("createTeam", ["members" => $otherUsers]);
        } else {
            return to_route("index");
        }
    }
    public function teamjoine($tournamentId)
    {
        if (Auth::check()) {
            $currentUserId = Auth::user()->username;
            $isTeamleader = Team::where("team-leader", $currentUserId)->get();
            $typeOfTournament = Tournament::find($tournamentId)["tournament-type"];
            if (!isset($isTeamleader[0])) {
                return to_route("team");
            } else {
                if ($typeOfTournament == "team") {
                    $events = Event::all();
                    $teamID = $isTeamleader[0]->id;
                    // check if team joined this tournment before
                    $isTeamJoined = TeamScore::where("team-id", 4)->get();
                    if (isset($isTeamJoined[0])) {
                        return redirect()->back();
                    }
                    foreach ($events as $event) {
                        if ($event["tournament-id"] == $tournamentId) {
                            if ($event["number-of-teams"] >= 4) {
                                return redirect()->back();
                            }else{
                                TeamScore::create([
                                "team-id" => $teamID,
                                "event-id" => $event["id"],
                                "points" => 0
                            ]);
                            Event::where("tournament-id", $event["tournament-id"])->update([
                                "number-of-teams" => $event["number-of-teams"] + 1
                            ]);
                            }
                        }
                    }
                    return redirect()->back();
                } else {
                    //what happen if individual tournment
                    return to_route("index");
                }
                /*TeamScore::create([
                    "team-id"=>$teamID,
                    "event-id"=>,
                    "points"
                    ]);*/
            }
        } else {
            return to_route("index");
        }
    }
    public function storeTeam(Request $request)
    {
        // Validate the incoming request
        if (Auth::check()) {
            $k = Auth::user()->username;
            $request->validate([
                'team-leader' => "required|exists:users,username|unique:teams|unique_values:member2,member3,member4|unique_team_members:teams,member2,member3,member4,team-leader",
                'team-name' => 'required|unique:teams',
                'member1' => 'required|exists:users,username|unique:teams|unique_values:member2,member3,member4|unique_team_members:teams,member2,member3,member4,team-leader',
                'member2' => 'required|exists:users,username|unique:teams|unique_values:member1,member3,member4|unique_team_members:teams,member1,member3,member4,team-leader',
                'member3' => 'required|exists:users,username|unique:teams|unique_values:member1,member2,member4|unique_team_members:teams,member1,member2,member4,team-leader',
                'member4' => 'required|exists:users,username|unique:teams|unique_values:member1,member2,member3|unique_team_members:teams,member1,member2,member3,team-leader'
            ]);
            $team = Team::create([
                'team-leader' => Auth::user()->username,
                'member1' => $request->member1,
                'member2' => $request->member2,
                'member3' => $request->member3,
                'member4' => $request->member4,
                'team-name' => $request["team-name"],
            ]);
            $userUsernames = [
                $request['team-leader'],
                $request['member1'],
                $request['member2'],
                $request['member3'],
                $request['member4'],
            ];

            // Step 3: Update the user records
            User::whereIn('username', $userUsernames)->update(['team-id' => $team->id]);
            return to_route("index");
        } else {
            return to_route("index");
        }
    }


    public function admin()
    {
        if (Auth::check()) {
            if (Auth::user()->privileges == "admin") {
                $teamName = function($teamId){
                    return Team::find($teamId)["team-name"];
                };
                $eventName = function($eventId){
                    return Event::find($eventId)["event-name"];
                };
                return view("admin",["ddata"=>TeamScore::all() , "team"=>$teamName, "event"=>$eventName]);
            } else {
                return to_route("index");
            }
        } else {
            return to_route("index");
        }
    }
    public function score($teamid,$eventid)
    {
        if (Auth::check()) {
            if (Auth::user()->privileges == "admin") {
                return view("setScore",["teamId"=>$teamid,"eventId"=>$eventid]);
            } else {
                return to_route("index");
            }
        } else {
            return to_route("index");
        }
    }
    public function setScore(Request $request,$teamid,$eventid)
    {
        $request->validate([
                'score' => 'required',
            ]);
        if (Auth::check()) {
            if (Auth::user()->privileges == "admin") {
                TeamScore::where("team-id",$teamid, 'and')->where("event-id",$eventid)->update([
                    "points"=>$request->score
                ]);
                return to_route("admin");
            } else {
                return to_route("index");
            }
        } else {
            return to_route("index");
        }
    }
}
