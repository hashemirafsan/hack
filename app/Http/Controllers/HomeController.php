<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TouristPlace;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        $userLocation = User::with('location')->find($id);

        if ($userLocation->is_alpha) {
            
            $touristPlaces = TouristPlace::where('is_approved', 0)->with('user')->get();

            // return $touristPlaces;

            return view('admin')
                    ->with('touristPlaces', $touristPlaces);
        }
        
        return view('home')->with('location', $userLocation);
    }

    public function visitingPlaces($area_code)
    {
        $touristPlaces = TouristPlace::
                                where('area_code', $area_code)
                                ->where('is_approved', 1)
                                ->get();

        $data = [
            'touristPlaces' => $touristPlaces
        ];

        return response()->json($data, 200);
        
    }

    public function getPlaceDetails($originLat, $originLng, $lat, $lng)
    {
        $data = [
            'origin_lat' => $originLat,
            'origin_lng' => $originLng,
            'lat' => $lat,
            'lng' => $lng
        ];

        return view('place-details', $data);
    }

    public function getDeletePlace($id)
    {
        $place = TouristPlace::find($id);
        $place->is_approved = 1;
        $place->save();

        return back();
    }

    public function getApprovePlace($id)
    {
        $place = TouristPlace::find($id);
        $place->delete();

        return back();
    }

    public function getAddPlace()
    {
        return view('addPlace');
    }

    public function postAddPlace(Request $request)
    {

        $touristPlace = new TouristPlace;
        $userId = auth()->user()->id;

        $request->merge([
            'user_id' => $userId
        ]);

        $touristPlace->fill($request->all());
        $touristPlace->save();

        $data = [
            'status' => true,
            'message' => 'Place Added Sucessfully!'
        ];

        return response()->json($data, 200);
    }

    public function getDetailsPage()
    {
        return view('');
    }

}
