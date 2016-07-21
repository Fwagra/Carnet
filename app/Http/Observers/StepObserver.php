<?php namespace App\Http\Observers;

use App\Trip;

class StepObserver {

    public function saved($model){
        $trip = Trip::find($model->trip_id);
        $steps = $trip->steps()->final()->get();
        if(count($steps)){
            $trip->finished = 1;
        }else{
            $trip->finished = 0;
        }
        $trip->save();
    }

}
