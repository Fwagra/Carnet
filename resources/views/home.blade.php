@extends('layouts.app')
@section('title', trans('trip.home_title'))
@section('meta-desc', env("HOME_DESC"))
@section('content')
<div class="content-grid mdl-grid trip-list">
    <?php $i = 1; ?>
    @forelse ($trips as $trip)
        <div class="mdl-card mdl-cell mdl-cell--12-col">
        <?php
            $bg = '';
            if($trip->image_id > 0){
                $img = App\Photo::find($trip->image_id)->getLight();
                $bg = 'style="background-image:url('.url($img).');"';
            }?>
          <div class="mdl-card__media mdl-color-text--grey-50" {!! $bg !!}>
              <a class="absolute-link" href="{{ action('TripController@destroy', $trip->slug)}}"></a>
              <h2 class="mdl-card__title-text"><a href="{{ route('trip.show', $trip->slug) }}">
                @if ($trip->finished)
                    {!! trans('trip.finished_msg') !!}
                @endif
                {{ $trip->name }}
            </a></h2>
            @if (Auth::check())
                <div class="mdl-card__menu">
                    <button id="menu-{{$i}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
                      <i class="material-icons">more_vert</i>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-{{$i}}">
                      <li class="mdl-menu__item goto">
                          <a class="goto-link" href="{{ action('TripController@edit', $trip->slug) }}">{!! trans('trip.edit_btn') !!}</a>
                      </li>
                      <li class="mdl-menu__item delete_resource" data-type="trip" data-delete="{{$i}}">
                          <a href="{{ action('TripController@destroy', $trip->slug)}}">
                              {!! trans('trip.destroy_btn') !!}
                          </a>
                      </li>
                    </ul>
                </div>
            @endif
          </div>
          <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              {{ $trip->description }}
          </div>
          @if (Auth::check())
              {{ Form::open(['url' => action('TripController@destroy', $trip->slug), 'method' => 'DELETE', 'class' => "delete-validation form-delete-".$i]) }}
              {{ Form::close() }}
          @endif
        </div>
        <?php $i++; ?>
    @empty
        <div class="mdl-card mdl-cell mdl-cell--12-col">
          <div class="mdl-card__title mdl-card--expand">
              <h3>{!! trans('trip.bvn_text_title') !!}</h3>
          </div>
          <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              {!! nl2br(trans('trip.bvn_text')) !!}
          </div>
          <div class="mdl-card__actions mdl-card--border">
              <div class="section-spacer"></div>
            <a href="{{ action('TripController@create')}}" class="mdl-button mdl-button--colored mdl-button--accent mdl-button--raised mdl-js-button mdl-js-ripple-effect">
                {!! trans('trip.add_new_trip_btn') !!}
            </a>
          </div>
        </div>
    @endforelse
</div>
@endsection
@section('footer')
     @include('layouts.delete_popup')
@endsection
