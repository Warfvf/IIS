@extends('main-layout')
@section('title')Search @endsection

@section('main_content')
    <form class="d-inline-block" method="post" action={{route('index-submit-faze-two')}}>
        @csrf
        <input type="text" id="search" name="search" placeholder="Search" class="form-control" /><br>
        <button type="submit" class="btn btn-success">Enter second stop</button>
    </form>


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
    })
</script>
@endsection


