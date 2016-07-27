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

    // Display the popup
    jQuery(document).on('click', '.add-photos-btn', function(event) {
        event.preventDefault();
        loadPhotos();
        dialogPhoto.showModal();
    });

    // Handle the switch beetween selection and creation of photos
    jQuery(document).on('click', '.trigger-add-photos', function(event) {
        event.preventDefault();
        content.html(loader);
        if (jQuery(this).hasClass('active')) {
            loadPhotos();
            jQuery(this).removeClass('active');
            jQuery(this).html(popupConfig.btn.addphoto);
        }else{
            loadAddForm();
            jQuery(this).addClass('active');
            jQuery(this).html(popupConfig.btn.backtophotos);
        }
    });

    // Ajax page changing
    jQuery(document).on('click', '.photo-choose-dialog .pager a', function(event) {
        event.preventDefault();
        content.html(loader);
        loadPhotos(jQuery(this).attr('href'));
    });

    /**
     * Load the photos
     */
    function loadPhotos(url = popupConfig.url){
        content.load(url, function(){
            selectPhotos();
        });
    }

    /**
     * Load the add form
     */
    function loadAddForm() {
        content.load(popupConfig.addurl, function(){
            Dropzone.autodiscover = false;
            Dropzone.options.mydropzone = {
                dictDefaultMessage: popupConfig.msg.dropzone
            };
            Dropzone.discover();
        });
    }

    /**
     * Add the border around the selected images
     */
    function selectPhotos(images = selectedImages) {
        jQuery('.photo-element', content).each(function(index, el) {
            var photoId = jQuery(el).data('id');
            if(images.indexOf(photoId) != -1){
                jQuery(el).addClass('selected');
            }
        });
    }
}
