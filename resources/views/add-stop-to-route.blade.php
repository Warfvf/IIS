@extends('main-layout')
@section('title')Add stop @endsection

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

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


    <h1>Add stop to route</h1>
    <form class="d-inline-block" method="post" action={{route('add-stop-to-route-submit', $data->id)}}>
        @csrf
        <input type="text" id="search" name="search" placeholder="Search" class="form-control" /><br>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

    <form class="d-inline-block" method="post" action="{{route('delete-last-stop', $data->id)}}"}>
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a class="d-inline-block" href="{{route('route-list')}}">
        <button type="submit" class="btn btn-secondary">Finish</button>
    </a>

    <br>
    <br>
    <br>
    <br>
    <h3>Stops in this route: </h3>
    <?php{{$i = 0}}?>

    @foreach($stops as $stop)
        <p>{{$stop->name}} : {{++$i}}</p>
    @endforeach

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript">
        var route = "{{ url('autocomplete-search') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>





@endsection


