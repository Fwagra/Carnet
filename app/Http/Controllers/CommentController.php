<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
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
        $comments = Comment::orderBy('id', 'desc')->paginate(25);
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
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($comment)
    {
        return View::make('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'message' => 'required|max:1500',
        ]);
        $comment->update($request->all());
        $active = (!empty($request->get('active'))) ? '1' : '0';
        $comment->active = $active;
        $comment->save();

        Toastr::success(trans('comment.update_success_msg'));
        return Redirect::route('comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $comment->delete();
        Toastr::success(trans('comment.delete_success_msg'));
        return Redirect::route('comment.index');
    }
}
