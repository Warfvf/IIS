@extends('main-layout')
@section('title')Login @endsection

@section('main_content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h1>All Routes:</h1>
    @can('create-route')
        <a class="d-inline-block" href="{{route('create-route')}}">
            <button type="submit" class="btn btn-success">Create new route</button>
        </a>
    @endcan
    @foreach($data as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>{{$el->interval}}</p>
            <p>{{$el->printStartTime()}}</p>
            <p>{{$el->printFinishTime()}}</p>
            <p>Days: {{$el->days}}</p>

            @can('edit-route')
                <a class="d-inline-block" href="{{route('edit-route', $el->id)}}">
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </a>
                <a class="d-inline-block" href="{{route('add-stop-to-route', $el->id)}}">
                    <button type="submit" class="btn btn-success">Add stop</button>
                </a>
            @endcan
            @can('delete-route')
                <form class="d-inline-block" method="post" action="{{route('delete-route', $el->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach

@endsection
