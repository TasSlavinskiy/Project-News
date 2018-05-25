( function( $ )  {
    
    'use strict';

    jQuery(document).ready(function($) {


        // init News Ticker js

        $('.news_ticker').easyTicker({
            visible: 1,
            interval: 2000
        });

        // init retina 

        retinajs();

        // init navigation

        $('.primary_navigation').stellarNav({
            theme: 'dark',
            breakpoint: 992,
            closeBtn: false,
            scrollbarFix: true,
            sticky: false,
        });
        $(".primary_navigation > ul").append('<li class="primarynav_search_icon"><a data-toggle="modal" data-target=".search_modal" class="search_box" href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>');

        // match height 

        $('.watchheight').matchHeight();

        // sticky nav 

        $(".logo_and_nav_holder").sticky({ topSpacing: 0 });;


        // init sticky sidebar

        $('.sticky_portion').theiaStickySidebar({
            additionalMarginTop: 30
        });


        // init main banner slider layout one  carousel

        $('.km_banner_layout_one').owlCarousel({
            items: 2,
            loop: true,
            lazyLoad: false,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {

                    items:1
                },
                400: {
                    items: 1
                },
                500: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 2
                },
                1200: {
                    items: 2
                }
            },

        });

        // init main banner slider layout two  carousel

        $('.km_banner_layout_two').owlCarousel({
            items: 3,
            loop: true,
            rewind: false,
            lazyLoad: false,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                 0: {

                    items:1
                },
                400: {
                    items: 1
                },
                500: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 3
                },
                1200: {
                    items: 3
                }
            },

        });

        // init layout four banner slider

        $('.banner_four_carousel').owlCarousel({
            items: 1,
            loop: true,
            rewind: false,
            lazyLoad: false,
            margin: 0,
            smartSpeed: 800,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,

        });

        // init carousel for featured posts under the main banner 

        $('.fp_carousel').owlCarousel({
            items: 3,
            loop: true,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            responsive: {
                 0: {

                    items:1
                },
                400: {
                    items: 1
                },
                500: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1024: {

                    items: 3
                },
                1200: {
                    items: 3
                }
            },

        });

        // init carousel for 
        $('.km_p_w_l_t_carousel').owlCarousel({
            items: 1,
            loop: true,
            rewind: false,
            lazyLoad: false,
            margin: 0,
            smartSpeed: 1000,
            nav: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        });


        // init carousel for related posts

        $('.related_posts_carousel').owlCarousel({
            items: 2,
            loop: true,
            margin: 30,
            smartSpeed: 800,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                 0: {

                    items:1
                },
                400: {
                    items: 1
                },
                500: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1024: {

                    items: 2
                },
                1200: {
                    items: 2
                }
            },

        });

        // init masonary for archuve page layout

        $('.masonary_grid').masonry({

            // options...

            itemSelector: '.masonary_grid_item',

        });

        setTimeout(function() {

            $('.masonary_grid').masonry({

                itemSelector: '.masonary_grid_item',

            });
        }, 5000);


        // Back to top 

        $('body').append('<div id="toTop" class="btn btn-info"><i class="fa fa-angle-up" aria-hidden="true"></i></div>');
        $(window).scroll(function() {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $('#toTop').click(function() {
            $("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });

    });

} ) ( jQuery );