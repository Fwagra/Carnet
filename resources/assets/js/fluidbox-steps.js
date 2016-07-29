jQuery(document).ready(function($) {
    $('.fluidbox-img').fluidbox()
    .on('openend.fluidbox', function() {
        var $img = $(this).find('img');
        if($img.attr('title') != ''){
            $('#photo-caption')
            .addClass('visible')
            .find('.title')
            .text($img.attr('title'))
            .next('.caption')
            .text($img.attr('alt'));
        }
    })
    .on('closestart.fluidbox', function() {
        $('#photo-caption').removeClass('visible');
    });
});
