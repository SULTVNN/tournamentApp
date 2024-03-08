@extends('layouts.navbar')
@extends('layouts.header')

@section('header')
<div class="welcome">
    @section('navbar')
    <div class="home-welcome">
        <div class="home-welcome-img"><center><img src="{{asset("logo.png")}}" width="50%" alt=""></center></div>
        <hr style="
        display: block;
        color: white;
        height: 1px;
        border: 0px ;
        border-top: 1px solid #dbdbdb;
        width:80%;
        margin: 1em 0;
        padding: 0;">
        <div class="home-welcome-hello">
            Hello in collage <br>
            Tournament
        </div>
        <hr style="
        display: block;
        color: white;
        height: 1px;
        border: 0px ;
        border-top: 1px solid #dbdbdb;
        width:90%;
        margin: 1em 0;
        padding: 0;">
        <div class="home-welcome-Clash">
            "Welcome to Collegiate Clash: Where Academic Excellence Meets Competitive Spirit! Dive into the heart of the action with our dynamic platform showcasing the best of collegiate tournaments across diverse disciplines. From brainy battles in quiz bowls to fierce debates, thrilling sports showdowns, and innovative
        </div>
    </div>
</div>
@endsection

