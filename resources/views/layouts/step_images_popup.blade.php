<dialog class="mdl-dialog photo-choose-dialog">
  <div class="mdl-dialog__title">
      <h4>{!! trans('photo.title_popup') !!}</h4>
      <div class="section-spacer"></div>
      <button class="mdl-button mdl-js-button  mdl-button--accent">
          {!! trans('photo.add_photo_btn') !!}
      </button>
  </div>
  <div class="mdl-dialog__content">
      <p class="popup-message">
          {!! trans('photo.message_popup') !!}
      </p>
      <div class="ajax-content">
          <div class="mdl-spinner mdl-js-spinner is-active"></div>
      </div>
  </div>
  <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
    <button type="button" class="mdl-button close">{!! trans('photo.close_popup') !!}</button>
  </div>
</dialog>
<script type="text/javascript">
    var popupConfig = {
        url: "{{ route('photo.listing') }}"
    }
</script>
