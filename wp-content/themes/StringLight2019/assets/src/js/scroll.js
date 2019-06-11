$( document ).ready(function() {

    $('.navbar a').click(function(e) {
         e.preventDefault();
         var dest = $(this).attr('href');
         if (dest.length) {
             $('html,body').animate({
                 scrollTop: $(dest).offset().top -50
             }, 'slow');
         }
     });
     $('button.hamburger').on('click', function(e){
         e.preventDefault();
         if($('body').hasClass('menu-active')){
             $(window).trigger('stop-scroll');
         }else{
             $(window).trigger('resume-scroll');
         }
     });
     $('.navbar').on('open-menu',function(){
         $('button.hamburger').addClass('is-active');
         $('body').addClass('menu-active');
         $(this).addClass('is-active');
         $(this).find('#overlay').addClass('is-active');
     });

     $('.navbar').on('close-menu',function(){
         $('button.hamburger').removeClass('is-active');
         $('body').removeClass('menu-active');
         $(this).removeClass('is-active');
         $(this).find('#overlay').removeClass('is-active');
     });

     $('.navbar .menu a').on('click', function(e){
         if ($('.navbar .overlay').hasClass('is-active')) {
             $('.navbar').trigger('close-menu');
             $(window).trigger('resume-scroll');
         }
     });

     // stop scroll functionality
     $(window).on('stop-scroll',function(){
        var scrollbarWidth = window.outerWidth - $('html').width();
        // do other stuff on menu open/close here
    }).on('resume-scroll',function(){
        $('body').removeClass('stop-scroll');
        // do other stuff on menu open/close here
    });

    $(window).on('resize', function(){
        var win = $(this); //this = window
        if (win.width() >= 770) {
            $(window).trigger('resume-scroll');
        }
    });

});
