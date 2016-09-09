
jQuery("document").ready(function($){

    /*-- Override js fixed nav  --*/
    var screen_width = $( window ).width();
    var nav = $('#main-menu');
    var top_header = $('.top-header').height();
    var main_header = $('.main-header').height();
    var sum = top_header + main_header;
    if(screen_width <= 767){
        $(window).scroll(function () {
            if ($(this).scrollTop() > sum) {
                nav.addClass("fixed-nav");
            } else {
                nav.removeClass("fixed-nav");
            }
        });
    }

});