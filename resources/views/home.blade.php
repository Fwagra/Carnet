@extends('layouts.app')
@section('title', trans('trip.home_title'))
@section('content')
<div class="content-grid mdl-grid trip-list">
    <?php $i = 1; ?>
    @forelse ($trips as $trip)
        <div class="mdl-card mdl-cell mdl-cell--12-col">
          <div class="mdl-card__media mdl-color-text--grey-50">
              @if ($trip->finished)
                  {!! trans('trip.finished_msg') !!}
              @endif
            <h2 class="mdl-card__title-text"><a href="{{ route('trip.show', $trip->slug) }}">{{ $trip->name }}</a></h2>
            @if (Auth::check())
                <button id="menu-{{$i}}" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon menu-top-right">
                  <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="menu-{{$i}}">
                  <li class="mdl-menu__item goto">
                      <a class="goto-link" href="{{ action('TripController@edit', $trip->slug) }}">{!! trans('trip.edit_btn') !!}</a>
                  </li>
                  <li class="mdl-menu__item delete_resource" data-delete="{{$i}}">
                      <a href="{{ action('TripController@destroy', $trip->slug)}}">
                          {!! trans('trip.destroy_btn') !!}
                      </a>
                  </li>
                </ul>
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
    <dialog class="mdl-dialog delete-dialog">
      <h4 class="mdl-dialog__title">{!! trans('trip.deletion_confirmation') !!}</h4>
      <div class="mdl-dialog__content">
          <p>
              {!! trans('trip.delete_msg') !!}
          </p>
          <div class="mdl-textfield mdl-js-textfield">
              {!! Form::text('delete_input',null, ['class' => 'mdl-textfield__input delete-input', 'data-keyword' => trans('trip.keyword_delete')]) !!}
              {!! Form::label('delete_input', trans('trip.delete_label_form'), ['class' => "mdl-textfield__label"])!!}
          </div>
      </div>
      <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" disabled class="mdl-button delete-btn">{!! trans('trip.delete_btn') !!}</button>
        <button type="button" class="mdl-button close">{!! trans('trip.cancel_btn') !!}</button>
      </div>
    </dialog>
@endsection
