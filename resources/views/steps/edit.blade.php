@extends('layouts.app')
@section('title', trans('step.edit_title'))
@section('content')
    <div class="mdl-grid content-grid edit-trip">
        <div class="mdl-card centered large-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! trans('step.edit_title') !!}</h2>
          </div>
              {!! Form::model($step, ['url' => action('StepController@update', [$trip->slug, $step->id]), 'method' => 'PUT']) !!}
                      @include('steps.form')
              {!!  Form::close() !!}
        </div>
    </div>
@endsection
