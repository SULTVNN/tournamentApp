@extends('layouts.navbar')
@extends('layouts.header')

@section('header')
    <div class="tournament">
    @section('navbar')
        <div class="tournment-welcome">
            <div class="tournment-wel">
                <h2 class="text-light">Available Tournaments.</h2>
                @foreach ($tournaments as $tournament)
                    <div class="cards">
                        <img class="cards-image" src="{{ asset("tournmentsimages/$tournament->image") }}" alt="Card image cap">
                        <div class="cards-body">
                            <h5 class="cards-title">{{ $tournament['tournament-name'] }}</h5>
                            <p class="cards-text">{{ $tournament->description }}</p>
                            <div class="cards-details">
                                <div class="pp">
                                    <a href="#" class="cards-link" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $tournament['tournament-name'] }}">details</a>
                                </div>
                                <div class="prograss">
                                    <p class="number-para">
                                        @if ($tournament['tournament-type'] == 'team')
                                            {{ $events[0]['number-of-teams'] }}
                                        @else
                                            {{ $events[0]['number-of-individuals'] }}
                                        @endif
                                        {{ $tournament['tournament-type'] }} subscribed
                                    </p>
                                    <div class="number-bar">
                                        @if ($tournament['tournament-type'] == 'team')
                                            <div class="number-per"
                                                style="width:{{ ($events[0]['number-of-teams'] / 4) * 100 }}%; "></div>
                                        @else
                                            <div class="number-per"
                                                style="width:{{ ($events[0]['number-of-individuals'] / 20) * 100 }}%;"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="{{ $tournament['tournament-name'] }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">{{ $tournament['tournament-name'] }} Events</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($events as $event)
                                        @if ($event["tournament-id"]==$tournament['id'])
                                            <h5 class="event-title">{{ $event["event-name"] }}</h5>
                                            <p class="event-text">{{ $event["event-description"] }}</p>
                                            <p class="event-text text-success">points: {{ $event["points"] }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <a href="/teamjoine/{{$tournament['id']}}" class="cards-linkk" type="button">join</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
