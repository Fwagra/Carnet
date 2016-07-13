jQuery('.delete_resource').on('click', function(event) {
    event.preventDefault();
    var id = jQuery(this).data('delete');
    jQuery('.form-delete-'+id).submit();
});
