@extends('main-layout')

@section('title')Edit stop @endsection

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
    <h1>Edit stop</h1>
    <form method="post" action={{route('edit-stop-submit', $data->id)}}>
        @csrf
        <input type="text" name="name" id="name" value="{{$data->name}}" placeholder="Enter name of the stop" class="form-control"><br>
        <input type="text" name="x" id="x" value="{{$data->x}}" class="form-control" placeholder="Enter x coordinate"><br>
        <input type="text" name="y" id="y" value="{{$data->y}}" class="form-control" placeholder="Enter y coordinate"><br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
