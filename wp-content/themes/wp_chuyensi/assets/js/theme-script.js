(function($){
    "use strict"; // Start of use strict
    var w_W = $(window).width();
    $(document).ready(function() {
        /* Resize top menu*/
        // resizeTopmenu();
        if(w_W > 767){
            if($('#product-zoom').length >0){
                $('#product-zoom').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750,
                    gallery:'gallery_01'
                });
            }
        }else{
            if($('#product-zoom').length >0){
                $('#product-zoom').elevateZoom({
                    zoomType: "",
                    cursor: "",
                    gallery:'gallery_01'
                });
            }
        }

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

        /* elevator click*/
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

        /* scroll top */
        $(document).on('click','.scroll_top',function(){
            $('body,html').animate({scrollTop:0},400);
            return false;
        });

        // CATEGORY FILTER
        $('.slider-range-price').each(function(){
            var t               = $(this);
            var min             = t.data('min');
            var max             = t.data('max');
            var unit            = t.data('unit');
            var value_min       = t.data('value-min');
            var value_max       = t.data('value-max');
            var label_reasult   = t.data('label-reasult');
            t.slider({
              range: true,
              min: min,
              max: max,
              values: [ value_min, value_max ],
              slide: function( event, ui ) {
                  var str_1 = ui.values[ 0 ].toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
                  var str_2 = ui.values[ 1 ].toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
                var result = label_reasult +" "+ str_1 + unit +' - '+ str_2 + unit;
                $('input[type="text"][name="price-min"]').val(ui.values[ 0 ]);
                $('input[type="text"][name="price-max"]').val(ui.values[ 1 ]);
                t.closest('.slider-range').find('.amount-range-price').html(result);
              }
            });
        });

        /* Product qty */
        $(document).on('click','.btn-plus-down',function(){
            var value = parseInt($('#option-product-qty').val());
            value = value -1;
            if(value <=0) return false;
            $('#option-product-qty').val(value);
            return false;
        });
        $(document).on('click','.btn-plus-up',function(){
            var value = parseInt($('#option-product-qty').val());
            value = value +1;
            if(value <=0) return false;
            $('#option-product-qty').val(value);
            return false;
        });
    });

    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    /*$(window).scroll(function(){
        /!* Show hide scrolltop button *!/
        if( $(window).scrollTop() == 0 ) {
            $('.scroll_top').stop(false,true).fadeOut(600);
        }else{
            $('.scroll_top').stop(false,true).fadeIn(600);
        }
        /!* Main menu on top *!/
        var h = $(window).scrollTop();
        var max_h = $('#header').height() + $('#top-banner').height();
        var width = $(window).width();
        if(width > 767){
            if( h > (max_h + vertical_menu_height)-50){
                // fix top menu
                $('#nav-top-menu').addClass('nav-ontop');
                //$('#nav-top-menu').find('.vertical-menu-content').hide();
                //$('#nav-top-menu').find('.title').removeClass('active');
                // add cart box on top menu
                $('#cart-block .cart-block').prependTo('#shopping-cart-box-ontop .shopping-cart-box-ontop-content');
                $('#shopping-cart-box-ontop').fadeIn();
                $('#user-info-top').prependTo('#user-info-opntop');
                $('#header .header-search-box form').prependTo('#form-search-opntop');
            }else{
                $('#nav-top-menu').removeClass('nav-ontop');
                if($('body').hasClass('home')){
                    $('#nav-top-menu').find('.vertical-menu-content').removeAttr('style');
                    if(width > 1024)
                        $('#nav-top-menu').find('.vertical-menu-content').show();
                    else{
                        $('#nav-top-menu').find('.vertical-menu-content').hide();
                    }
                     $('#nav-top-menu').find('.vertical-menu-content').removeAttr('style');
                }
                ///
                $('#shopping-cart-box-ontop .cart-block').prependTo('#cart-block');
                $('#shopping-cart-box-ontop').fadeOut();
                $('#user-info-opntop #user-info-top').prependTo('.top-header .container');
                $('#form-search-opntop form').prependTo('#header .header-search-box');
            }
        }
    });
    var vertical_menu_height = $('#box-vertical-megamenus .box-vertical-megamenus').innerHeight();*/

    /**==============================
    ***  Remove menu on top
    ===============================**/
    function remove_menu_ontop(){
        var width = parseInt($(window).width());
        if(width < 768){
            $('#nav-top-menu').removeClass('nav-ontop');
            if($('body').hasClass('home')){
                if(width > 1024)
                    $('#nav-top-menu').find('.vertical-menu-content').show();
                else{
                    $('#nav-top-menu').find('.vertical-menu-content').hide();
                }
            }
            ///
            $('#shopping-cart-box-ontop .cart-block').appendTo('#cart-block');
            $('#shopping-cart-box-ontop').fadeOut();
            $('#user-info-opntop #user-info-top').appendTo('.top-header .container');
            $('#form-search-opntop form').appendTo('#header .header-search-box');
        }
    }
    /* Top menu*/
    function scrollCompensate(){
        var inner = document.createElement('p');
        inner.style.width = "100%";
        inner.style.height = "200px";
        var outer = document.createElement('div');
        outer.style.position = "absolute";
        outer.style.top = "0px";
        outer.style.left = "0px";
        outer.style.visibility = "hidden";
        outer.style.width = "200px";
        outer.style.height = "150px";
        outer.style.overflow = "hidden";
        outer.appendChild(inner);
        document.body.appendChild(outer);
        var w1 = parseInt(inner.offsetWidth);
        outer.style.overflow = 'scroll';
        var w2 = parseInt(inner.offsetWidth);
        if (w1 == w2) w2 = outer.clientWidth;
        document.body.removeChild(outer);
        return (w1 - w2);
    }

    /* Toggle category menu*/
    $(document).on('click','.toggle-menu',function(){
        $(this).closest('.nav-menu').find('.navbar-collapse').toggle();
        return false;
    });

    /* Toggle nav menu*/

    if(w_W < 768){
        $("#main-menu li.dropdown:not(.active) >a").attr('data-toggle','dropdown');
    }else{
        $("#main-menu li.dropdown >a").removeAttr('data-toggle').click(function () {
            return false;
        });
    }
})(jQuery); // End of use strict