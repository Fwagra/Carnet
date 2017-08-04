var dialog = document.querySelector('dialog.delete-dialog');
var deleteBtn = jQuery('.delete-btn', dialog);
var confirmationInput = jQuery('.delete-input-wrapper', dialog);

if(dialog  != null){
    // Fallback for old browsers with polyfill
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }

    // Bind close button
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close();
    });
}

// Show the modal
jQuery('.delete_resource').on('click', function(event) {
    event.preventDefault();
    var id = jQuery(this).data('delete');
    var type = jQuery(this).data('type');
    var confirmation = (jQuery(this).data('confirmation') === undefined)? 1 : jQuery(this).data('confirmation');

    formDelete = jQuery('.form-delete-'+id);
    //Reset modal
    jQuery('.delete-input', dialog).val("");
    if (confirmation === 1){
      deleteBtn.attr('disabled', 'disabled');
      confirmationInput.show();
    } else{
      confirmationInput.hide();
      deleteBtn.removeAttr('disabled');
    }

    // Set the popup texts
    dialog.querySelector('.mdl-dialog__title').innerHTML = popup_texts[type].title;
    dialog.querySelector('.popup-message').innerHTML = popup_texts[type].msg;
    dialog.showModal();
});

// Submit  delete  form if the keyword is correct
deleteBtn.click(function(event) {
    event.preventDefault();
    if(jQuery(this).is(":not(:disabled)")){
        formDelete.submit();
    }
});

// Check the keyword on each keyup
jQuery(document).on('keyup', 'dialog .delete-input', function(event) {
    var keyword = jQuery(this).data('keyword');
    if(jQuery(this).val() == keyword ){
        deleteBtn.removeAttr('disabled');
    }else {
        deleteBtn.attr('disabled', 'disabled');
    }
});
