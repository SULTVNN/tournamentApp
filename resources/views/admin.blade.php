@extends('layouts.header')
@section('header')
    <table class="table text-light">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">team</th>
                <th scope="col">event</th>
                <th scope="col">score</th>
                <th scope="col">addscore</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ddata as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$team($item["team-id"])}}</td>
                <td>{{$event($item["event-id"])}}</td>
                <td>{{$item["points"]}}</td>
                <td><a href="/scoreForm/{{$item["team-id"]}}/{{$item["event-id"]}}" class="btn btn-primary">addScore</a></td>
            </tr
            @endforeach
        </tbody>
    </table>
@endsection
