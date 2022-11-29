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
    <form method="post" action={{route('edit-route-submit', $data->id)}}>
        @csrf
        <input type="text" name="name" id="name" value="{{$data->name}}" placeholder="Enter name of the route" class="form-control"><br>
        <input type="text" name="interval" id="interval" value="{{$data->interval}}" placeholder="Interval in minutes" class="form-control"><br>
        <input type="text" name="days" id="days" value="{{$data->days}}" placeholder="Days from 1 to 7" class="form-control"><br>
        <input type="text" name="startTime" id="startTime" value="{{$data->printStartTime()}}" placeholder="hh:mm format" class="form-control"><br>
        <input type="text" name="finishTime" id="finishTime" value="{{$data->printFinishTime()}}" placeholder="hh:mm format" class="form-control"><br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
