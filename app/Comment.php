<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the step that owns the comment.
     */
    public function step()
    {
        return $this->belongsTo('App\Step');
    }

}
