<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        $touristPlace = User::with('touristPlaces')->find($id);

        return $touristPlace;

        return $userLocation;

        return view('home')->with('location', $userLocation);
    }

}
