
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

    /*--  --*/

    function get_max_value($element) {
        var max = undefined;
        $($element).each(function () {
            var height = $(this).height();
            height = parseInt(height, 10);
            if( max === undefined || max < height){
                max = height;
            }
        });
        return max;
    }

    align_middle('.latest-deals-product .product-list li .left-block', '.latest-deals-product .product-list li .left-block a');
    function align_middle($element_parent, $element_child) {
        var child_h = get_max_value($element_child);

        $($element_parent).height(child_h);

        $($element_parent).css('display','table');
        $($element_child).css({'display':'table-cell', 'vertical-align':'middle'});
    }


    /**--  --**/
    $('.product-detail').imagesLoaded( function() {
        $('.product-detail').centeralElement();
    });
    /**-- --**/

});