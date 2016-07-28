<dialog class="mdl-dialog photo-choose-dialog">
  <div class="mdl-dialog__title">
      <h4>{!! trans('photo.title_popup') !!}
          <button class="mdl-button mdl-js-button  mdl-button--accent trigger-add-photos">
              {!! trans('photo.add_photo_btn') !!}
          </button>
      </h4>

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
        url: "{{ route('photo.listing') }}",
        addurl: "{{ route('photo.addform') }}",
        btn:{
            addphoto:"{!! trans('photo.add_photo_btn') !!}",
            backtophotos:"{!! trans('photo.backto_photo_btn') !!}"
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
</script>
