@extends('layouts.header')
@section('header')
    <div class="SignUp">
        <form class="SignUpForm" action="{{route("store")}}" method="POST">
            @csrf
            <div class="SignUp-inputs">
                <center><a href="{{route("index")}}"><img src="{{asset("logo.png")}}" alt="" class="logo"></a></center>
            </div>
            <div class="SignUp-inputs">
                {{-- <div class="names">
                    <input type="text" name="FirstName" placeholder="FirstName">
                    <input type="text" name="SecondName" placeholder="SecondName">
                </div> --}}
                <div class="pass">
                    <input type="text" name="userName" placeholder="userName" value="{{ old('userName') }}">
                    @error('userName')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <input type="text" name="email" placeholder="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <input type="password" name="Password" placeholder="Password" value="{{ old('Password') }}">
                    @error('Password')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="SignUp-inputs">
                <input type="submit" class="btn-submit-signUp" value="SignUp">
            </div>
            <div class="do-you">
                <span>do you have account? </span><span><a href="{{route("login")}}">Login</a></span>
            </div>
            {{-- @if ($errors->any())
                <div class="alert text-light w-50">
                    <h4 class="alert-heading">invalid</h4>
                    @foreach ($errors->all() as $item)
                        <p>{{$item}}</p>
                    @endforeach
                </div>
            @endif --}}
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
