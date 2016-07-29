<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Observers\StepObserver;

class Step extends Model
{

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['date'];

    /**
    * The attributes that should be casted to native types.
    *
    * @var array
    */
    protected $casts = [
        'pois' => 'array',
        'pois_icon' => 'array',
    ];

    /**
     * Get the trip that owns the step.
     */
    public function trip()
    {
        return $this->belongsTo('App\Trip');
    }

    /**
     * Get the comments  of the step.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Scope a query to only include final steps.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFinal($query)
    {
        return $query->where('final_step', '=', 1);
    }

    /**
     * Retrieve the first step of a query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFirstStep($query)
    {
        return $query->orderBy('date', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Retrieve the last step of a query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastStep($query)
    {
        return $query->orderBy('date', 'desc')->orderBy('id', 'desc');
    }

    public static function boot() {
        parent::boot();

        Step::observe(new StepObserver());
    }

    /**
     * Return the number of pois of a step
     * @return int $count
     */
    public function nbPois()
    {
        $pois = $this->pois;
        $count = 0;
        if (is_array($pois)) {
            foreach ($pois as $key => $poi) {
                if(!empty($poi)){
                    $count++;
                }
            }
        }
        return $count;
    }


    /**
     * Return the number of photos attached to the step
     * @return int $photos
     */
    public function nbPhotos()
    {
        $photos = $this->photos;
        return count($photos);
    }


    /**
    * The photos that belong to the step.
    */
   public function photos()
   {
       return $this->belongsToMany('App\Photo');
   }
}
