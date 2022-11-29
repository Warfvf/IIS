@extends('main-layout')

@section('title')Main Page @endsection

@section('main_content')
    <h1>All buses:</h1>
    @foreach($buses as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>Capacity - {{$el->capacity}}</p>
        </div>
    @endforeach
    <h1>All stops:</h1>
    @foreach($stops as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>{{$el->x}}</p>
            <p>{{$el->y}}</p>

        </div>
    @endforeach
    <h1>All routes:</h1>
    @foreach($routes as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>{{$el->interval}}</p>
            <p>{{$el->printStartTime()}}</p>
            <p>{{$el->printFinishTime()}}</p>
            <p>Days: {{$el->days}}</p>
        </div>
    @endforeach
@endsection
