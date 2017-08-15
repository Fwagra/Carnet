@extends('layouts.app')
@section('title', $trip->name)
@section('meta-desc', $trip->description)
@section('content')
<div class="content-grid mdl-grid steps-list">
    <div class="mdl-card mdl-cell mdl-cell--12-col trip-head">
        <?php
        $bg = '';
        if($trip->image_id > 0){
            $img = App\Photo::find($trip->image_id)->getLight();
            $bg = 'style="background-image:url('.url($img).');"';
        }?>
      <div class="mdl-card__media mdl-color-text--grey-50" {!! $bg !!}>
        <h2 class="mdl-card__title-text">
            <a href="{{ route('trip.show', $trip->slug) }}">
                @if ($trip->finished)
                    {!! trans('trip.finished_msg') !!}
                @endif
                {{ $trip->name }}
            </a>
        </h2>
      </div>
      <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
          <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                <i aria-hidden="true" class="material-icons icon-align">date_range</i><span class="date icon-align">{{ $dates }}</span>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                <i aria-hidden="true" class="material-icons icon-align">flag</i><span class="flag icon-align">{{ $km }} {!! trans('step.km_traveled') !!}</span>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                <i aria-hidden="true" class="material-icons icon-align">place</i><span class="place icon-align">{{ $trip->nbPois() }} {!! trans_choice('step.places_visited', $trip->nbPois()) !!}</span>
            </div>
            <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                <i aria-hidden="true" class="material-icons icon-align">image</i><span class="place icon-align">{{ $trip->nbPhotos() }} {!! trans_choice('step.photos_nb', $trip->nbPhotos()) !!}</span>
            </div>
          </div>
      </div>
      @if (Auth::check())
          <div class="mdl-card__menu">
              <button id="menu-1" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
                <i aria-hidden="true" class="material-icons">more_vert</i>
              </button>
              <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-1">
                <li class="mdl-menu__item goto">
                    <a class="goto-link" href="{{ action('TripController@edit', $trip->slug) }}">{!! trans('trip.edit_btn') !!}</a>
                </li>
                <li class="mdl-menu__item delete_resource" data-type="trip" data-delete="1">
                    <a href="{{ action('TripController@destroy', $trip->slug)}}">
                        {!! trans('trip.destroy_btn') !!}
                    </a>
                </li>
              </ul>
          </div>
      {{ Form::open(['url' => action('TripController@destroy', $trip->slug), 'method' => 'DELETE', 'class' => "delete-validation form-delete-1"]) }}
      {{ Form::close() }}
      <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored add-step goto">
          <a class="goto-link" href="{{route('trip.step.create', [$trip->slug])}}"></a>
          <i aria-hidden="true" class="material-icons">add</i>
      </button>
  @endif
    </div>
    <?php $i = 0; ?>
    @forelse ($steps as $key => $step)
        <?php
            $first = ($i == 0)? 'first' : '';
            $last = ($i == count($steps) - 1)? 'last' : '';
            $final = ($step->final_step)? 'final' : '';
         ?>
        <div class="mdl-card mdl-grid mdl-cell mdl-cell--12-col mdl-grid--no-spacing step-wrapper">
            <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-phone mdl-cell--hide-tablet {{$first}} {{$last}} {{$final}} step-icon">
                <div class="pulse"></div>
            </div>
            <?php
            $bg = '';
            if($step->image_id > 0){
                $img = App\Photo::find($step->image_id)->getLight();
                $bg = 'style="background-image:url('.url($img).');"';
            }?>
            <div class="mdl-cell mdl-cell--10-col">
              <div class="mdl-card__title mdl-card__media" {!! $bg !!}>
                  <a class="absolute-link" href="{{ route('trip.step.show', [$trip->slug, $step->id])}}"></a>
                    <h2 class="mdl-card__title-text"><a href="{{ route('trip.step.show', [$trip->slug, $step->id])}}"><i class="mdl-icon-toggle__label material-icons">{{$step->type}}</i>{{ $step->name }}
                    @if ($step->active == 0)
                      - {!! trans('step.unpublished') !!}
                    @endif
                  </a></h2>
              </div>
              <div class="mdl-card__supporting-text">
                  <div class="mdl-grid">
                      <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                          <i aria-hidden="true" class="material-icons icon-align">date_range</i><span class="date icon-align">{{ $step->date->format('d-m-Y') }}</span>
                      </div>
                      <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                          <i aria-hidden="true" class="material-icons icon-align">flag</i><span class="km icon-align">{{ $step->km }} {!! trans('step.km_traveled') !!}</span>
                      </div>
                      @if ($step->nbPois() > 0)
                          <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                              <i aria-hidden="true" class="material-icons icon-align">place</i><span class="km icon-align">{{ $step->nbPois() }} {!! trans_choice('step.pois_nb', $step->nbPois()) !!}</span>
                          </div>
                      @endif
                      @if ($step->photos->count() > 0)
                          <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                              <i aria-hidden="true" class="material-icons icon-align">image</i><span class="km icon-align">{{ $step->photos->count() }} {!! trans_choice('step.photos_nb', $step->photos->count()) !!}</span>
                          </div>
                      @endif
                  </div>
              </div>
              @if (Auth::check())
                  <div class="mdl-card__menu">
                      <button id="delete-{{$key}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
                        <i aria-hidden="true" class="material-icons">more_vert</i>
                    </button>
                      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="delete-{{$key}}">
                        <li class="mdl-menu__item goto">
                            <a class="goto-link" href="{{ action('StepController@edit', [$trip->slug, $step->id]) }}">{!! trans('trip.edit_btn') !!}</a>
                        </li>
                        <li class="mdl-menu__item delete_resource" data-type="step" data-delete="step-{{ $key }}">
                            <a href="{{ action('StepController@destroy', [$trip->slug, $step->id])}}">
                                {!! trans('trip.destroy_btn') !!}
                            </a>
                        </li>
                      </ul>
                  </div>
              @endif
              {{ Form::open(['url' => action('StepController@destroy', [$trip->slug, $step->id]), 'method' => 'DELETE', 'class' => "delete-validation form-delete-step-".$key]) }}
              {{ Form::close() }}
          </div>
        </div>
        <?php $i++ ?>
    @empty
        @if (Auth::check())
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
        @else
            <div class="mdl-card no-height-card mdl-cell mdl-cell--12-col">
                <div class="mdl-card__supporting-text">
                    {!! trans('step.no_step_text_not_logged') !!}
                </div>
            </div>
        @endif
    @endforelse
</div>
@endsection
@section('footer')
     @include('layouts.delete_popup')
@endsection
