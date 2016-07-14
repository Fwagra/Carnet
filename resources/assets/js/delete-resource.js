var dialog = document.querySelector('dialog.delete-dialog');
var deleteBtn = jQuery('.delete-btn', dialog);

// Fallback for old browsers with polyfill
if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}

// Bind close button
dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
});

// Show the modal
jQuery('.delete_resource').on('click', function(event) {
    event.preventDefault();
    var id = jQuery(this).data('delete');
    formDelete = jQuery('.form-delete-'+id);
    //Reset modal
    jQuery('.delete-input', dialog).val("");
    deleteBtn.attr('disabled', 'disabled');

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
jQuery('.delete-input', dialog).keyup(function(event) {
    var keyword = jQuery(this).data('keyword');
    if(jQuery(this).val() == keyword ){
        deleteBtn.removeAttr('disabled');
    }else {
        deleteBtn.attr('disabled', 'disabled');
    }
});
