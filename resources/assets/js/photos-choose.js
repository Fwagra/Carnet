var dialogPhoto = document.querySelector('dialog.photo-choose-dialog');
if(dialogPhoto  != null){
    var loader = dialogPhoto.querySelector('.mdl-spinner');
    var content = jQuery('.ajax-content', dialogPhoto);
    // Fallback for old browsers with polyfill
    if (! dialogPhoto.showModal) {
        dialogPolyfill.registerDialog(dialogPhoto);
    }

    // Bind close button
    dialogPhoto.querySelector('.close').addEventListener('click', function() {
        dialogPhoto.close();
    });

    jQuery(document).on('click', '.add-photos-btn', function(event) {
        event.preventDefault();
        content.load(popupConfig.url);
        dialogPhoto.showModal();
    });

    jQuery(document).on('click', '.trigger-add-photos', function(event) {
        event.preventDefault();
        content.html(loader);
        if (jQuery(this).hasClass('active')) {
            content.load(popupConfig.url);
            jQuery(this).removeClass('active');
            jQuery(this).html(popupConfig.btn.addphoto);
        }else{
            content.load(popupConfig.addurl);
            jQuery(this).addClass('active');
            jQuery(this).html(popupConfig.btn.backtophotos);
            Dropzone.discover();
        }
    });
}
