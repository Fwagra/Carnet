{{ Form::hidden('image_id',null, ['class' => 'image-id']) }}
<?php $featured_btn = (isset($trip) && $trip->image_id > 0)? trans('photo.change_featured_photo') : trans('photo.add_featured_photo'); ?>
<div class="mdl-card__actions">
    <div class="section-spacer"></div>
    <button type=button class="btn featured-img-btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored ripple-effet">
        <i class="material-icons">image</i><span>
            {{ $featured_btn }}
        </span>
    </button>
</div>
<div class="mdl-card__supporting-text">
    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('name') ? ' is-invalid' : '' }}">
        {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('name', trans('trip.name_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('name'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('description') ? ' is-invalid' : '' }} mdl-textfield--expandable">
        {!! Form::textarea('description',null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('description', trans('trip.description_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('description'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

</div>
<div class="mdl-card__actions mdl-card--border">
    <div class="section-spacer"></div>
    {!! Form::submit(trans('trip.submit_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
</div>

<script type="text/javascript">
    var popupConfig = {
        url: "{{ route('photo.listing') }}",
        addurl: "{{ route('photo.addform') }}",
        btn:{
            addphoto:"{!! trans('photo.add_photo_btn') !!}",
            backtophotos:"{!! trans('photo.backto_photo_btn') !!}",
            addfeatured: "{!! trans('photo.add_featured_photo')  !!}",
            changefeatured: "{!! trans('photo.change_featured_photo')  !!}"
        },
        msg:{
            dropzone:"{!! trans('photo.dropzone_message') !!}"
        }
    };
    var selectedImages = [];
    var featuredField = document.querySelector('.image-id');
    var featured = featuredField.value;
</script>
