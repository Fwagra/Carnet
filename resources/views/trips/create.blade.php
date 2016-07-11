@extends('layouts.app')
@section('title', trans('trip.create_title'))
@section('content')
    <div class="mdl-grid content-grid create-trip">
        <h1>{!! trans('trip.create_title') !!}</h1>
        <div class="mdl-cell mdl-cell--12-col">
            {!! Form::open(['url' => action('TripController@store')]) !!}
                    @include('trips.form')
            {!!  Form::close() !!}
        </div>
    </div>
@endsection
