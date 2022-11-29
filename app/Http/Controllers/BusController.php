<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Stop;
use App\Models\Route;
use App\Models\User;
use DB;

use Illuminate\Http\Request;

class BusController extends Controller
{

    public function deleteAll() {
        DB::table('route_stop')->delete();
        DB::table('stops')->delete();
        DB::table('routes')->delete();
        Bus::truncate();
        $user = User::first();
        $user->removeRole('Admin');

        return view('delete-all');
    }

    public function createBuses() {
        Bus::truncate();
        DB::table('route_stop')->delete();
        DB::table('stops')->delete();
        DB::table('routes')->delete();

        $bus = new Bus();
        $bus->name = "BG-PF-01";
        $bus->capacity = 50;
        $bus->save();

        $bus = new Bus();
        $bus->name = "PF-BG-01";
        $bus->capacity = 40;
        $bus->save();




        $stop1 = new Stop();
        $stop1->name = "Brno-Grand";
        $stop1->x = 49.1933318;
        $stop1->y = 16.6141764;
        $stop1->save();

        $stop2 = new Stop();
        $stop2->name = "Praha-Florenc";
        $stop2->x = 50.0893785;
        $stop2->y = 14.4375561;
        $stop2->save();

        $stop3 = new Stop();
        $stop3->name = "Teplice-Celni";
        $stop3->x = 50.6467048;
        $stop3->y = 13.8311782;
        $stop3->save();

        $stop4 = new Stop();
        $stop4->name = "Praha-Na-Knizeci";
        $stop4->x = 50.0684086;
        $stop4->y = 14.4022608;
        $stop4->save();

        $stop5 = new Stop();
        $stop5->name = "Pardubice-Palackeho";
        $stop5->x = 50.0346384;
        $stop5->y = 15.7588513;
        $stop5->save();

        $stop6 = new Stop();
        $stop6->name = "Prostejov-AN";
        $stop6->x = 49.4741885;
        $stop6->y = 17.1244875;
        $stop6->save();

        $stop7 = new Stop();
        $stop7->name = "Olomouc-AN";
        $stop7->x = 49.5881394;
        $stop7->y = 17.2815169;
        $stop7->save();

        $stop8 = new Stop();
        $stop8->name = "Plzen-CAN";
        $stop8->x = 49.7463899;
        $stop8->y = 13.3630241;
        $stop8->save();

        $stop9 = new Stop();
        $stop9->name = "Pisek-AN";
        $stop9->x = 49.2990763;
        $stop9->y = 14.1440387;
        $stop9->save();

        $stop10 = new Stop();
        $stop10->name = "Ceske-Budejovice-AN";
        $stop10->x = 48.9725469;
        $stop10->y = 14.4844324;
        $stop10->save();

        $stop11 = new Stop();
        $stop11->name = "Zlin-AN";
        $stop11->x = 49.2255471;
        $stop11->y = 17.6598841;
        $stop11->save();

        $stop12 = new Stop();
        $stop12->name = "Ostrava-Svinov-AN";
        $stop12->x = 49.8236432;
        $stop12->y = 18.2082431;
        $stop12->save();

        $stop13 = new Stop();
        $stop13->name = "Liberec-AN";
        $stop13->x = 50.7634847;
        $stop13->y = 15.044514;
        $stop13->save();

        $stop14 = new Stop();
        $stop14->name = "Usti-nad-labem-DPMUL";
        $stop14->x = 50.6596129;
        $stop14->y = 14.0350084;
        $stop14->save();



        $route = new Route();
        $route->name = "Brno-Grand-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("21:00:00");
        $route->interval = 60;
        $route->days = "1234560";
        $route->save();

        $route->stops()->attach($stop1, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Teplice-Celni-Praha-Florenc";
        $route->setStartTime("11:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 90;
        $route->days = "123456";
        $route->save();


        $route->stops()->attach($stop3, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Pardubice-Palackeho-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop5, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Prostejov-AN-Praha-Florenc";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "1234560";
        $route->save();


        $route->stops()->attach($stop6, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Olomouc-AN-Praha-Florenc";
        $route->setStartTime("11:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 90;
        $route->days = "123456";
        $route->save();


        $route->stops()->attach($stop7, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Plzen-CAN-Praha-Florenc";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop8, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Pisek-AN-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop9, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Ceske-Budejovice-AN-Praha-Florenc";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop10, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Zlin-AN-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop11, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Ostrava-Svinov-AN-Praha-Florenc";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop12, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Liberec-AN-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop13, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Usti-nad-labem-DPMUL-Praha-Florenc";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop14, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Na-Knizeci-Praha-Florenc";
        $route->setStartTime("11:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 90;
        $route->days = "1234560";
        $route->save();


        $route->stops()->attach($stop4, ['number_on_route' => 1]);
        $route->stops()->attach($stop2, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Praha-Na-Knizeci";
        $route->setStartTime("11:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 90;
        $route->days = "1234560";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop4, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Usti-nad-labem-DPMUL";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop14, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Liberec-AN";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop13, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Ostrava-Svinov-AN";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop12, ['number_on_route' => 2]);


        $route = new Route();
        $route->name = "Praha-Florenc-Zlin-AN";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop11, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Ceske-Budejovice-AN";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop10, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Pisek-AN";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop9, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Plzen-CAN";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 150;
        $route->days = "1234";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop8, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Olomouc-AN";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("19:00:00");
        $route->interval = 60;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop7, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Prostejov-AN";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 120;
        $route->days = "1234560";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop6, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Pardubice-Palackeho";
        $route->setStartTime("05:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 300;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop5, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Brno-Grand";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("21:00:00");
        $route->interval = 60;
        $route->days = "1234560";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop1, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Praha-Florenc-Teplice-Celni";
        $route->setStartTime("10:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 60;
        $route->days = "123456";
        $route->save();


        $route->stops()->attach($stop2, ['number_on_route' => 1]);
        $route->stops()->attach($stop3, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Teplice-Celni-Praha-Na-Knizeci";
        $route->setStartTime("11:00:00");
        $route->setFinishTime("20:00:00");
        $route->interval = 60;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop3, ['number_on_route' => 1]);
        $route->stops()->attach($stop4, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Pardubice-Palackeho-Prostejov-AN";
        $route->setStartTime("14:00:00");
        $route->setFinishTime("22:00:00");
        $route->interval = 120;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop5, ['number_on_route' => 1]);
        $route->stops()->attach($stop6, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Olomouc-AN-Plzen-CAN";
        $route->setStartTime("08:00:00");
        $route->setFinishTime("18:00:00");
        $route->interval = 120;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop7, ['number_on_route' => 1]);
        $route->stops()->attach($stop8, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Pisek-AN-Ceske-Budejovice-AN";
        $route->setStartTime("12:00:00");
        $route->setFinishTime("22:00:00");
        $route->interval = 120;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop9, ['number_on_route' => 1]);
        $route->stops()->attach($stop10, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Zlin-AN-Ostrava-Svinov-AN";
        $route->setStartTime("07:00:00");
        $route->setFinishTime("18:00:00");
        $route->interval = 60;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop11, ['number_on_route' => 1]);
        $route->stops()->attach($stop12, ['number_on_route' => 2]);



        $route = new Route();
        $route->name = "Liberec-AN-Usti-nad-labem-DPMUL";
        $route->setStartTime("12:00:00");
        $route->setFinishTime("17:00:00");
        $route->interval = 60;
        $route->days = "12345";
        $route->save();


        $route->stops()->attach($stop13, ['number_on_route' => 1]);
        $route->stops()->attach($stop14, ['number_on_route' => 2]);


        $date = '2022-11-29';
        $day  = 1;
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday','Thursday','Friday', 'Saturday');
//        echo date("w", strtotime(date('2022-11-27')));


        $user = User::first();
        $user->assignRole('Admin');
        $user->save();

        return view('create-buses', ['buses' => $bus->all(), 'stops' => $stop1->all(), 'routes' => $route->all()]);
    }

    public function routeList(){
        $routes = new Route();
        return view('route-list', ['data' => $routes->all()]);
    }

    public function busList(){
        $buses = new Bus();
        return view('bus-list', ['data' => $buses->all()]);
    }

    public function stopList(){
        $stops = new Stop();
        return view('stop-list', ['data' => $stops->all()]);
    }

    public function createBus(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        return view('create-bus');
    }

    public function createBusSubmit(Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:100',
            'capacity' => 'required|integer|min:20|max:100'
        ]);

        $bus = new Bus;
        $bus->name = $request->input('name');
        $bus->capacity = $request->input('capacity');
        $bus->save();
        return redirect()->route('bus-list', ['data' => $bus->all()])->with('success', "Success! Bus was created!");
    }

    public function editBus($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application {
        $bus = new Bus;
        return view('edit-bus', ['data' => $bus->find($id)]);
    }

    public function editBusSubmit($id, Request $request): \Illuminate\Http\RedirectResponse {
        $valid = $request->validate([
            'name' => 'required|min:2|max:100',
            'capacity' => 'required|integer|min:20|max:100'
        ]);

        $bus = Bus::find($id);
        $bus->name = $request->input('name');
        $bus->capacity = $request->input('capacity');
        $bus->save();

        return redirect()->route('bus-list')->with('success', "Success! Bus was updated!");
    }
    public function deleteBus($id): \Illuminate\Http\RedirectResponse {
        Bus::find($id)->delete();
        return redirect()->route('bus-list')->with('success', "Success! Bus was deleted!");
    }
}
