<div class="mdl-card__supporting-text">
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
        {!! Form::date('date',null , ['class' => 'mdl-textfield__input']) !!}
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
              <input type="radio"  id="type-{{$key}}" name="type" class="mdl-icon-toggle__input" value="{{ $key }}">
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
</div>
<div class="mdl-card__actions mdl-card--border">
    <div class="section-spacer"></div>
    {!! Form::submit(trans('step.submit_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
</div>
