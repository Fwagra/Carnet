<div class="mdl-textfield mdl-js-textfield pois-multi multi-element mdl-textfield--floating-label {{ $errors->has('md_value') ? ' is-invalid' : '' }}">
    <input type="text" name="pois[]" class="mdl-textfield__input" @if(isset($pois)) value="{{ $poi}}" @endif>
    {!! Form::label('pois', trans('step.pois_form'), ['class' => "mdl-textfield__label"])!!}
    @if ($errors->has('pois'))
        <span class="mdl-textfield__error">
            <strong>{{ $errors->first('pois') }}</strong>
        </span>
    @endif
    <button class="mdl-button mdl-js-button mdl-button--icon remove-element" type="button">
      <i class="material-icons">remove_circle</i>
    </button>
</div>
