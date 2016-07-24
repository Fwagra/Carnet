jQuery(document).ready(function($) {
    checkMultiElementsNumber();


    $('.multi-elements .add-new-element').on('click', function(event) {
        event.preventDefault();
        var multi_elements = $(this).parents('.multi-elements');
        var last_element = $('.multi-element:last', multi_elements);
        var new_element = last_element.clone();
        $('input, textarea', new_element).val("");
        new_element.insertAfter(last_element);
        checkMultiElementsNumber();

    });

    $(document).on('click', '.multi-elements .remove-element',  function(event) {
        event.preventDefault();
        $(this).parents('.multi-element').remove();
        checkMultiElementsNumber();
    });


});

function checkMultiElementsNumber() {
    jQuery('.multi-elements').each(function(index, el) {
        if (jQuery('.multi-element', el).length <= 1) {
            jQuery('.remove-element', el).hide();
        }else{
            jQuery('.remove-element', el).show();
        }
    });
}
