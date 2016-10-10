(function($){
    "use strict"; // Start of use strict
    var w_W = $(window).width();
    $(document).ready(function() {

        /** OWL CAROUSEL**/
        $(".owl-carousel").each(function(index, el) {
          var config = $(this).data();
          config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];
          config.smartSpeed="300";
          $(this).owlCarousel(config);
        });

        /** HOME SLIDE**/
        if($('#home-slider').length >0 && $('#contenhomeslider').length >0){
            var slider = $('#contenhomeslider').bxSlider(
                {
                    nextText:'<i class="fa fa-angle-right"></i>',
                    prevText:'<i class="fa fa-angle-left"></i>',
                    auto: true
                }

            );
        }

        /**
         * Elevator click
         */
        $(document).on('click','a.btn-elevator',function(e){
            e.preventDefault();
            var target = this.hash;
            if($(document).find(target).length <=0){
                return false;
            }
            var $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top-50
            }, 500);
            return false;
        });
    });


    /**
     * Toggle category menu
     */
    $(document).on('click','.toggle-menu',function(){
        $(this).closest('.nav-menu').find('.navbar-collapse').toggle();
        return false;
    });

    /**
     * Toggle nav menu
     */
    if(w_W < 768){
        $("#main-menu li.dropdown:not(.active) >a").attr('data-toggle','dropdown');
    }else{
        $("#main-menu li.dropdown >a").removeAttr('data-toggle').click(function () {
            return false;
        });
    }

})(jQuery); // End of use strict