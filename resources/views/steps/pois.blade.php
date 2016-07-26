<div class="multi-element mdl-grid">
    <div class="mdl-cell mdl-cell--2-col mdl-cell--1-col-phone mdl-cell--1-col-tablet">
        <div  class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label select-icons">
            <input class="mdl-textfield__input hidden-input" type="hidden"  name="pois_icon[]" value="@if (isset($pois_icons) && !empty($pois_icons[$key]))
                {{$pois_icons[$key]}}
            @endif" readonly >
            <span class="choose-icon-btn">
                <button class="mdl-button mdl-js-button mdl-button--icon choose-icon-btn" type="button">
                  <i class="material-icons">@if (isset($pois_icons) && !empty($pois_icons[$key]))
                      {{ $pois_icons[$key] }}
                      @else
                          place
                  @endif</i>
                </button>
                <label>
                    <i class="mdl-icon-toggle__label material-icons arrow-icon">keyboard_arrow_down</i>
                </label>
            </span>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--10-col mdl-cell--3-col-phone mdl-cell--7-col-tablet">
        <div class="mdl-textfield mdl-js-textfield pois-multi mdl-textfield--floating-label {{ $errors->has('md_value') ? ' is-invalid' : '' }}">
            <input type="text" name="pois[]" class="mdl-textfield__input" @if(isset($poi)) value="{{ $poi}}" @endif>
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
    </div>
</div>
