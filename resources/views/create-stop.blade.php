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
    <form method="post" action={{route('create-stop-submit')}}>
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter name of the stop" class="form-control"><br>
        <input type="text" name="x" id="x" placeholder="Enter x coordinate" class="form-control"><br>
        <input type="text" name="y" id="y" placeholder="Enter y coordinate" class="form-control"><br>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
