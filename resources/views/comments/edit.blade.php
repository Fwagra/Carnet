@extends('layouts.app')
@section('title', trans('comment.edit_title'))
@section('content')
    <div class="mdl-grid content-grid edit-comment">
        <div class="mdl-card centered large-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! trans('comment.edit_title') !!}</h2>
          </div>
              {!! Form::model($comment, ['url' => route('comment.update', [$comment->id]), 'method' => 'PUT']) !!}
                  <div class="mdl-card__supporting-text">
                      <p>
                          {!! trans('comment.concerned_step') !!} : <a href="{{ route('trip.step.show', [$comment->step->trip->slug, $comment->step->id])}}">{{ $comment->step->name }}</a>
                      </p>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' is-invalid' : '' }}">
                          {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
                          {!! Form::label('name', trans('comment.name_form'), ['class' => "mdl-textfield__label"])!!}
                          @if ($errors->has('name'))
                              <span class="mdl-textfield__error">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('message') ? ' is-invalid' : '' }}">
                          {!! Form::textarea('message',null, ['class' => 'mdl-textfield__input']) !!}
                          {!! Form::label('message', trans('comment.message'), ['class' => "mdl-textfield__label"])!!}
                          @if ($errors->has('message'))
                              <span class="mdl-textfield__error">
                                  <strong>{{ $errors->first('message') }}</strong>
                              </span>
                          @endif
                      </div>

                      <label for="active" class="mdl-switch mdl-js-switch">
                          <input type="checkbox" id="active" name="active" value="1" @if (!isset($comment) || $comment->active == 1)
                              checked
                          @endif class="mdl-switch__input">
                          <span class="mdl-switch__label">{!! trans('comment.active_form') !!}</span>
                      </label>

                  </div>
                  <div class="mdl-card__actions mdl-card--border multi-btns">
                      <div class="section-spacer"></div>
                      <button type="button" name="delete" data-type="comment" data-delete="{{$comment->id}}" class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--primary delete_resource" >
                          {{trans('comment.delete_btn')}}
                      </button>
                      {!! Form::submit(trans('comment.submit_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
                  </div>

              {!!  Form::close() !!}
              {{ Form::open(['url' => action('CommentController@destroy', $comment->id), 'method' => 'DELETE', 'class' => "delete-validation form-delete-".$comment->id]) }}
              {{ Form::close() }}
        </div>
    </div>
@endsection
@section('footer')
     @include('layouts.delete_popup')
@endsection
