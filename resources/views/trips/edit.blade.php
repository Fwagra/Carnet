@extends('layouts.app')
@section('title', trans('trip.edit_title'))
@section('content')
    <div class="mdl-grid content-grid create-trip">
        <div class="mdl-card centered large-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! trans('trip.edit_title') !!}</h2>
          </div>
              {!! Form::model($trip,['url' => action('TripController@update', $trip->slug), 'method'=> 'PUT']) !!}
                      @include('trips.form')
              {!!  Form::close() !!}
        </div>
    </div>
@endsection
