@extends('layouts.header')
@section('header')
    <form action="/score/{{$teamId}}/{{$eventId}}" method="POST" class="form container">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="exampleInputPassword1" class="text-light ml-3 mt-5">points</label>
            <input type="text" class="form-control" name="score" placeholder="score">
            <button type="submit" class="btn btn-primary ml-2">Submit</button>
        </div>
    </form>
@endsection
