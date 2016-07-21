<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Observers\StepObserver;

class Step extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'trip_id', 'active', 'md_value', 'km', 'type', 'date', 'html_value', 'final_step'];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['date'];

    /**
     * Get the trip that owns the step.
     */
    public function trip()
    {
        return $this->belongsTo('App\Trip');
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

    public static function boot() {
        parent::boot();

        Step::observe(new StepObserver());
    }
}
