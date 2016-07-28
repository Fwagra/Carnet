var dialogPhoto = document.querySelector('dialog.photo-choose-dialog');
if(dialogPhoto  != null){
    var loader = dialogPhoto.querySelector('.mdl-spinner');
    var content = jQuery('.ajax-content', dialogPhoto);
    // Fallback for old browsers with polyfill
    if (! dialogPhoto.showModal) {
        dialogPolyfill.registerDialog(dialogPhoto);
    }

    updateHiddenField(jQuery('.hidden-photos'), selectedImages);
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

    // Update the var containing the selected photos on click
    jQuery(document).on('click', '.photo-choose-dialog .photo-element', function(event) {
        event.preventDefault();
        var photoId = jQuery(this).data('id');
        var index = selectedImages.indexOf(photoId);
        if(index > -1){
            selectedImages.splice(index, 1);
        }else{
            selectedImages.push(photoId);
        }
        selectPhotos();
        updateHiddenField(jQuery('.hidden-photos'), selectedImages);
        updateBadgeCount();
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
            }else{
                jQuery(el).removeClass('selected');
            }
        });
    }

    /**
     * Update the hidden field containing the values of the soon te be synced photos
     */
    function updateHiddenField(field, val) {
        val = JSON.stringify(val);
        val = JSON.parse(val);
        field.val(val);
    }

    function updateBadgeCount(badge = jQuery('.add-photos-btn')) {
        var counter = selectedImages.length;
        badge.attr('data-badge', counter);
    }

}
