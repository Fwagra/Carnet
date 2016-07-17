@extends('layouts.app')
@section('title', trans('trip.show_title'))
@section('content')
<div class="content-grid mdl-grid steps-list">
    <div class="mdl-card mdl-cell mdl-cell--12-col trip-head">
      <div class="mdl-card__media mdl-color-text--grey-50">
          @if ($trip->finished)
              {!! trans('trip.finished_msg') !!}
          @endif
        <h2 class="mdl-card__title-text"><a href="{{ route('trip.show', $trip->slug) }}">{{ $trip->name }}</a></h2>
        <button id="menu-1" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
          <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-1">
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
      <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored add-step goto">
          <a class="goto-link" href="{{route('trip.step.create', [$trip->slug])}}"></a>
          <i class="material-icons">add</i>
      </button>
    </div>

    @forelse ($steps as $element)

    @empty
        <div class="mdl-card mdl-cell mdl-cell--12-col">
          <div class="mdl-card__title mdl-card--expand">
              <h3>{!! trans('step.no_step_text_title') !!}</h3>
          </div>
          <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              {!! nl2br(trans('step.no_step_text')) !!}
          </div>
          <div class="mdl-card__actions mdl-card--border">
              <div class="section-spacer"></div>
            <a href="{{ action('StepController@create', $trip->slug )}}" class="mdl-button mdl-button--colored mdl-button--accent mdl-button--raised mdl-js-button mdl-js-ripple-effect">
                {!! trans('step.add_new_step_btn') !!}
            </a>
          </div>
        </div>
    @endforelse
</div>
@endsection
@section('footer')
     @include('layouts.delete_popup')
@endsection
