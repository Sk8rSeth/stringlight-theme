$( document ).ready(function() {

    // initialize foundation JS scripts
    $( document ).foundation();

    $('button.hamburger').on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('is-active');
        $('body').toggleClass('menu-active');
        $('#overlay').toggleClass('is-active');
    });

    if (Foundation.MediaQuery.is('medium up')) {
        $('.full-width-slider .slider-container').slick({
            arrows: false,
            autoplay: true,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
        });
    }
    if (Foundation.MediaQuery.is('small only')) {
        $('.full-width-slider .slider-container').slick({
            arrows: false,
            autoplay: true,
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
        });
    }

});
