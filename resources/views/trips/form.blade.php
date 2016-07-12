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
