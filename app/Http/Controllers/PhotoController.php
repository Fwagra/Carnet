<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Photo;
use App\Http\Requests;
use Response;
use Validator;
use Image;
use File;
use DB;


class PhotoController extends Controller
{

    protected $pathImages = 'uploads/photos/full/';
    protected $pathImagesLight = 'uploads/photos/light/';
    protected $pathImagesThumb = 'uploads/photos/thumb/';


    public function __construct()
    {
        if(!File::isDirectory($this->pathImages))
            File::makeDirectory($this->pathImages,  0775, true);
        if(!File::isDirectory($this->pathImagesLight))
            File::makeDirectory($this->pathImagesLight,  0775, true);
        if(!File::isDirectory($this->pathImagesThumb))
            File::makeDirectory($this->pathImagesThumb,  0775, true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->paginate(12);
        return View::make('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'image',
        ]);

		if ($validator->fails())
		{
			return Response::make($validator->errors()->first(), 400);
		}

        $file = $request->file('file');
        $extension = $file->extension();
        $filename = sha1(time().time()).".{$extension}";

        // Saving "Full size" image
        $image_full = Image::make($file);
        $image_full->resize(1920, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_full->save($this->pathImages.$filename);

        // Saving "Light size" image
        $image_light = Image::make($file);
        $image_light->resize(1024, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_light->save($this->pathImagesLight.$filename);

        // Saving "Thumbnail" image
        $image_thumb = Image::make($file);
        $image_thumb->fit(200);
        $image_thumb->save($this->pathImagesThumb.$filename);

        $photo = Photo::create(['filename' => $filename]);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function show($photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($photo)
    {
        return View::make('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($photo)
    {
        //
    }
}
