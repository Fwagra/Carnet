<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Markdown;
use Toastr;
use App\Step;
use App\Trip;
use App\Photo;
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
     * @param  \App\Trip $trip
     * @return \Illuminate\Contracts\View\View
     */
    public function create($trip)
    {
        $photosJSON = [];
        $fieldPhotos = serialize($photosJSON);
        $count = 0;

        return View::make('steps.create', compact('trip',  'fieldPhotos', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trip)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'md_value' => 'required',
            'km' => 'numeric',
            'date' => 'required|date',
            'type' => 'required',
        ]);

        if(!empty($request->get('final_step'))){
            $this->resetOtherFinalSteps($trip);
        }

        //Sync photos
        $photos = $request->get('photos');
        $photos = explode(',', $photos);
        $active = (!empty($request->get('active'))) ? '1' : '0';
        $final_step = (!empty($request->get('final_step'))) ? '1' : '0';
        $html_value = Markdown::string($request->get('md_value'));
        $trip_id = $trip->id;

        $request->merge([
            'active' => $active,
            'final_step' => $final_step,
            'html_value' => $html_value,
            'trip_id' => $trip_id,
        ]);

        $step = Step::create($request->except('photos'));
        if(!empty($photos[0]))
            $step->photos()->sync($photos);

        Toastr::success(trans('step.create_success_msg'));
        return redirect()->action('TripController@show', ['trip' => $trip->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip $trip
     * @param  \App\Step $step
     * @return \Illuminate\Contracts\View\View
     */
    public function show($trip, $step)
    {
        $featured = ($step->image_id > 0)? Photo::find($step->image_id) : null;
        return View::make('steps.show', compact('trip','step', 'featured'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip $trip
     * @param  \App\Step $step
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($trip, $step)
    {
        $pois = $step->pois;
        $pois_icons = $step->pois_icon;
        $photos = $step->photos()->select('id')->get();

        $photosJSON = [];
        if(count($photos)){
            foreach ($photos as $key => $photo) {
                $photosJSON[] = $photo->id;
            }
        }
        $count = count($photos);
        $fieldPhotos = serialize($photosJSON);
        $photosJSON = json_encode($photosJSON);

        return View::make('steps.edit', compact('trip', 'step', 'pois', 'pois_icons','photosJSON', 'fieldPhotos', 'count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip $trip
     * @param  \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $trip, $step)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'md_value' => 'required',
            'km' => 'numeric',
            'date' => 'required|date',
            'type' => 'required',
        ]);

        if(!empty($request->get('final_step'))){
            $this->resetOtherFinalSteps($trip);
        }
        //Sync photos
        $photos = $request->get('photos');
        $photos = explode(',', $photos);
        $photos = (empty($photos[0])) ? [] : $photos;

        $step->photos()->sync($photos);

        $active = (!empty($request->get('active'))) ? '1' : '0';
        $final_step = (!empty($request->get('final_step'))) ? '1' : '0';
        $html_value = Markdown::string($request->get('md_value'));

        $request->merge([
            'active' => $active,
            'final_step' => $final_step,
            'html_value' => $html_value,
        ]);

        $step->update($request->except('photos'));

        Toastr::success(trans('step.update_success_msg'));
        return redirect()->action('TripController@show', ['trip' => $trip->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip $trip
     * @param  \App\Step $step
     * @return \Illuminate\Http\Response
     */
    public function destroy($trip, $step)
    {
        $step->delete();
        Toastr::success(trans('step.delete_success_msg'));
        return redirect()->action('TripController@show', $trip->slug);
    }

    /**
     * Reset all the already existing final steps
     * @param \App\Trip $trip
     */
    public function resetOtherFinalSteps($trip)
    {
        $steps = $trip->steps()->final()->get();
        if(count($steps)){
            foreach ($steps as $key => $step) {
                $step->final_step = 0;
                $step->save();
            }
        }
    }
}
