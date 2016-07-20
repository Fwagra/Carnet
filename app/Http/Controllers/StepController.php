<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;

class StepController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('auth', ['except' => ["index", "show"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function create($trip)
    {
        return View::make('steps.create', compact('trip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trip)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Trip $trip
     * @param  App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function show($trip, $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Trip $trip
     * @param  App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function edit($trip, $step)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Trip $trip
     * @param  App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip, $step)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Trip $trip
     * @param  App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip, $step)
    {
        //
    }
}
