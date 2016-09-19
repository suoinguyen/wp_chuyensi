/**
 * Created by SuoiNguyen on 9/13/2016.
 */
(function( $ ) {

    $.fn.extend({

        /**
         * Center for element
         * @returns {*}
         */
        centeralElement : function () {
            return this.each(function () {
                var t = $(this);
                var h = t.height();
                var c_h = $(this).find('.product-info').height();
                var top = [(h - c_h) / 2] - (c_h / 2);
                var wH = $(window).width();

                t.css('position', 'relative');
                t.find('.element-centeral').css({
                    'position': 'absolute',
                    'top': top,
                    'left': '0',
                    'width': '100%',
                    'text-align': 'center'
                });

                if(wH <= 767){
                    t.click(function () {
                        // $(this).attr('tabindex', -2).focus();
                        $(this).toggleClass('hovered');
                    });
                       /* .focusout(function () {
                        // $(this).removeClass('hovered');
                    });*/
                }else {
                    t.hover(function () {
                        $(this).toggleClass('hovered');
                    });
                }
            });
        }
    });
    
})( jQuery );
