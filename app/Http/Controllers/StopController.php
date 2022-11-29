<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function createStop(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('create-stop');
    }

    public function createStopSubmit(Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:100',
            'x' => 'required|numeric',
            'y' => 'required|numeric'
        ]);

        $stop = new Stop;
        $stop->name = $request->input('name');
        $stop->x = $request->input('x');
        $stop->y = $request->input('y');
        $stop->save();
        return redirect()->route('stop-list', ['data' => $stop->all()])->with('success', "Success! Stop was created!");
    }

    public function editStop($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        $stop = new Stop;
        return view('edit-stop', ['data' => $stop->find($id)]);
    }

    public function editStopSubmit($id, Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:100',
            'x' => 'required|numeric',
            'y' => 'required|numeric'
        ]);

        $stop = Stop::find($id);
        $stop->name = $request->input('name');
        $stop->x = $request->input('x');
        $stop->y = $request->input('y');
        $stop->save();
        return redirect()->route('stop-list')->with('success', "Success! Stop was updated!");
    }
    public function deleteStop($id): \Illuminate\Http\RedirectResponse {
        $stop = Stop::find($id);
        foreach($stop->routes as $el){
            $stop->routes()->detach($el);
        }
        Stop::find($id)->delete();
        return redirect()->route('stop-list')->with('success', "Success! Stop was deleted!");
    }
}
