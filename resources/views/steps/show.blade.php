@extends('layouts.app')
@section('title', trans('step.step_title', ['name' => $step->name] ))
@section('content')
    <div class="mdl-grid content-grid show-step">
        {{-- Resume of the step block --}}
        <div class="mdl-card mdl-cell mdl-cell--8-col mdl-shadow--2dp resume-block">
            <?php
                $bg = ($featured)? 'style="background-image:url('.url($featured->getLight()).');"' : '';
            ?>
          <div class="mdl-card__title mdl-card__media" {!! $bg !!}>
            <h2 class="mdl-card__title-text">{{ $step->name }}</h2>
          </div>
          <div class="mdl-card__supporting-text">
             <div class="mdl-grid">
                  <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                     <i class="material-icons icon-align">date_range</i><span class="date icon-align">{{ $step->date->format('d-m-Y') }}</span>
                 </div>
                 <div class="mdl-cell mdl-cell--12-col mdl-cell--3-col-desktop">
                     <i class="material-icons icon-align">flag</i><span class="flag icon-align">{{ $step->km }} {!! trans('step.km_traveled') !!}</span>
                 </div>
                 <div class="section-spacer"></div>
                 <a href="#photos" class="mdl-button mdl-js-button  mdl-button--accent ">{!! trans('step.goto_photos') !!}</a>
             </div>
          </div>
          @if (Auth::check())
              <div class="mdl-card__menu">
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect goto">
                  <i class="material-icons md-light">edit_mode</i>
                  <a class="goto-link" href="{{ route('trip.step.edit', [$trip->slug, $step->id])}}"></a>
                </button>
              </div>
          @endif
        </div>
        {{-- Points of interest block --}}
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col pois-block">
          <div class="mdl-card__title  mdl-card--expand">
              <h4><i class="material-icons icon-align">place</i> {!! trans('step.pois_block_title') !!}</h4>
          </div>
          <div class="mdl-card__supporting-text">
              <ul class="mdl-list">
                  @if (!empty($step->pois[0]))
                      @foreach ($step->pois as $key => $poi)
                          <li class="mdl-list__item">
                            <span class="mdl-list__item-primary-content">
                                <i class="material-icons mdl-list__item-icon">{{$step->pois_icon[$key]}}</i>
                               {{ $poi }}
                            </span>
                          </li>
                      @endforeach
                  @else
                     {!! trans('step.no_pois') !!}
                  @endif
              </ul>
          </div>
        </div>

        {{-- Description block --}}
        <div class="mdl-card mdl-cell mdl-cell--12-col mdl-shadow--2dp desc-block">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text"></h2>
          </div>
          <div class="mdl-card__supporting-text">
              <div class="content-text">
                  {!! $step->html_value !!}
              </div>
          </div>
          <div id="photos" class="mdl-card__supporting-text img-block mdl-card--border mdl-grid">
            @forelse ($step->photos as $photo)
                <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-phone">
                    <a class="fluidbox-img" href="{{ url($photo->getFull()) }}">
                        <img src="{{ url($photo->getThumb())}}" alt="" />
                    </a>
                </div>
            @empty

            @endforelse
          </div>
          <div class="mdl-card__menu">
            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
              <i class="material-icons">mode_comment</i>
            </button>
          </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.step_images_popup')
    @include('layouts.pois_icons_popup')
@endsection
