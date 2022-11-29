@extends('main-layout')

@section('title')Edit route @endsection

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
    <h1>Edit route</h1>
    <form method="post" action={{route('create-route-submit')}}>
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter name of the route" class="form-control"><br>
        <input type="text" name="interval" id="interval" placeholder="Interval in minutes" class="form-control"><br>
        <input type="text" name="days" id="days" placeholder="Days from 1 to 7" class="form-control"><br>
        <input type="text" name="startTime" id="startTime" placeholder="hh:mm format" class="form-control"><br>
        <input type="text" name="finishTime" id="finishTime" placeholder="hh:mm format" class="form-control"><br>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
