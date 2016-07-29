<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Redirect;
use URL;
use Toastr;
use View;
use App\Http\Requests;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(3);
        return View::make('comments.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Trip  $trip
     * @param  \App\Step  $step
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $trip, $step)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'message' => 'required|max:1500',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        $comment = Comment::create($request->except('g-recaptcha-response'));
        $comment->step_id = $step->id;
        $comment->save();

        Toastr::success(trans('step.comment_success_msg'));
        return Redirect::to(URL::previous() . "#comments");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'message' => 'required|max:1500',
        ]);
        $comment = Comment::update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
