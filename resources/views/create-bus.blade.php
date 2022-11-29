@extends('main-layout')

@section('title')Edit bus @endsection

@section('main_content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Edit bus</h1>
    <form method="post" action={{route('create-bus-submit')}}>
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter name of the bus" class="form-control"><br>
        <input type="text" name="capacity" id="capacity" placeholder="Enter capacity of places (20-100 places)" class="form-control"><br>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
