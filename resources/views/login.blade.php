@extends('layouts.header')
@section('header')
    <div class="SignUp">
        <form class="SignUpForm" action="{{route("store")}}" method="POST">
            @csrf
            <div class="SignUp-inputs">
                <center><a href="{{route("index")}}"><img src="{{asset("logo.png")}}" alt="" class="logo"></a></center>
            </div>
            <div class="SignUp-inputs">
                <div class="pass">
                    <input type="text" name="userName" placeholder="userName">
                    @error('userName')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <input type="password" name="Password" placeholder="Password" v>
                    @error('Password')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="SignUp-inputs">
                <input type="submit" class="btn-submit-signUp" value="Login">
            </div>
            <div class="do-you">
                <span>do you have account? </span><span><a href="{{route("create")}}">SignUp</a></span>
            </div>
        </form>
        <div class="imageSign">
            <h4>
                2024
                <br>
                Tournment
            </h4>
        </div>

    </div>

@endsection
