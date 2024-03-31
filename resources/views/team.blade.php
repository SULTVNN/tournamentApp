@extends('layouts.navbar')
@extends('layouts.header')

@section('header')
<div class="tournament">
    @section('navbar')
        <div class="team-welcome">
            @if ($team!=null)
            <div class="team-data">
                <div class="team-name">
                    <h1 class="text-light">TeamName: <span>{{$team["team-name"]}}</span></h1>
                    <h3 class=" text-light">Only team leaders can add or remove team members and participate in tournaments.</h3>
                </div>
                <div class="team-leader">
                    <p class="text-light">TeamLeader: <span>{{$team["team-leader"]}}</span></p>
                    <p class="text-light ppp">points: <span>@if ($points)
                        {{$points}}
                        @else
                        0
                    @endif</span></p>
                </div>
                <div class="team-members">
                    <p class=" text-light">1-member: <span>{{$team["member1"]}}</span></p>
                    <p class=" text-light">2-member: <span>{{$team["member2"]}}</span></p>
                    <p class=" text-light">3-member: <span>{{$team["member3"]}}</span></p>
                    <p class=" text-light">4-member: <span>{{$team["member4"]}}</span></p>
                </div>
                <div class="team-tournments text-light">
                    <h1>Tournaments</h1>
                    <p class=" text-light"></p>
                </div>
            </div>
            @else
                <div class="team-clash">
                    <center><a href="{{route("index")}}"><img src="{{asset("logo.png")}}" alt="" class="logo"></a></center>
                    <h1 class="text-light">You have not joined a team yet.</h1>
                    <a href="/createTeam" class="btn color-tem">create teams</a>
                </div>
            @endif
        </div>
    @endsection


