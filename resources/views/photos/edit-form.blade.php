{{ Form::model($photo, ['url' => route('photo.update', $photo->id),'class' => 'edit-photo','id' => 'edit-photo',  'method' => 'PUT']) }}
      <div class="mdl-textfield mdl-js-textfield {{ $errors->has('name') ? ' is-invalid' : '' }}">
          {!! Form::text('name',null, ['class' => 'mdl-textfield__input']) !!}
          {!! Form::label('name', trans('photo.name_form'), ['class' => "mdl-textfield__label"])!!}
          @if ($errors->has('name'))
              <span class="mdl-textfield__error">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
      <div class="mdl-textfield mdl-js-textfield {{ $errors->has('description') ? ' is-invalid' : '' }}">
          {!! Form::textarea('description',null, ['class' => 'mdl-textfield__input']) !!}
          {!! Form::label('description', trans('photo.description_form'), ['class' => "mdl-textfield__label"])!!}
          @if ($errors->has('description'))
              <span class="mdl-textfield__error">
                  <strong>{{ $errors->first('description') }}</strong>
              </span>
          @endif
      </div>
      <div class="mdl-card__actions mdl-card--border">
          <div class="section-spacer"></div>
          {!! Form::submit(trans('photo.submit_edit_btn'), ['class' => "mdl-button mdl-button--raised mdl-button--accent mdl-js-button mdl-js-ripple-effect mdl-button--primary"]) !!}
      </div>
{{ Form::close() }}
