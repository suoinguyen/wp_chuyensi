
jQuery("document").ready(function($){

    /**
     * Detect element appear
     * @param elm
     * @param eval
     * @returns {boolean}
     */
    function checkVisible( elm, eval ) {
        eval = eval || "visible";
        var vpH = $(window).height(),
            st = $(window).scrollTop(),
            y = $(elm).offset().top,
            elementHeight = $(elm).height();

        if (eval == "visible") return ((y < (vpH + st)) && (y > (st - elementHeight)));
        if (eval == "above") return ((y < (vpH + st)));
    }

    $('.product-border').each(function () {
        if (checkVisible($(this))) {
            $(this).find(".ele-child-effect").each(function (i) {
                $(this).attr("style", "-webkit-animation-delay:" + i * 300 + "ms;"
                    + "-moz-animation-delay:" + i * 300 + "ms;"
                    + "-o-animation-delay:" + i * 300 + "ms;"
                    + "animation-delay:" + i * 300 + "ms;");
                if (i == $(this).size() -1) {
                    $(this).parents(".product-border").addClass("play")
                }
            });
        }
    });
    $(window).scroll(function() {
        $('.product-border').each(function () {
            if (checkVisible($(this))) {
                $(this).find(".ele-child-effect").each(function (i) {
                    $(this).attr("style", "-webkit-animation-delay:" + i * 300 + "ms;"
                        + "-moz-animation-delay:" + i * 300 + "ms;"
                        + "-o-animation-delay:" + i * 300 + "ms;"
                        + "animation-delay:" + i * 300 + "ms;");
                    if (i == $(this).size() -1) {
                        $(this).parents(".product-border").addClass("play")
                    }
                });
            }
        });
    });

    /**
     * Override js fixed nav
     * @type {*|jQuery}
     */
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


    /**
     * Get max value list element
     * @param $element
     * @returns {undefined}
     */
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

    /**
     * Align middle for element
     */
    // align_middle('.latest-deals-product .product-list li .left-block', '.latest-deals-product .product-list li .left-block a');
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