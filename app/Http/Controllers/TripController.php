<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Http\Requests;
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
        return View::make('home')->with(compact('trips'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show($trip)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($trip)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip)
    {
        //
    }
}
