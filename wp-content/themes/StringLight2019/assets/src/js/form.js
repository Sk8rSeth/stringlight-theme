$( document ).ready(function() {

    checkInputs();

    $('.ginput_container input, .ginput_container textarea').on('focusin', function(){
        console.log('focussss');
        var thisthis = $(this);
        thisthis.parents('.gfield').find('label').addClass('active');
    }).on('focusout', function(){
        var thisthis = $(this);
        if (!thisthis.val()) {
            thisthis.parents('.gfield').find('label').removeClass('active');
        }

    })

});

function checkInputs() {
    $.each($('.ginput_container input, .ginput_container textarea'), function(i,val){
        // if (val.val()) {
        //     $(this).parents('.gfield').find('label').addClass('active');
        // }

    });
}
