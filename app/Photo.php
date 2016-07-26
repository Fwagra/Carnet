<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $pathImages = 'uploads/photos/full/';
    protected $pathImagesLight = 'uploads/photos/light/';
    protected $pathImagesThumb = 'uploads/photos/thumb/';


    /**
    * Return the path for the "Thumb" version of an image
    */
    public function getThumb()
    {
        return $this->pathImagesThumb . $this->filename;
    }

    /**
     * Return the path for the "Light" version of an image
     */
    public function getLight()
    {
        return $this->pathImagesLight . $this->filename;
    }

    /**
     * Return the path for the "Full" version of an image
     */
    public function getFull()
    {
        return $this->pathImages . $this->filename;
    }

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
