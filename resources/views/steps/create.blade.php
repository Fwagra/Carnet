@extends('layouts.app')
@section('title', trans('step.create_title'))
@section('content')
    <div class="mdl-grid content-grid create-trip">
        <div class="mdl-card centered large-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! trans('step.create_title') !!}</h2>
          </div>
              {!! Form::open(['url' => action('StepController@store', $trip->slug)]) !!}
                      @include('steps.form')
              {!!  Form::close() !!}
        </div>
    </div>
@endsection
