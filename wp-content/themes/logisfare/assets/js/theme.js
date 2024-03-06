/*
Theme Name: Logisfare
Theme URI: https://themewar.com/wp/logisfare
Author: themewar
Author URI: https://themeforest.net/user/themewar
Description: LogisFare - Transport & Logistics WordPress Theme
Version: 1.0
License: 
License URI: 
*/

/*==================================
   [Table of contents]
===================================
   01. Variables
   02. Nice Selects
   03. Owl Carousels and Slick
   04. Masonry Grid
   05. Count Down
   06. Image Popup
   07. Back To Top
   08. Aos Animation 
   09. Revolution Slider
   10. Sidebar Toggle
   11. Price Slider
   12. Payment Method Toggle
   13. Cirle Progress
   14. Skill Bar
   15. Counter
   16. Sticky Header
   17. Popup Search
   18. Preloader
   19. Contact Form Submission
   20. Google Maps
   21. Social Toggle Menu
   22. Mobile Menu
*/

(function ($) {
    'use strict';

   /*------------------------------------------------------
   /  01. Variables
   /------------------------------------------------------*/
    
    var $serviceCarousel = $('.serviceCarousel'),
        $relatedProductCarousel = $('.relatedProductCarousel'),
        $sortNavSelect = $('.sortNav select'), 
        $contactFromSelect = $('.wpcf7-form-control-wrap select'), 
        $widgetSelect = $('#archives-dropdown--1'), 
        $widgetSelect02 = $('select[name="bwm-just-testing"]'), 
        $widgetSelect03 = $('.wp-block-archives select'), 
        $widgetSelect04 = $('.widget_categories form select'), 
        $variationItem = $('.variationItem .value > select'), 
        $testimonialCarousel01 = $('.testimonialCarousel01'),
        $clientSlider = $('.clientSlider'),
        $collectionSlider = $('.collectionSlider'),
        $productSlider01 = $('.productSlider01'),
        $productGallery = $('.productGallery'),
        $productGalleryThumb = $('.productGalleryThumb'),
        $clientSlider02 = $('.clientSlider02'),
        $sliderRange = $('#sliderRange');

   /*------------------------------------------------------
   /  02. OWL Carousels
   /------------------------------------------------------*/
    if($sortNavSelect.length > 0){
        $sortNavSelect.niceSelect();
    };
    if ($variationItem.length > 0) {
        $variationItem.niceSelect();
    };
    if ($contactFromSelect.length > 0) {
        $contactFromSelect.niceSelect();
    };
    if ($widgetSelect.length > 0) {
        $widgetSelect.niceSelect();
    };
    if ($widgetSelect02.length > 0) {
        $widgetSelect02.niceSelect();
    };
    if ($widgetSelect03.length > 0) {
        $widgetSelect03.niceSelect();
    };
    if ($widgetSelect04.length > 0) {
        $widgetSelect04.niceSelect();
    };
    
    /*------------------------------------------------------
   /  03. OWL Carousels
   /------------------------------------------------------*/

    // Testimonial Slider 
    $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/themewar-testimonial.default', function ($scope, $) {
        var $wrap = $scope.find('.tesWrap01');
        var $wrap02 = $scope.find('.testWrapper02');
        var $testimonial01= $scope.find('.tesWrap01 .testimonialCarousel01');
        var $testimonial02 = $scope.find('.tesWrap01 .testimonialCarousel02');
        var $testimonial03= $scope.find('.testWrapper02 .testimonialCarousel01');
        var $testimonial04 = $scope.find('.testWrapper02 .testimonialCarousel02');

        var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
        var loop = ($wrap.attr('data-loop') == '1') ? true : false;
        var nav = ($wrap.attr('data-nav') == '1') ? true : false;
        var dots = ($wrap.attr('data-dots') == '1') ? true : false;

        var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 3;
        var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 3;
        var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
        var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
        var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
        var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;

        var autoplay2 = ($wrap02.attr('data-autoplay') == '1') ? true : false;
        var loop2 = ($wrap02.attr('data-loop') == '1') ? true : false;
        var nav2 = ($wrap02.attr('data-nav') == '1') ? true : false;
        var dots2 = ($wrap02.attr('data-dots') == '1') ? true : false;

        var itemxxl2 = ($wrap02.attr('data-itemxxl') * 1 > 0 ) ? $wrap02.attr('data-itemxxl') * 1 : 3;
        var itemxl2 = ($wrap02.attr('data-itemxl') * 1 > 0 ) ? $wrap02.attr('data-itemxl') * 1 : 3;
        var itemlg2 = ($wrap02.attr('data-itemlg') * 1 > 0 ) ? $wrap02.attr('data-itemlg') * 1 : 3;
        var itemmd2 = ($wrap02.attr('data-itemmd') * 1 > 0 ) ? $wrap02.attr('data-itemmd') * 1 : 2;
        var itemsm2 = ($wrap02.attr('data-itemsm') * 1 > 0 ) ? $wrap02.attr('data-itemsm') * 1 : 1;
        var gapping2 = ($wrap02.attr('data-gapping') * 1 > 0) ? $wrap02.attr('data-gapping') * 1 : 0;

            // wrapper 02
            if ($testimonial03.length > 0) {
                var $testimonial03_obj = $testimonial03.owlCarousel({
                    autoplay: autoplay2,
                    margin: gapping2,
                    loop: loop2,
                    nav: nav2,
                    dots: dots2,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: itemsm2
                        },
                        768: {
                            items: itemmd2
                        }, 
                        992: {
                            items: itemlg2
                        },
                        1200: {
                            items: itemxl2
                        },
                        1400: {
                            items: itemxxl2
                        }
                    },
                });
                $('.tprev3').on('click', function () {
                    $testimonial03.trigger('next.owl.carousel');
                });
                $('.tnext3').on('click', function () {
                    $testimonial03.trigger('prev.owl.carousel');
                });
            };
            if ($testimonial04.length > 0) {
                var $testimonial04_obj = $testimonial04.owlCarousel({
                    autoplay: autoplay2,
                    margin: gapping2,
                    loop: loop2,
                    nav: nav2,
                    dots: dots2,
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm2
                        },
                        768: {
                            items: itemmd2
                        }, 
                        992: {
                            items: itemlg2
                        },
                        1200: {
                            items: itemxl2
                        },
                        1400: {
                            items: itemxxl2
                        }
                    },
                });
                $('.tprev01').on('click', function () {
                    $testimonial04.trigger('next.owl.carousel');
                });
                $('.tnext01').on('click', function () {
                    $testimonial04.trigger('prev.owl.carousel');
                });
            };
        
            // Wrapper 01
            if ($testimonial01.length > 0) {
                var $testimonial01_obj = $testimonial01.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };
            if ($testimonial02.length > 0) {
                var $testimonial02_obj = $testimonial02.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };

        })
    });
    // Letest Blog Slider 
    $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/themewar-latest-blog.default', function ($scope, $) {
        var $wrap = $scope.find('.blogsliderWrapper');
        var $blogCarousel = $scope.find('.blogCarousel');

        var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
        var loop = ($wrap.attr('data-loop') == '1') ? true : false;
        var nav = ($wrap.attr('data-nav') == '1') ? true : false;
        var dots = ($wrap.attr('data-dots') == '1') ? true : false;

        var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 3;
        var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 3;
        var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
        var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
        var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
        
        var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;
            if ($blogCarousel.length > 0) {
                var $blogCarousel_obj = $blogCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 3000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };       

        })
    });

    // Service Slider 
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/themewar-services-slider.default', function ($scope, $) {
            var $wrap = $scope.find('.serviceSliderWrapp');
            var $serviceCarousel = $scope.find('.serviceCarousel');
            var $serviceCarousel02 = $scope.find('.serviceCarousel02');
    
            var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($wrap.attr('data-dots') == '1') ? true : false;
    
            var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 3;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 3;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
            
            var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;
            
            if ($serviceCarousel.length > 0) {
                var $serviceCarousel_obj = $serviceCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 3000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };       
            
            if ($serviceCarousel02.length > 0) {
                var counterSlide = document.getElementById('counterSlide');
                var $serviceCarousel02_obj = $serviceCarousel02.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    autoplayTimeout: 3000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
                $('.tnext').on('click', function () {
                    $serviceCarousel02.trigger('next.owl.carousel');
                });
                $('.tprev').on('click', function () {
                    $serviceCarousel02.trigger('prev.owl.carousel');
                });
                $($serviceCarousel02).on("initialized.owl.carousel changed.owl.carousel", function(event) {
                    var element = event.target;
                    var items = event.item.count;
                    var item = event.item.index + 1;
                    if (item > items) {
                        item = item - items;
                    }
                    $(counterSlide).html('<ins>0' + item + '</ins>' + " / " + '0' + items);
                });
            };       

        })
    });

    // Folio slider 
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/themewar-folio-slide.default', function ($scope, $) {
            var $wrap = $scope.find('.folioSliderWrapper');
            var $folioSlider01 = $scope.find('.folioSlider01');
            var $folioSlider02 = $scope.find('.collectionSlider');

            var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
            var loop = ($wrap.attr('data-loop') == '1') ? true : false;
            var nav = ($wrap.attr('data-nav') == '1') ? true : false;
            var dots = ($wrap.attr('data-dots') == '1') ? true : false;

            var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 3;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 3;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
            
            var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;
            
            if ($folioSlider01.length > 0) {
                var $folioSlider01_obj = $folioSlider01.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 3000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };   
            
            if ($folioSlider02.length > 0) {
                var $folioSlider02_obj = $folioSlider02.owlCarousel({
                   autoplay: autoplay,
                   margin: 60,
                   loop: true,
                   nav: nav,
                   items: 3,
                   dots: dots,
                   center: true,
                   navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                   responsiveClass: true,
                   responsive: {
                        0: {
                            items: 1,
                            nav: false,
                        },
                        410: {
                            items: 1,
                            nav: false,
                        },
                        576: {
                            items: 1,
                            margin: 0,
                        },
                        768: {
                            items: 2,
                            margin:20,
                        },
                        991: {
                            items: 2,
                            margin: 40,
                        },
                        1200: {
                            items: 2.266,
                            margin: 30,
                       },
                       1365: {
                            margin: 60,
                            items: 2.266,
                       }
                    },
                });
                checkClasses($folioSlider02);
                $folioSlider02_obj.on('translated.owl.carousel', function(event) {
                   checkClasses($folioSlider02);
                });
                function checkClasses($collectionSlider){
                   $collectionSlider.find('.owl-stage .owl-item').removeClass('activePrev activeNext');
                   $collectionSlider.find('.owl-stage .owl-item.active.center').prev('.owl-item').addClass('activePrev');
                   $collectionSlider.find('.owl-stage .owl-item.active.center').next('.owl-item').addClass('activeNext');
                }
             }
        })
    });
        

   // Owl Carousel For Client Carousel
   $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/themewar-clients-slider.default', function ($scope, $) {
        var $wrap = $scope.find('.clientSliderWrap');
        var $clSlider01 = $scope.find('.clientSlider');

        var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
        var loop = ($wrap.attr('data-loop') == '1') ? true : false;
        var nav = ($wrap.attr('data-nav') == '1') ? true : false;
        var dots = ($wrap.attr('data-dots') == '1') ? true : false;

        var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 7.8;
        var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 5;
        var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
        var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
        var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
        
        var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;
            if ($clSlider01.length > 0) {
                var $clSlider01_obj = $clSlider01.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class=' logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };

        })
    });

   // Owl Carousel For Product Carousel
   if ($productSlider01.length > 0) {
      var $productSlider01_obj = $productSlider01.owlCarousel({
         autoplay: false,
         margin: 20,
         loop: true,
         nav: false,
         dots: false,
         items: 4,
         responsiveClass: true,
         responsive: {
            0: {
               items: 1
            },
            600: {
               items: 2
            },
            991: {
               items: 3
            },
            1200: {
               items: 4
            },
         },
      });
   };

    //Team Carousel 
   $(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/themewar-team.default', function ($scope, $) {
        var $wrap = $scope.find('.teamSliderdWraper');
        var $teamSlider = $scope.find('.teamCarousel');

        var autoplay = ($wrap.attr('data-autoplay') == '1') ? true : false;
        var loop = ($wrap.attr('data-loop') == '1') ? true : false;
        var nav = ($wrap.attr('data-nav') == '1') ? true : false;
        var dots = ($wrap.attr('data-dots') == '1') ? true : false;

        var itemxxl = ($wrap.attr('data-itemxxl') * 1 > 0 ) ? $wrap.attr('data-itemxxl') * 1 : 4;
        var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 4;
        var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
        var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
        var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
        
        var gapping = ($wrap.attr('data-gapping') * 1 > 0) ? $wrap.attr('data-gapping') * 1 : 0;

            if ($teamSlider.length > 0) {
                var $teamSlider_obj = $teamSlider.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    dots: dots,
                    navText: ["<i class='logisfare-arrow_prev'></i>","<i class='logisfare-arrow_next'></i>"],
                    autoplayTimeout: 4000,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        }, 
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        },
                        1400: {
                            items: itemxxl
                        }
                    },
                });
            };

        })
    });
   
    // Owl Carousel For Related Product Carousel
    if($('.relatedWrap').length > 0){
        var $wrap = $('.relatedProductRow').find('.relatedWrap');
        var $relatedProductCarousel = $('.relatedProductRow').find('.relatedProductCarousel');

        var itemxxl = ($wrap.attr('data-xxl') * 1 > 0 ) ? $wrap.attr('data-xxl') * 1 : 3;
        var itemxl = ($wrap.attr('data-xl') * 1 > 0 ) ? $wrap.attr('data-xl') * 1 : 3;
        var itemlg = ($wrap.attr('data-lg') * 1 > 0 ) ? $wrap.attr('data-lg') * 1 : 2;
        var itemmd = ($wrap.attr('data-md') * 1 > 0 ) ? $wrap.attr('data-md') * 1 : 2;
        var itemsm = ($wrap.attr('data-sm') * 1 > 0 ) ? $wrap.attr('data-sm') * 1 : 1;
        var $relatedProductCarousel_obj = $relatedProductCarousel.owlCarousel({
            autoplay: false,
            margin: 24,
            loop: true,
            nav: false,
            navText: ['<i class="themewar_angle-left"></i>', '<i class="themewar_angle-right"></i>'],
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: itemsm
                },
                768: {
                    items: itemmd
                },
                992: {
                    items: itemlg
                },
                1200: {
                    items: itemxl
                },
                1400: {
                    items: itemxxl
                }
            }
        });
    }
   /*--------------------------------------------------------
   / 03. Sticky Header
   /---------------------------------------------------------*/
   if ($(".isSticky").length > 0) {
      var header_height = $(".isSticky").height();
      $(window).on('scroll', function () {
         if ($(window).scrollTop() > 300) {
            $(".isSticky").addClass('fixedHeader animated slideInDown');
            $(".stickyHeader03").addClass('isSticky');
         } else {
            $(".isSticky").removeClass('fixedHeader animated slideInDown');
         }
      });
   }

   /*--------------------------------------------------------
   / 04. Mobile Menu
   /---------------------------------------------------------*/
   $(window).on("load", function (e) {
      $('.mainMenu li.menu-item-has-children > a').on('click', function(e){
         e.preventDefault();
         if ($(window).width() < 1200) {
            $(this).siblings('ul').stop(true, true).slideToggle();
            $(this).parent().toggleClass('active')
         }
      });
      $('.menu_btn').on('click', function(e){
         e.preventDefault();
         $('.mainMenu:not(.n0tMenuSticky)').stop(true, true).slideToggle();
         $(this).toggleClass('active');
      });
      
      $('.sticky03Btn').on('click', function(e){
         e.preventDefault();
         $('.mainMenu').stop(true, true).slideToggle();
         $(this).toggleClass('active');
      });
      
   });

    /*------------------------------------------------------
    /  05. Aos Animation 
    /------------------------------------------------------*/
    AOS.init();

   /*--------------------------------------------------------
   /   06. Back To Top
   /--------------------------------------------------------*/
   function backtotop() {
      $(window).scroll(function () {
         if ($(this).scrollTop() > 50) {
            $('#backtotop').addClass('activate');
         } else {
            $('#backtotop').removeClass('activate');
         }
      });
      $('#backtotop').on('click', function () {
         $("html, body").animate({ scrollTop: 0 }, 600);
         return false;
      });
   }
   backtotop();

   // Funfact Countdown
   $(".countfact").appear();
   $(document.body).on("appear", ".countfact", function (e, $affected) {
      $affected.each(function () {
            var $this = $(this);
            if (!$this.hasClass("appeared")) {
                jQuery({Counter: 0}).animate({Counter: $this.attr("data-count")},{
                duration: 3000,
                easing: "swing",
                step: function () {
                    var num = Math.ceil(this.Counter).toString();
                    if (Number(num) > 999) {
                        while (/(\d+)(\d{3})/.test(num)) {
                            num = num.replace(/(\d+)(\d{3})/, '<span class="count-span">' + "$1" + "</span>" + "$2");
                        }
                    }
                    if ($this.hasClass("hasFraction")) {
                        var num = Math.abs(this.Counter);
                        num = num.toFixed(1).toString();
                    }
                    $(".counter", $this).html(num);
                },
                });
                $this.addClass("appeared");
            }
      });
   });


   
    // Product Slider 
    if($productGalleryThumb.length > 0){
        var $wrap = $('body').find('.productGalleryWrap');
        var items = ($wrap.attr('data-itme') != '') ? $wrap.attr('data-itme') : 4;

        // Slick For productGallery
        $productGallery.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.productGalleryThumb'
        });

        // Slick For productGalleryThumb
        $productGalleryThumb.slick({
            slidesToShow: items,
            slidesToScroll: 1,
            slidesToShow: 4,
            asNavFor: '.productGallery',
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="logisfare-left-arrow"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="logisfare-right-arrow"></i></button>',
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 3
                    }
                }
            ]
        });
    }
   /*--------------------------------------------------------
   / 07. Skill Bar
   /----------------------------------------------------------*/
   if ($(".singleSkill").length > 0) {
      $('.singleSkill').appear();
      $('.singleSkill').on('appear', loadSkills);
   }
   var coun = true;
   function loadSkills() {
      $(".singleSkill").each(function () {
         var datacount = $(this).attr("data-skill");
         $(".skill", this).animate({ 'width': datacount + '%' }, 2000);
         if (coun) {
            $(this).find('span').each(function () {
               var $this = $(this);
               $({ Counter: 0 }).animate({ Counter: datacount }, {
                  duration: 2000,
                  easing: 'swing',
                  step: function () {
                     $this.text(Math.ceil(this.Counter) + '%');
                  }
               });
            });
         }
      });
      coun = false;
   }

    // Search Popup
    $('.anMobileSearch, .anSearchBtn').on('click', function (e) {
        e.preventDefault();
        $('.popup_search_sec').toggleClass('active');
    });
    $('.popup_search_overlay').on('click', function () {
        $('.popup_search_sec').removeClass('active');
    });
    $('.popup_search_form input').on('focus', function () {
        $('.popup_search_form').addClass('focused');
    });
    $('.popup_search_form input').on('blur', function () {
        $('.popup_search_form').removeClass('focused');
    });
    $(".popup_search_overlay, #search_Closer").on("click",function(){
        $(".popup_search_sec").removeClass("active");
    });


    
   /*------------------------------------------------------
   /  08. All Popup
   /------------------------------------------------------*/
   // Image Popup
   if ($('.popup_image').length > 0) {
      $('.popup_image').lightcase({
         transition: 'elastic',
         showSequenceInfo: false,
         slideshow: true,
         maxHeight: 650,
         swipe: true,
         showTitle: false,
         showCaption: false,
         controls: true
      });
   }

   // Video Popup
   if ($('.popup_video').length > 0) {
      $('.popup_video').lightcase({
         transition: 'elastic',
         showSequenceInfo: false,
         slideshow: false,
         swipe: true,
         showTitle: false,
         showCaption: false,
         controls: true
      });
   }

   $(window).on('load', function () {
      if ($(".shafull_container").length > 0) {
         var $grid = $('.shafull_container');
         $grid.shuffle({
            itemSelector: '.shaf_item',
            sizer: '.shaf_sizer'
         });
         /* reshuffle when user clicks a filter item */
         $('.shaf_filter li').on('click', function () {
            // set active class
            $('.shaf_filter li').removeClass('active');
            $(this).addClass('active');
            // get group name from clicked item
            var groupName = $(this).attr('data-group');
            // reshuffle grid
            $grid.shuffle('shuffle', groupName);
         });
      }
   });

   /*--------------------------------------------------------
   /  11. Preloader
   /---------------------------------------------------------*/
   $(window).on('load', function () {
      var preload = $('.preloader');
      if (preload.length > 0) {
          preload.delay(500).fadeOut('slow');
      }
   });
  
    
    
    /*--------------------------------------------------------
    / 23. Qty
    /----------------------------------------------------------*/
    $("body").on('click', '.btnMinus, .btnPlus', function (e) {
        e.preventDefault();
        let cart_qty = $(this).closest('.quantity').find('.carqty'),
            vals = parseInt(cart_qty.val(), 10),
            step = parseInt(cart_qty.attr('step'), 10);
        var min_qty = cart_qty.attr('min');
        let min;
        if (typeof min_qty !== 'undefined' && min_qty !== false && min_qty != ''){
            min = min_qty;
        }else{
            min = 1;
        }
        if (!vals || vals === '' || vals === undefined || isNaN(vals)) vals = 0;
        if (!step || step === '' || step === undefined || isNaN(step)) step = 1;
        if ($(this).is('.btnMinus')) {
            if (vals > 1) {
                vals -= step;
                cart_qty.val(vals).trigger('change');
            } else {
                cart_qty.val(min).trigger('change');
            }
        } else {
            vals += step;
            cart_qty.val(vals).trigger('change');
        }
    });
    
    /*--------------------------------------------------------
    / 24. Ajax Coupon
    /----------------------------------------------------------*/
    $(document.body).on('submit', '#cartCouponForm', function(e){
        e.preventDefault();
        var $this = $(this);
        var $thisBTN = $('button[name="apply_coupon"]', $this);
        var $form = $(document.body).find('.woocommerce-cart-form');
        
        var $text_field = $( '#coupon_code' );
        var coupon_code = $text_field.val();
        
        $.ajax({
            type: 'POST',
            url: logisfare_object.ajaxurl,
            data: {'action': 'logisfare_apply_coupon', coupon_code: coupon_code, logisfare_security: logisfare_object.ajax_nonce},
            beforeSend: function (response) {
                $thisBTN.attr('disabled', 'disabled');
            },
            success: function (response) {
                $( '.woocommerce-error, .woocommerce-message, .woocommerce-info' ).remove();
                var $target = $( '.woocommerce-notices-wrapper' );
                $target.prepend( response );
                $thisBTN.removeAttr('disabled');
            },
            complete: function (response) {
                $text_field.val( '' );
                $('button[name="update_cart"]', $form).removeAttr('disabled').trigger('click');
            }
        });
    });
    
    /*--------------------------------------------------------
    / 25. Show Login Toggle
    /----------------------------------------------------------*/
    $(document.body).on('click', '.showloginForm', function(e){
        e.preventDefault();
        $(this).parent('p').parent('.loginLinks').siblings('form.woocommerce-form-login').slideToggle();
        $(document.body).toggleClass('loginActivate');
    });
    

})(jQuery);

/*------------------------------------------------------
/  26. Js Preloader
/------------------------------------------------------*/
(function ($) {
    var width = 100,
            perfData = window.performance.timing,
            EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
            time = parseInt((EstimatedTime / 1000) % 60) * 100;


    var PercentageID = $(".pre_Precent"),
            start = 0,
            end = 100,
            durataion = time;
    animateValue(PercentageID, start, end, durataion);

    function animateValue(id, start, end, duration) {

        var range = end - start,
                current = start,
                increment = end > start ? 1 : -1,
                stepTime = Math.abs(Math.floor(duration / range)),
                obj = $(id);

        var timer = setInterval(function () {
            current += increment;
            $(obj).text(current + "%");
            $(".loader_bar").css({width: current + '%'})

            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
    setTimeout(function () {
        $('.preloader-wrap').fadeOut(400);
    }, time);

})(jQuery);

