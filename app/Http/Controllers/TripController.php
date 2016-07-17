<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Http\Requests;
use Toastr;
use View;

class TripController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth', ['except' => "index"]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        return View::make('home', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:trips',
            'description' => 'max:1500',
        ]);
        $trip = Trip::create($request->all());

        Toastr::success(trans('trip.creation_success_msg'), trans('trip.creation_success_title', ['trip' => $trip->name]), ['timeOut' => '10000']);
        return redirect()->action('TripController@show', ['trip' => $trip->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show($trip)
    {
        $steps = $trip->steps;
        return View::make('trips.show', compact('trip', 'steps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($trip)
    {
        return View::make('trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:trips,name,'.$trip->id,
            'description' => 'max:1500',
        ]);
        $trip->update($request->all());

        Toastr::success(trans('trip.update_success_msg'));
        return redirect()->action('TripController@show', ['trip' => $trip->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip)
    {
        $trip->delete();
        Toastr::success(trans('trip.delete_success_msg'));
        return redirect()->action('TripController@index');
    }
}
