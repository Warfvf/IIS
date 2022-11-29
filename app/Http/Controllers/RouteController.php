<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function createRoute(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('create-route');
    }
    public function createRouteSubmit(Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:255',
            'interval' => 'required|numeric|max:1440',
            'days' => 'required|numeric',
            'startTime' => 'required',
            'finishTime' => 'required'
        ]);

        $route = new Route;
        $route->name = $request->input('name');
        $route->interval = $request->input('interval');
        $route->days = $request->input('days');
        $route->setStartTime($request->input('startTime'));
        $route->setFinishTime($request->input('finishTime'));
        $route->save();
        return redirect()->route('route-list', ['data' => $route->all()])->with('success', "Success! Route was created!");
    }

    public function editRoute($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        $route = new Route;
        return view('edit-route', ['data' => $route->find($id)]);
    }

    public function editRouteSubmit($id, Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:255',
            'interval' => 'required|numeric|max:1440',
            'days' => 'required|numeric',
            'startTime' => 'required',
            'finishTime' => 'required'
        ]);

        $route = Route::find($id);
        $route->name = $request->input('name');
        $route->interval = $request->input('interval');
        $route->days = $request->input('days');
        $route->setStartTime($request->input('startTime'));
        $route->setFinishTime($request->input('finishTime'));
        $route->save();
        return redirect()->route('route-list')->with('success', "Success! Route was updated!");
    }
    public function deleteRoute($id): \Illuminate\Http\RedirectResponse {
        $route = Route::find($id);
        foreach($route->stops as $el){
            $route->stops()->detach($el);
        }

        Route::find($id)->delete();
        return redirect()->route('route-list')->with('success', "Success! Route was deleted!");
    }
}
