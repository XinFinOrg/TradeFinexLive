(function($) {
    "use strict";
    var win = $(window);

    win.on("load", function() {

        /*********************
         *  Banner Carousel  *
         *********************/
        var $element = $('.banner-slider');
        if ($element.length > 0) {
            $element.bxSlider({
                controls: false,
				pager: false,
                infiniteLoop: true,
				auto: true,
                mode: 'fade',
				pause: 8000,
                speed: 1500,
            });
        }
		
		
		/***************************
         *  Features-carousel  *
         ***************************/
        var owl = $(".features-carousel-sec .owl-carousel");
        if (owl.length > 0) {
            owl.owlCarousel({
                items: 1,
                navText: ['<i class="fa fa-chevron-circle-right" ></i>', '<i class="fa fa-chevron-circle-right" ></i>'],
                navigation: true,
                controls: true,
                autoplayTimeout: 4000,
				loop: true,
				autoplay: true
            });
        }
		
		
		/***************************
         *  Video popup  *
         ***************************/
        var $element = $('.video');
        if ($element.length > 0) {
            $element.magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        dailymotion: {
                            index: 'dailymotion.com',
                            id: function(url) {
                                var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                                if (m !== null) {
                                    if (m[4] !== undefined) {
                                        return m[4];
                                    }
                                    return m[2];
                                }
                                return null;
                            },
                            src: 'https://www.dailymotion.com/embed/video/%id%'
                        },
                        youtube: {
                            index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
                            id: 'v=', // String that splits URL in a two parts, second part should be %id%
                            // Or null - full URL will be returned
                            // Or a function that should return %id%, for example:
                            // id: function(url) { return 'parsed id'; }
                            src: 'https://www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                        },
                        vimeo: {
                            index: 'vimeo.com/',
                            id: '/',
                            src: 'https://player.vimeo.com/video/%id%?autoplay=1'
                        },
                        gmaps: {
                            index: 'https://maps.google.',
                            src: '%id%&output=embed'
                        }
                    }
                }
            });
        }

        /***************************
         *  Image popup  *
         ***************************/
        var $element = $('.image-popup');
        if ($element.length > 0) {
            $element.magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                image: {
                    verticalFit: true
                },
            });
        }
        
    });

})(jQuery);
