<dialog class="mdl-dialog delete-dialog">
  <h4 class="mdl-dialog__title"></h4>
  <div class="mdl-dialog__content">
      <p class="popup-message">

      </p>
      <div class="mdl-textfield mdl-js-textfield">
          {!! Form::text('delete_input',null, ['class' => 'mdl-textfield__input delete-input', 'data-keyword' => trans('trip.keyword_delete')]) !!}
          {!! Form::label('delete_input', trans('trip.delete_label_form'), ['class' => "mdl-textfield__label"])!!}
      </div>
  </div>
  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
    <button type="button" disabled class="mdl-button delete-btn">{!! trans('trip.delete_btn') !!}</button>
    <button type="button" class="mdl-button close">{!! trans('trip.cancel_btn') !!}</button>
  </div>
</dialog>
<script type="text/javascript">
    popup_texts = {
        trip:{
            title:"{!! trans('trip.deletion_confirmation') !!}",
            msg:"{!! trans('trip.delete_msg') !!}"
        },
        step:{
            title:"{!! trans('step.deletion_confirmation') !!}",
            msg:"{!! trans('step.delete_msg') !!}"
        }
    };
</script>
