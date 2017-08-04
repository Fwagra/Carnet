<?php namespace App\Http\Observers;

use App\Photo;
use App\Trip;

class PhotoObserver {

  /**
   * Detach the head image of a trip when the image is deleted
   * @param \App\Photo $model
   */
  public function deleted($model){
    $trips = Trip::where('image_id', $model->id)->get();
    foreach ($trips as $trip) {
      $trip->image_id = 0;
      $trip->save();
    }
  }

}
