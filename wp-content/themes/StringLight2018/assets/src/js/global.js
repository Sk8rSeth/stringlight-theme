$( document ).ready(function() {

    // initialize foundation JS scripts
    $( document ).foundation();

    $('button.hamburger').on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('is-active');
        $('body').toggleClass('menu-active');
        $('#overlay').toggleClass('is-active');
    });

});
