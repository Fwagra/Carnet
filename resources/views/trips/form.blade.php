  <div class="mdl-textfield mdl-js-textfield">
    {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
    {!! Form::label('name', trans('trip.name_form'), ['class' => "mdl-textfield__label"])!!}
  </div>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
    {!! Form::textarea('description',null, ['class' => 'mdl-textfield__input']) !!}
    {!! Form::label('description', trans('trip.description_form'), ['class' => "mdl-textfield__label"])!!}
  </div>
  {!! Form::submit(trans('trip.submit_btn'), ['class' => "mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
