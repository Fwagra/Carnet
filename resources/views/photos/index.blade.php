@extends('layouts.app')
@section('title', trans('photo.management_title'))
@section('content')
    <div class="mdl-grid content-grid index-photos">
        <div class="mdl-card centered large-card mdl-shadow--2dp">
          <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">{!! trans('photo.management_title') !!}</h2>
          </div>
             @include('photos.add-form')
        </div>
    </div>
@endsection
