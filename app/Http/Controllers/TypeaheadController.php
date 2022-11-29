<?php
namespace App\Http\Controllers;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Models\Stop;
use App\Models\SearchPair;
use DB;


class TypeaheadController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function indexNext()
    {

        return view('search-faze-two');
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Stop::where('name', 'LIKE', '%'. $query. '%')->get();
        return response()->json($filterResult);
    }

    public function indexSubmit(Request $request)
    {
        $stop = new Stop;
        // find stop by name ( from input)
        print ($request->input('search'));
        $stop = $stop->findStop($request->input('search'));
        if($stop->id == null){
            return redirect()->route('search');
        }
        SearchPair::truncate();
        $pair = new SearchPair();
        $pair->from = $request->search;
        $pair->to = '';
        $pair->save();
        return redirect()->route('search-faze-two');
    }

    public function indexSubmitFazeTwo(Request $request)
    {
        $pair = SearchPair::first();
        $pair->to = $request->search;
        $pair->save();

        return redirect()->route('search-results', ['data' => $pair]);
    }

    public function searchResults()
    {
        $pair = SearchPair::first();

        $stop1 = new Stop;
        $stop2 = new Stop;

        // find stop start and stop finish
        foreach ($stop1->all() as $el){
            if (strcmp($el->name, $pair->from) == 0){
                $stop1 = $el;
            }
            if(strcmp($el->name, $pair->to) == 0){
                $stop2 = $el;
            }
        }

        $array = DB::table('route_stop')->select('*')->where('stop_id', $stop1->id)->get();
        $array_final = [];

        foreach($array as $el){
            $tmp = DB::table('route_stop')->select('route_id')
                ->where('stop_id', $stop2->id)->where('route_id', $el->route_id)
                ->where('number_on_route', '>', $el->number_on_route)->get();
            if($tmp->isNotEmpty()){
                array_push($array_final, $tmp);
            }
        }
        $arr = [[]];
        foreach($array_final as $el){
            $tmp_array = [];


            foreach (Route::all() as $route){
                if($route->id == $el[0]->route_id){
                        array_push($tmp_array, '[' . $route->name . ']');
                        array_push($tmp_array, $stop1->name);
                        array_push($tmp_array, $stop2->name);
                        array_push($tmp_array, $route->printStartTime());
                        array_push($tmp_array, $route->printFinishTime());

                }
            }

            array_push($arr, $tmp_array);

        }
        return view('search-results', ['data' => $pair, 'array' => $array_final, 'arr' => $arr]);
    }



    public function addStopToRoute($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('add-stop-to-route', ['data' => Route::find($id), 'stops' => Route::find($id)->stops]);
    }



    public function addStopToRouteSubmit($id, Request $request): \Illuminate\Http\RedirectResponse {

        $valid = $request->validate([
            'search' => 'required',
        ]);

        $stop = new Stop;
        foreach ($stop->all() as $el ){
            if(strcmp($el->name, $request->search) == 0){
                $stop = $el;
            }
        }
        $route = Route::find($id);


        if ($stop->id == null){
            return redirect()->route('add-stop-to-route', ['id' => $id, 'data' => $route->stops])->with('success', "Wrong data, try again!");
        }

        if(!empty($route->stops)) {
            foreach ($route->stops as $el) {
                if ($stop->id == $el->id) {
                    return redirect()->route('add-stop-to-route', ['id' => $id, 'data' => $route->stops])->with('success', "This stop is already in route!");
                }
            }
        }

        $i = 1;
        foreach ($route->stops as $el) {
            $i++;
        }

            $route->stops()->attach($stop, ['number_on_route' => $i]);


        return redirect()->route('add-stop-to-route', ['id' => $id, 'stops' => $route->stops])->with('success', "Success! Stop for route was created!");
    }


    public function deleteLastStop($id): \Illuminate\Http\RedirectResponse {
        $route = Route::find($id);
        $route->stops()->detach();
        return redirect()->route('add-stop-to-route',['id' => $id])->with('success', "Success! All stops were deleted!");
    }



}
