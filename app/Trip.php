<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'image_id', 'finished', 'slug', 'description'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the slug on saving the name
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Get the steps associated to a trip.
     */
    public function steps()
    {
        return $this->hasMany('App\Step');
    }


    /**
     * Return the number of pois of a trip
     * @return int $count
     */
    public function nbPois()
    {
        $steps = $this->steps;
        $count = 0;
            foreach ($steps as $key => $step) {
                $count += $step->nbPois();
            }
        return $count;
    }
}
