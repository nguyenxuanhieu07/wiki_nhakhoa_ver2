var ajaxSuccess = false;
var scroll_ajax_2 = {
    init : function(){
        $(window).on('scroll', function() {
        	var item = $( ".list-doctors .item-doctor" );
        	if(item.length> 0 && item.length < 30 && !ajaxSuccess){
	        	var targetOffset = document.getElementsByClassName("load-more")[0].offsetTop;
	            var windowHeight = $(window).height();
	            var scrollPosition = $(this).scrollTop();
                console.log(targetOffset)
	            if (targetOffset > 0 && (scrollPosition > targetOffset - (windowHeight * 0.8))) {
					var number_page = $( ".list-doctors .load-more" ).attr('data-number'),
						page_load = $( ".list-doctors .load-more" ).attr('data-load');
						console.log('ngoài')
					if(number_page > 1 && (page_load <= 3 || page_load == '') ){
						console.log('trong')
						ajax_load_post();
					}
	            }
	         }
        });
        var load_more = $('.load-more a.load-more-item');
        if(load_more.length > 0){
	        $(document).on('click', '.load-more a.load-more-item', function(event) {
			    event.preventDefault();
			    ajax_load_post();
			});
    	}
    },
}

jQuery(document).ready(function () {
	scroll_ajax_2.init();
});