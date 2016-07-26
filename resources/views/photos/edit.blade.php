@extends('layouts.app')
@section('title', trans('photo.edit_photos_title'))
@section('content')
    <div class="mdl-grid content-grid create-photos">
        <div class="mdl-card centered  large-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">{!! trans('photo.edit_photos_title') !!}</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-grid">
                <img src="{{ url($photo->getLight()) }}" alt="" />
                @include('photos.edit-form')
            </div>
        </div>
    </div>
@endsection
