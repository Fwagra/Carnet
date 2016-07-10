@extends('layouts.app')
@section('title', trans('trip.home_title'))
@section('content')
<div class="content-grid mdl-grid trip-list">
    @forelse ($trips as $trip)
        <div class="mdl-card mdl-cell mdl-cell--12-col">
          <div class="mdl-card__media mdl-color-text--grey-50">
            <h2 class="mdl-card__title-text">{{ $trip->name }}</h2>
          </div>
          <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              {{ $trip->description }}
          </div>
          <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              @if ($trip->finished)
                  {!! trans('trip.finished_msg') !!}
              @endif
          </div>
          @if (Auth::check())
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">

              </a>
              <div class="mdl-layout-spacer"></div>
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">

              </a>
            </div>
          @endif
        </div>
    @empty
        <div class="mdl-card">
          <div class="mdl-card__title mdl-card--expand">
              {!! trans('trip.no_trips_title') !!}
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <a href="#" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                {!! trans('trip.add_new_trip_btn') !!}
            </a>
          </div>
        </div>
    @endforelse
</div>
@endsection
