@extends('layouts.app')
@section('title', trans('photo.management_title'))
@section('content')
    <div class="mdl-grid content-grid index-photos">
        <div class="mdl-card centered  mdl-cell mdl-cell--12-col mdl-shadow--2dp">
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored add-photo goto">
                <a class="goto-link" href="{{route('photo.create')}}"></a>
                <i class="material-icons">add</i>
            </button>
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">{!! trans('photo.management_title') !!}</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-grid img-gallery">
                @forelse ($photos as $photo)
                    <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-phone mdl-cell--2-col-tablet">
                        <a href="{{ route('photo.edit', [$photo->id])}}">
                            <img src="{{ url('uploads/photos/thumb/'.$photo->filename)}}" alt="" />
                        </a>
                    </div>
                @empty
                    {!! trans('photo.no_photo_list_msg') !!}
                @endforelse
                {!! $photos->render() !!}
            </div>
        </div>
    </div>
@endsection
