(function (document, window, $) {

	'use strict';
    
    $('.timeline-slider').on('init', function(event, slick){
              
       var $items = slick.$dots.find('li');
       //$items.css('left', );
       var $slides = slick.$slides;
       $.each( $slides, function( index, element ){
           var position = $(element).find('.event').data('position');
           var year = $(element).find('.event').data('year');
           $items.eq(index).css('left', position);
           $items.eq(index).addClass('year-' + year); 
       });
    });
    
    $('.timeline-slider').on('breakpoint', function(event, slick){
              
       var $items = slick.$dots.find('li');
       //$items.css('left', );
       var $slides = slick.$slides;
       $.each( $slides, function( index, element ){
           var position = $(element).find('.event').data('position');
           var year = $(element).find('.event').data('year');
           $items.eq(index).css('left', position);
           $items.eq(index).addClass('year-' + year); 
       });
    });

	$('.timeline-slider').slick({
        dots: true,
        dotsClass: 'dot-cnt',
        appendDots: $('.timeline-cnt'),
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        customPaging: function(slick,index) {
            return '<div class="blue-dot slidelink' + index + '"></div>';
        },
        responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }
        ]
    
    });

    
    $(window).on('resize', function() {
      //$('.timeline-slider').slick('reinit');
    });
    
}(document, window, jQuery));


