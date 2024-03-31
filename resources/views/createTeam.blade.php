@extends('layouts.header')
@section('header')
    <div class="SignUp">
        <form class="SignUpForm" action="{{ route('storeTeam') }}" method="POST" id="team">
            @csrf
            <div class="SignUp-inputs">
                <center><a href="{{ route('index') }}"><img src="{{ asset('logo.png') }}" alt="" class="logo"></a></center>
            </div>
            <div class="SignUp-inputs">
                <div class="pass">
                    <label for="cars" class="text-light ml-2">team name</label>
                    <input type="text" name="team-name" placeholder="team-name" value="{{old('team-name')}}">
                    @error('team-name')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <label for="cars" class="text-light ml-2">Choose a member1</label>
                    <input type="text" name="member1" id="inputField" list="options" value="{{old('member1')}}">
                    @error('member1')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <label for="cars" class="text-light ml-2">Choose a member2</label>
                    <input type="text" name="member2" id="inputField" list="options" value="{{old('member2')}}">
                    @error('member2')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <label for="cars" class="text-light ml-2">Choose a member3</label>
                    <input type="text" name="member3" id="inputField" list="options" value="{{old('member3')}}">
                    @error('member3')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <label for="cars" class="text-light ml-2">Choose a member4</label>
                    <input type="text" name="member4" id="inputField" list="options" value="{{old('member4')}}">
                    @error('member4')
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>{{$message}}
                    </div>
                    @enderror
                    <input type="text" name="team-leader" id="inputField" hidden value="{{Auth::user()->username}}">
                    <br>
                    <br>
                    @error("team-leader")
                    <div class="error">
                        <span class="material-symbols-outlined">error</span>you already in another team you can't make team
                    </div>
                    @enderror
                    <datalist id="options">
                        @foreach ($members as $member)
                            <option value="{{$member->username}}">{{$member->username}}</option>
                        @endforeach
                        <!-- Add more options as needed -->
                    </datalist>
                </div>
            </div>
            <div class="SignUp-inputs do-you">
                <input type="submit" class="btn-submit-signUp" value="create">
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
