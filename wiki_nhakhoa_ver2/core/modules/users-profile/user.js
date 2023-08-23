var user_slider = {
    init : function(){
        var list_slider = $('.author .list-img');
        var item = $('.author .list-img .list-item');
        if (list_slider.length > 0 && item.length >= 4) {
            list_slider.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                mobileFirst: false,
                arrows: false,
                dots: false,
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
    }
}
var ajax_load_user = {
    init : function(){
        var list = $('.list-experts-title'),
            item = $('.list-experts-title .item');
         
        if(list.length > 0 && item.length > 1){
            item.on('click',function(){
                var data_value = $(this).find('a').attr('data-value');
                var form_data = new FormData();
                form_data.append('action', 'wiki_ajax_get_author');
                form_data.append('data', data_value);
                $.ajax({
                    url: vmajax.ajaxurl,
                    type: 'POST',
                    data:form_data,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        // $( ".list-doctors .loader" ).css('display','flex');
                        // $( ".list-doctors .item-doctor" ).css('opacity',0.5);
                        ajaxSuccess = true;
                    },
                    success: function (result) {
                        $( ".home-list-author .slick-track" ).empty();
                        $( ".home-list-author" ).slick('slickAdd',result.data);
                        // $( ".list-doctors .loader" ).hide();
                        // $( ".list-doctors .item-doctor" ).css('opacity',1);
                        ajaxSuccess = false;
                    }, 
                });
            });
        }
    }
}
jQuery(document).ready(function () {
    user_slider.init();
    ajax_load_user.init();
});