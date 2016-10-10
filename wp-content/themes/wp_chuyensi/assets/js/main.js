/**
 * JS google maps
 */
(function($) {

    /*
     *  new_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function new_map( $el ) {

        // var
        var $markers = $el.find('.marker');


        // vars
        var args = {
            zoom		: 16,
            center		: new google.maps.LatLng(0, 0),
            mapTypeId	: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        };


        // create map
        var map = new google.maps.Map( $el[0], args);


        // add a markers reference
        map.markers = [];


        // add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });


        // center map
        center_map( map );


        // return
        return map;

    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {
            // create info window
            var infowindow = new google.maps.InfoWindow({
                content		: $marker.html()
            });

            // show info window when marker is clicked
            google.maps.event.addListener(marker, 'click', function() {

                infowindow.open( map, marker );

            });
        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map( map ) {

        // vars
        var bounds = new google.maps.LatLngBounds();

        // loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

        // only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 16 );
        }
        else
        {
            // fit to bounds
            map.fitBounds( bounds );
        }

    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */
// global var
    var map = null;

    $(document).ready(function(){

        $('.acf-map').each(function(){

            // create map
            map = new_map( $(this) );

        });

    });

})(jQuery);

/**
 * JS custom code
 */

(function( $ ) {
    /**
     * Scroll to top
     */
    $(document).on('click','.scroll_top',function(){
        $('body,html').animate({scrollTop:0},400);
        return false;
    });

    jQuery("document").ready(function($){
        var wW = $(window).width();
        var wH = $(window).height();

        function navigationScroll() {
            var scrollPosition = 0;
            var nav = $('#nav-top-menu');
            var checkpoint = $('#header').height();
            $(window).scroll(function(event) {
                var currentPosition = $(this).scrollTop();
                if (currentPosition < scrollPosition) {
                    // On top
                    if (currentPosition <= checkpoint) {
                        nav.removeClass('navigation--sticky navigation-unpin navigation--pin');
                    }
                    // on scrollUp
                    else {
                        nav.removeClass('navigation--unpin').addClass('navigation--sticky navigation--pin');
                    }
                }
                // On scollDown
                else {
                    if (currentPosition > checkpoint) {
                        nav.addClass('navigation--unpin').removeClass('navigation--pin');
                    }
                }
                scrollPosition = currentPosition;
            });
        }
        navigationScroll();

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


        /**-- Centeral element --**/

        function center(element){
            var t = $(element);
            var h = t.height();
            var p_h = $(element).parent().height();
            var top = (p_h - h) / 2;
            t.parent().css('position', 'relative');
            t.css({
                'top': top,
                'left': '0',
                'width': '100%',
                'text-align': 'center'
            });
        }

        $('img').load(function(){
            $(window).resize(center('.element-centeral'), function () {
                center('.element-centeral');
            });
        });

        /**-- --**/

        /**
         * JS for slider list hot product
         * Js for list product category
         *
         */
        if(wW < 767){
            $('.latest-deals-product .product-list li, .product-border .product-detail, .tax-products_taxonomy .product-detail').on('click', function (e) {
                $('.latest-deals-product .product-list li, .product-border .product-detail, .tax-products_taxonomy .product-detail').removeClass('hovered');
                $(this).addClass('hovered');
                // $(this).toggleClass('hovered');
            })
        }else{
            $('.latest-deals-product .product-list li, .product-border .product-detail').hover(function () {
                $(this).toggleClass('hovered');
            })
        }

        /**
         * Arrow for list category
         */
        $('.dropdown-cat-s .arrow').bind('click', function () {
            $(this).closest('ul.parent').find('.dropdown-cat-s').first().slideToggle();
        });
        $('.parent').each(function () {
            if($(this).hasClass('active')){
                $(this).parents('.dropdown-cat-s').css('display', 'block');
            }
        });

        /**
         * Checkbox
         *
         */
        radio_checked('input[type="radio"][name="date"]');
        radio_checked('input[type="radio"][name="price"]');

        function radio_checked($selector){
            $($selector).click(function(){
                var $radio = $(this);

                // if this was previously checked
                if ($radio.data('waschecked') == true)
                {
                    $radio.prop('checked', false);
                    $radio.data('waschecked', false);
                }
                else
                    $radio.data('waschecked', true);

                // remove was checked from other radios
                $radio.siblings($selector).data('waschecked', false);
            });
        }

        /**
         * Form submit
         */
        $('.ist-sort-by-button-group').on('change', function () {
            $('.ist-sort-by-button-group').val($(this).val());
            $('#form-sorting').submit();
        });

        /**
         *Slide show
         */
        if(page_type == 'single'){
            $('#gallery-1').royalSlider({
                fullscreen: {
                    enabled: true,
                    nativeFS: true
                },
                controlNavigation: 'thumbnails',
                autoScaleSlider: false,
                autoScaleSliderWidth: 960,
                autoScaleSliderHeight: 850,
                loop: false,
                imageScaleMode: 'fit-if-smaller',
                navigateByClick: true,
                numImagesToPreload:2,
                arrowsNav:true,
                arrowsNavAutoHide: true,
                arrowsNavHideOnTouch: true,
                keyboardNavEnabled: true,
                fadeinLoadedSlide: true,
                globalCaption: false,
                globalCaptionInside: false,
                thumbs: {
                    appendSpan: true,
                    firstMargin: true,
                    paddingBottom: 4
                }
            });
        }
        /**
         * Push menu
         */
        $('.navbar-toggle').click(function () {
           $('body').addClass('pushmenu-push-toright');
        });
    });
})( jQuery );

