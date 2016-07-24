var dialogIcon = document.querySelector('dialog.icon-choose-dialog');
var deleteBtnIcon = jQuery('.delete-btn', dialogIcon);
var parentIcon = '';
if(dialogIcon  != null){
    // Fallback for old browsers with polyfill
    if (! dialogIcon.showModal) {
        dialogPolyfill.registerDialog(dialogIcon);
    }

    // Bind close button
    dialogIcon.querySelector('.close').addEventListener('click', function() {
        dialogIcon.close();
    });
}


// Show the modal
jQuery(document).on('click','.select-icons .choose-icon-btn', function(event) {
    event.preventDefault();
    parentIcon = jQuery(this).parent('.select-icons');
    jQuery('.icon-list li', dialogIcon).removeClass('selected-icon');
    var current_value = jQuery('button i', jQuery(this)).html();
    jQuery("li[data-icon=" + current_value).addClass('selected-icon');
    dialogIcon.showModal();
});

// Select the icon
jQuery(document).on('click', '.icon-choose-dialog .icon-list li', function(event) {
    event.preventDefault();
    jQuery(this).siblings('li').removeClass('selected-icon');
    jQuery(this).addClass('selected-icon');
});

// Confirm the choice
jQuery('.confirm-btn', dialogIcon).on('click', function(event) {
    event.preventDefault();
    var selected = jQuery('.selected-icon').data('icon');
    jQuery('.hidden-input', parentIcon).val(selected);
    jQuery('.choose-icon-btn button i', parentIcon).html(selected);
    dialogIcon.close();
});
