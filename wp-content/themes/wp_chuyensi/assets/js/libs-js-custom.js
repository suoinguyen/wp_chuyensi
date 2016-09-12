/**
 * Created by SuoiNguyen on 9/13/2016.
 */
(function( $ ) {

    $.fn.centeralElement = function() {
        return this.each(function () {
            var t = $(this);
            var h = t.height();
            var c_h = $(this).find('.product-info').height();
            var top = [(h-c_h)/2] - (c_h/2);

            t.css('position','relative');
            t.find('.element-centeral').css({'position':'absolute', 'top':'0', 'left':'0', 'width':'100%', 'height':'100%', 'text-align':'center', 'padding-top':top});

            t.hover(function () {
                $(this).toggleClass('hovered');
            });
        });

    };

})( jQuery );
