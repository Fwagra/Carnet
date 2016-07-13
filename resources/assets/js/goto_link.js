jQuery('.goto').on('click', function(event) {
    event.preventDefault();
    window.location.href = jQuery('.goto-link', jQuery(this)).attr('href');
});
