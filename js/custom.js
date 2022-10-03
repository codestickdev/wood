(function($){
    $(document).ready(function(){

        // Smooth scroll
        $(document).on('click', 'a[href^="#"]', function (event) {
            event.preventDefault();
        
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
        });
        
        // Open menu
        $('.menuButton').on('click', function(){
            $('body').addClass('no-scroll');
            $('.sideMenu').addClass('sideMenu--ready');
            setTimeout(function(){
                $('.sideMenu').addClass('sideMenu--active');
            }, 300);
        });

        // Close menu
        $('.closeMenu').on('click', function(){
            $('body').removeClass('no-scroll');
            $('.sideMenu').removeClass('sideMenu--active');
            setTimeout(function(){
                $('.sideMenu').removeClass('sideMenu--ready');
            }, 600);
        });

        $('.menu-item-type-custom a').on('click', function(){
            $('body').removeClass('no-scroll');
            $('.sideMenu').removeClass('sideMenu--active');
            setTimeout(function(){
                $('.sideMenu').removeClass('sideMenu--ready');
            }, 600);
        });

        $(document).mouseup(function(e){
            var container = $('.sideMenu__wrap');
            if (!container.is(e.target) && container.has(e.target).length === 0){
                if($('.sideMenu').hasClass('sideMenu--active')){
                    $('body').removeClass('no-scroll');
                    $('.sideMenu').removeClass('sideMenu--active');
                    setTimeout(function(){
                        $('.sideMenu').removeClass('sideMenu--ready');
                    }, 600);
                }
            }
        });

        $(window).on('scroll', function(e){
            var viewableOffset = $('#page').offset().top - $(window).scrollTop();
            var offset = viewableOffset / 2;
            var chicken = $('.homeHeader').find('.chicken');

            $(chicken).css({
                transform: 'translate(' + offset + 'px, ' + offset + 'px)',
            });
        });
    });

    /**
     * Menu button color change
     */
    $(document).ready(function(){
        var distance = $('#production').offset().top,
            height = $('#production').height() + distance,
            $window = $(window);

        $window.scroll(function() {
            if ( $window.scrollTop() >= distance && $window.scrollTop() <= height ) {
                $('.menuButton').addClass('menuButton--invert');
            }else{
                $('.menuButton').removeClass('menuButton--invert'); 
            }
        });
    });

    /**
     * Home image galleries
     */
    $(document).ready(function(){
        $('.product__image').on('click', function(){
            var gallery = $(this).parents('.product').find('.gallery');

            gallery.find('a').first().click();
        });
    });

    /**
     * Activity gallery
     */
    $(document).ready(function(){
        $('.activity__gallery').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        })
    });

    /**
     * Menu subpage fix
     */
    $(document).ready(function(){
        $('.menu-item-type-custom').each(function(){
            var link = $(this).find('a'),
                href = link.attr('href');
            
            link.attr('href', '/' + href);
        })
    });
}(jQuery));