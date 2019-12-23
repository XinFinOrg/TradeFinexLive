(function($) {
    "use strict";
    var win = $(window);

    win.on("load", function() {

        /*****************************
         *  Responsive Equal Height  *
         *****************************/
        var $element = $('.equal-hight');
        if ($element.length > 0) {
            var $viewportWidth = win
                .width();
            if ($viewportWidth > 767) {
                $element.matchHeight();
            }
            win.on('resize', function() {
                if ($viewportWidth > 767) {
                    $element.matchHeight();
                }
            });
        }

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
        
    });
    

})(jQuery);