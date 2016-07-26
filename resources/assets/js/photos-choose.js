var dialogPhoto = document.querySelector('dialog.photo-choose-dialog');
if(dialogPhoto  != null){
    // Fallback for old browsers with polyfill
    if (! dialogPhoto.showModal) {
        dialogPolyfill.registerDialog(dialogPhoto);
    }

    // Bind close button
    dialogPhoto.querySelector('.close').addEventListener('click', function() {
        dialogPhoto.close();
    });
}

jQuery(document).on('click', '.add-photos-btn', function(event) {
    event.preventDefault();
    dialogPhoto.showModal();
});
