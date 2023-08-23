var search_banner = {
    init: function () {
        $('.search-box .search-type li').click(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            var data_type = $(this).attr('data-type');
            $(this).closest('.search-type').find('input[name="post-type"]').val(data_type);
        })
    }
}
var slider = {
    init: function(){
        slider.service_top();
        slider.js_list_post();
        slider.list_home_brand();
        slider.list_home_solution();
    },
    service_top: function(){
        var list_slide = $('.service-top .list-service');
        var number_slide = $('.service-top .list-service .item-service').length;
         if (list_slide.length > 0 && number_slide >= 6) {
            list_slide.slick({
                dots: false,
                arrow: true,
                speed: 1000,
                // autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 6,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
                        centerMode: false,
                        arrows: false,
                    }
                }]
            })
        }
    },
    list_home_brand: function(){
        var list_slide = $('.home-brand .list-home-brand');
        var number_slide = $('.home-brand .list-home-brand .item-brand').length;
         if (list_slide.length > 0 && number_slide >= 3) {
            list_slide.slick({
                dots: false,
                arrow: true,
                speed: 1000,
                // autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 6,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        centerMode: false,
                        arrows: false,
                    }
                }]
            })
        }
    },
    js_list_post: function(){
        var list_slide = $('.list-post-bottom .js-list-post');
        var number_slide = $('.list-post-bottom .js-list-post .post-grid').length;
         if (list_slide.length > 0 && number_slide >= 3) {
            list_slide.slick({
                dots: false,
                arrow: false,
                speed: 1000,
                // autoplay: true,
                autoplaySpeed: 3000,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        centerMode: false,
                        arrows: false,
                    }
                }]
            })
        }
    },
    list_home_solution: function(){
        var list_slide = $('.solution-home .list-solution');
        var number_slide = $('.solution-home .list-solution .item-solution').length;
         if (list_slide.length > 0 && number_slide >= 4) {
            list_slide.slick({
                slidesToShow: 1.9,
                slidesToScroll: 1,
                mobileFirst: true,
                arrows: false,
                dots: false,
                // centerMode: true,
                // centerPadding: '40px',
                responsive: [{
                    breakpoint: 575,
                    settings: 'unslick'
                }]
            })
        }
    },
}
var show_menu_mb = {
    init: function(){
        var icon_menu = $('.menu-mb');
        icon_menu.on('click',function(){
            $('.collapse-primary').toggleClass('active');
            return false
        });
    }
}
var show_list_service_mb = {
    init: function(){
        var list_service_cat = $('.experts-specialist');
        list_service_cat.on('click', function(){
            $(this).toggleClass('active');    
        });
    }
}
jQuery(document).ready(function () {
    search_banner.init();
    slider.init();
    show_menu_mb.init();
    show_list_service_mb.init();
});