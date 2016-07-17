@extends('layouts.app')
@section('title', trans('trip.show_title'))
@section('content')
<div class="content-grid mdl-grid steps-list">
    <div class="mdl-card mdl-cell mdl-cell--12-col">
      <div class="mdl-card__media mdl-color-text--grey-50">
          @if ($trip->finished)
              {!! trans('trip.finished_msg') !!}
          @endif
        <h2 class="mdl-card__title-text"><a href="{{ route('trip.show', $trip->slug) }}">{{ $trip->name }}</a></h2>
        <button id="menu-1" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
          <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-1"
          <li class="mdl-menu__item goto">
              <a class="goto-link" href="{{ action('TripController@edit', $trip->slug) }}">{!! trans('trip.edit_btn') !!}</a>
          </li>
          <li class="mdl-menu__item delete_resource" data-delete="1}">
              <a href="{{ action('TripController@destroy', $trip->slug)}}">
                  {!! trans('trip.destroy_btn') !!}
              </a>
          </li>
        </ul>
      </div>
      <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
          {{--  TODO: Stats --}}
      </div>
      {{ Form::open(['url' => action('TripController@destroy', $trip->slug), 'method' => 'DELETE', 'class' => "delete-validation form-delete-1"]) }}
      {{ Form::close() }}
    </div>
</div>
@endsection
