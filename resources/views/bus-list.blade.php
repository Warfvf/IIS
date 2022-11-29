@extends('main-layout')
@section('title')Login @endsection

@section('main_content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <h1>All buses:</h1>
    @can('create-bus')
        <a class="d-inline-block" href="{{route('create-bus')}}">
            <button type="submit" class="btn btn-success">Create new bus</button>
        </a>
    @endcan
    @foreach($data as $el)
        <div class="alert alert-warning">
            <h3>{{$el->id}}</h3>
            <b>{{$el->name}}</b>
            <p>Capacity - {{$el->capacity}}</p>
            @can('edit-bus')
            <a class="d-inline-block" href="{{route('edit-bus', $el->id)}}">
                <button type="submit" class="btn btn-secondary">Edit</button>
            </a>
            @endcan
            @can('delete-bus')
            <form class="d-inline-block" method="post" action="{{route('delete-bus', $el->id)}}"}>
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endcan
        </div>
    @endforeach

@endsection
