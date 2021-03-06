<?php namespace App\Http\Observers;

use App\Photo;
use App\Step;
use App\Trip;

class PhotoObserver {

  /**
   * Detach the head image of a trip or step when the image is deleted
   * @param \App\Photo $model
   */
  public function deleted($model){
    $trips = Trip::where('image_id', $model->id)->get();
    $steps = Step::where('image_id', $model->id)->get();
    if (count($trips)){
      foreach ($trips as $trip) {
        $trip->image_id = 0;
        $trip->save();
      }
    }
    if (count($steps)) {
      foreach ($steps as $step) {
        $step->image_id = 0;
        $step->save();
      }
    }
  }

}
