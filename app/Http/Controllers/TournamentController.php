<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;
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

        return to_route("create");
    }
    public function login()
    {
        return view("login");
    }
    public function auth(Request $request)
    {
        $request->validate([
            'userName' => 'required',
            'Password' => 'required|min:8',
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function tournament()
    {
        $tournaments = Tournament::all();
        $events = Event::all();
        return view("tournament" , ["tournaments"=>$tournaments , "events"=>$events]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
