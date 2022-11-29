@extends('main-layout')
@section('title')Login @endsection

@section('main_content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <h1>All stops:</h1>
    @can('create-stop')
        <a class="d-inline-block" href="{{route('create-stop')}}">
            <button type="submit" class="btn btn-success">Create new stop</button>
        </a>
    @endcan
    @foreach($data as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>{{$el->x}}</p>
            <p>{{$el->y}}</p>

            @can('edit-stop')
                <a class="d-inline-block" href="{{route('edit-stop', $el->id)}}">
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </a>
            @endcan
            @can('delete-stop')
                <form class="d-inline-block" method="post" action="{{route('delete-stop', $el->id)}}"}>
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    @endforeach

@endsection
