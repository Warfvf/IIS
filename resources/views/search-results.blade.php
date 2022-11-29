@extends('main-layout')
@section('title')Result od search @endsection

@section('main_content')


    <h1>Routes:</h1>
    <p>{{$data->from}} - {{$data->to}}</p>

    @foreach($arr as $array)
        <div class="alert">
            <p style="border-bottom: 1px solid #aaa;">
        @foreach($array as $el)
                    {{$el}}
        @endforeach
            </p>
        </div>
    @endforeach


@endsection
