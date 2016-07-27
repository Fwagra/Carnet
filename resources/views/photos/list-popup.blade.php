<div class="mdl-card__supporting-text mdl-grid img-gallery">
    @forelse ($photos as $photo)
        <div class="mdl-cell mdl-cell--3-col mdl-cell--2-col-phone mdl-cell--2-col-tablet photo-element" data-id="{{ $photo->id }}">
                <img src="{{ url($photo->getThumb())}}" alt="" />
        </div>
    @empty
        {!! trans('photo.no_photo_list_msg') !!}
    @endforelse
</div>
{!! $photos->render() !!}
