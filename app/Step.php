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
}
