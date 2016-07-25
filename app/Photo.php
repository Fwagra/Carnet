<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
    * The photos belongs to many steps
    */
   public function steps()
   {
       return $this->belongsToMany('App\Step');
   }
}
