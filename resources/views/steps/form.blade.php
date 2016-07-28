<div class="mdl-card__supporting-text">
    {{ Form::hidden('photos', $fieldPhotos, ['class' => 'hidden-photos']) }}
    {{ Form::hidden('image_id',null, ['class' => 'image-id']) }}
    <?php $featured_btn = (isset($step) && $step->image_id > 0)? trans('photo.change_featured_photo') : trans('photo.add_featured_photo'); ?>
    <div class="mdl-card__actions">
        <div class="section-spacer"></div>
        <button type=button class="btn featured-img-btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored ripple-effet">
            <i class="material-icons">image</i><span>
                {{ $featured_btn }}
            </span>
        </button>
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('name') ? ' is-invalid' : '' }}">
        {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('name', trans('step.name_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('name'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('km') ? ' is-invalid' : '' }}">
        {!! Form::text('km',null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('km', trans('step.km_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('km'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('km') }}</strong>
            </span>
        @endif
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('date') ? ' is-invalid' : '' }}">
        <?php $date = (isset($step))? $step->date : \Carbon\Carbon::now()->toDateString(); ?>
        {!! Form::date('date',$date , ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('date', trans('step.date_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('date'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>

    <?php $types = [
            'directions_bike' => trans('step.bike_option'),
            'directions_walk' => trans('step.walk_option'),
            'directions_car' => trans('step.hitchhike_option'),
            'place' => trans('step.other_option'),
    ]; ?>

    <div class="mdl-textfield mdl-js-textfield {{ $errors->has('type') ? ' is-invalid' : '' }}">
        <div class="fake-label">{!! trans('step.type_form') !!}</div>
        @foreach ($types as $key => $type)
            <label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect" id="icon-{{$key}}" for="type-{{$key}}">
              <input type="radio"  id="type-{{$key}}" name="type"
              @if (isset($step) && $step->type == $key)
                  checked
              @endif
               class="mdl-icon-toggle__input" value="{{ $key }}">
              <i class="mdl-icon-toggle__label material-icons" >{{ $key }}</i>
            </label>
            <div class="mdl-tooltip" for="icon-{{$key}}">
                 {{ $type }}
            </div>
        @endforeach
        @if ($errors->has('type'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label {{ $errors->has('md_value') ? ' is-invalid' : '' }}">
        {!! Form::textarea('md_value',null, ['class' => 'mdl-textfield__input']) !!}
        {!! Form::label('md_value', trans('step.md_value_form'), ['class' => "mdl-textfield__label"])!!}
        @if ($errors->has('md_value'))
            <span class="mdl-textfield__error">
                <strong>{{ $errors->first('md_value') }}</strong>
            </span>
        @endif
    </div>
    <div class="pois-block multi-elements">
        @if (isset($pois) && is_array($pois))
            @foreach ($pois as $key => $poi)
                @include('steps.pois')
            @endforeach
        @else
            <?php  $key = 0; ?>
            @include('steps.pois')
        @endif
        <div class="mdl-card__actions">
            <div class="section-spacer"></div>
            <button type="button" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab add-new-element">
              <i class="material-icons">add</i>
            </button>
        </div>
    </div>

    <label for="activate" class="mdl-switch mdl-js-switch">
        <input type="checkbox" id="activate" name="active" value="1" @if (!isset($step) || $step->active == 1)
            checked
        @endif class="mdl-switch__input">
        <span class="mdl-switch__label">{!! trans('step.active_form') !!}</span>
    </label>

    <label for="final_step" class="mdl-switch mdl-js-switch">
        <input type="checkbox" id="final_step" name="final_step" value="1" @if (isset($step) && $step->final_step == 1)
            checked
        @endif class="mdl-switch__input">
        <span class="mdl-switch__label">{!! trans('step.final_step_form') !!}</span>
    </label>

</div>
<div class="mdl-card__actions mdl-card--border multi-btns">
    <div class="section-spacer"></div>

        <div class="images-add-block">
            <button type=button class="btn add-photos-btn mdl-button mdl-js-button mdl-button--raised mdl-button--colored ripple-effet mdl-badge mdl-badge--overlap" data-badge="{{ $count}}">
                <i class="material-icons">image</i>{!! trans('step.add_img_btn') !!}
            </button>
        </div>
    {!! Form::submit(trans('step.submit_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
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
    @if(isset($photosJSON))
        var selectedImages = {{ $photosJSON }}
    @else
        var selectedImages = [];
    @endif
    var featuredField = document.querySelector('.image-id');
    var featured = featuredField.value;
</script>
