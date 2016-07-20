<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    /**
     * Get the trip that owns the step.
     */
    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = ['date'];
}
