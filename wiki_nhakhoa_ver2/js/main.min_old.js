var search_banner={init:function(){$(".search-box .search-type li").click(function(){$(this).siblings().removeClass("active"),$(this).addClass("active");var i=$(this).attr("data-type");$(this).closest(".search-type").find('input[name="post-type"]').val(i)})}},slider={init:function(){slider.service_top(),slider.js_list_post(),slider.list_home_brand(),slider.list_home_solution(),slider.specialist_brands(),slider.list_img_certificate(),slider.list_service_brand(),slider.list_img_basis(),slider.list_warrant()},service_top:function(){var i=$(".service-top .list-service"),t=$(".service-top .list-service .item-service").length;i.length>0&&t>=6&&i.slick({dots:!1,arrow:!0,speed:1e3,autoplaySpeed:3e3,slidesToShow:6,slidesToScroll:1,responsive:[{breakpoint:575,settings:{slidesToShow:3,slidesToScroll:3,infinite:!0,dots:!0,centerMode:!1,arrows:!1}}]})},list_home_brand:function(){var i=$(".home-brand .list-home-brand"),t=$(".home-brand .list-home-brand .item-brand").length;i.length>0&&t>=3&&i.slick({dots:!1,arrow:!0,speed:1e3,autoplaySpeed:3e3,slidesToShow:6,slidesToScroll:1,responsive:[{breakpoint:575,settings:{slidesToShow:2,slidesToScroll:1,infinite:!0,dots:!1,centerMode:!1,arrows:!1}}]})},js_list_post:function(){var i=$(".list-post-bottom .js-list-post"),t=$(".list-post-bottom .js-list-post .post-grid").length;i.length>0&&t>=3&&i.slick({dots:!1,arrow:!1,speed:1e3,autoplaySpeed:3e3,slidesToShow:3,slidesToScroll:1,responsive:[{breakpoint:575,settings:{slidesToShow:1.5,slidesToScroll:1,infinite:!0,dots:!1,centerMode:!1,arrows:!1}}]})},list_home_solution:function(){var i=$(".solution-home .list-solution"),t=$(".solution-home .list-solution .item-solution").length;i.length>0&&t>=4&&i.slick({slidesToShow:1.9,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})},specialist_brands:function(){var i=$(".specialist .list-brand"),t=$(".specialist .list-brand .brand-item").length;i.length>0&&t>=3&&i.slick({dots:!1,arrow:!1,speed:1e3,autoplaySpeed:3e3,slidesToShow:4,slidesToScroll:1,responsive:[{breakpoint:575,settings:{slidesToShow:1.5,slidesToScroll:1,infinite:!0,dots:!1,centerMode:!1,arrows:!1}}]})},doctor_list_img:function(){var i=$(".doctor-list-img"),t=$(" .doctor-list-img .img-item").length;i.length>0&&t>=3&&i.slick({slidesToShow:2.3,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})},list_img_certificate:function(){var i=$(".list-img-certificate"),t=$(".list-img-certificate .img-item").length;i.length>0&&t>=3&&i.slick({slidesToShow:1.8,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})},list_service_brand:function(){var i=$(".list-service-brand"),t=$(".list-service-brand .inner").length;i.length>0&&t>=3&&i.slick({slidesToShow:2,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})},list_img_basis:function(){var i=$(".list-img-basis .inner"),t=$(".list-img-basis .inner .item").length;i.length>0&&t>=3&&i.slick({slidesToShow:2.3,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})},list_warrant:function(){var i=$(".list-warrant"),t=$(".list-warrant .inner").length;i.length>0&&t>=3&&i.slick({slidesToShow:1.5,slidesToScroll:1,mobileFirst:!0,arrows:!1,dots:!1,responsive:[{breakpoint:575,settings:"unslick"}]})}},show_menu_mb={init:function(){var i=$(".menu-mb");i.on("click",function(){return $(".collapse-primary").toggleClass("active"),!1})}},show_list_service_mb={init:function(){var i=$(".experts-specialist");i.on("click",function(){$(this).toggleClass("active")})}},show_menu={init:function(){var i=$(".main-menu .menu-item");i.length>0&&i.hover(function(){$(this).find(".dropdown-menu").toggleClass("show")})}},faq={init:function(){$(".faq-btn").on("click",function(){$(this).toggleClass("active-faq")})}},smoothScroll={init:function(){$(".table-content-item").tooltip(),$(".smoothScroll").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var i=$(this.hash);if(i=i.length?i:$("[name="+this.hash.slice(1)+"]"),$(".table-content-item").removeClass("table-content-active"),$('a[href="'+this.hash+'"]').parent().addClass("table-content-active"),i.length)return $("html,body").animate({scrollTop:i.offset().top},1e3),!1}})}},ratting_star_comment={init:function(){var i=$(".comment-criteria .ratting-star .star");i.on("click",function(){$(this).parent().find("li").removeClass("active"),$(this).toggleClass("active");var i=$(this).attr("data-value");$(this).parent().parent().find("input").val(i)})}},general={init:function(){var i=$(".edit-rate"),t=$(".more-rate");i.length>0&&i.on("click",function(){return $("#comment").focus(),!1}),t.length>0&&t.on("click",function(){return!1})}};jQuery(document).ready(function(){general.init(),search_banner.init(),slider.init(),show_menu_mb.init(),show_list_service_mb.init(),show_menu.init(),faq.init(),smoothScroll.init(),ratting_star_comment.init()});
// custom
var select_arrange = {
	init : function(){
		var arrange = $('.select-arrange');
		if(arrange.length > 0){
			arrange.on('change',function(){
				var value = $(this).val();
				var url = new URL(window.location.href);
				var parameterValue = url.searchParams.get('arrange');
				url.searchParams.set('arrange', value);
				var newUrl = url.toString();
				window.location.href = newUrl;
			});
		}
	}
}

var scroll_ajax = {
    init : function(){
    	var ajaxSuccess = false;
        $(window).on('scroll', function() {
        	var item = $( ".list-doctors .item-doctor" );
        	if(item.length> 0 && item.length < 30 && !ajaxSuccess){
	        	var targetOffset = $('.list-doctors .load-more').offset().top;
	            var windowHeight = $(window).height();
	            var scrollPosition = $(this).scrollTop();
	            if (scrollPosition > targetOffset - (windowHeight * 0.8)) {
					var number_page = $( ".list-doctors .load-more" ).attr('data-number'),
						page_load = $( ".list-doctors .load-more" ).attr('data-load');
					if(number_page > 1 && (page_load < 3 || page_load == '') ){
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

function ajax_load_post(){
	var item = $( ".list-doctors .item-doctor" ),
		page_load = $( ".list-doctors .load-more" ).attr('data-load'),
		number_page = $( ".list-doctors .load-more" ).attr('data-number');
	var form_data = new FormData();
    form_data.append('action', 'wiki_ajax_get_post');
    form_data.append('post-type', wikipost.posttype);
    form_data.append('posts_per_page',item.length);
	form_data.append('page_load',page_load);
	form_data.append('number_page',number_page);
	$.ajax({
        url: vmajax.ajaxurl,
        type: 'POST',
        data:form_data,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $( ".list-doctors .loader" ).css('display','flex');
            $( ".list-doctors .item-doctor" ).css('opacity',0.5);
            ajaxSuccess = true;
        },
        success: function (result) {
            $( ".list-doctors" ).empty();
            $( ".list-doctors" ).html(result.data);
            $( ".list-doctors .loader" ).hide();
            $( ".list-doctors .item-doctor" ).css('opacity',1);
            ajaxSuccess = false;
        }, 
    });
}

var show_popup_comment = {
	init: function(){
		$(document).on('click', '.list-status .item', function(event) {
		    event.preventDefault(); // Chặn sự kiện chuyển hướng
		   	$('#modal-show-comment').modal('show');
		   	var post_id = $(this).parent().find('.post-id-cmt').val(),
		   		status = $(this).attr('data-status');
		   	var form_data = new FormData();
		    form_data.append('action', 'wiki_ajax_get_comment');
		    form_data.append('post-id',post_id);
		    form_data.append('status',status);
			$.ajax({
		        url: vmajax.ajaxurl,
		        type: 'POST',
		        data:form_data,
		        contentType: false,
		        processData: false,
		        beforeSend: function () {
		            // $( ".list-doctors .loader" ).css('display','flex');
		            // $( ".list-doctors .item-doctor" ).css('opacity',0.5);
		            // ajaxSuccess = true;
		        },
		        success: function (result) {
		            $( "#modal-show-comment .modal-body" ).empty();
					$( "#modal-show-comment .modal-body" ).html(result.data);
		            // $( ".list-doctors" ).html(result.data);
		            // $( ".list-doctors .loader" ).hide();
		            // $( ".list-doctors .item-doctor" ).css('opacity',1);
		            // ajaxSuccess = false;
		        }, 
		    });
		});
	}
}

var link_more_entry = {
	init : function(){
		var link_more = $('.entry-link.link-more');
		if(link_more.length > 0){
			link_more.on('click',function(){
				var list_address = $(this).parent().find('.list-address .item');
				list_address.each(function( index ) {
					if(index > 2 && $(this).hasClass('d-none')){
						$(this).removeClass('d-none');
						link_more.html('Ẩn bớt');
					}else if(index > 2 && !$(this).hasClass('d-none')){
						$(this).addClass('d-none');
						link_more.html('Xem thêm');
					}
				});
				return false
			});
		}
		var link_more_toplist = $('.toplist-item .link-more');
		if(link_more_toplist.length > 0){
			link_more_toplist.on('click',function(){
				var content = $(this).parent().find('p');
				if(!content.hasClass('show-content')){
					content.addClass('show-content');
					$(this).html('Ẩn bớt');
				}else{
					content.removeClass('show-content');
					$(this).html('Xem thêm');
				}
				return false
			});
		}
	}
}
var ajax_home = {
	init: function(){
		$experts_special = $('.experts-specialist');
		$list_address = $('.brand-top-content .list-address');
		if($experts_special.length > 0){
			$experts_special.on('click','a',function(){
				var id = $(this).parent().attr('data-id');
				$('.experts-specialist a').each(function( index ) {
					$(this).removeClass('active');
				});
				$(this).addClass('active');
				var form_data = new FormData();
				form_data.append('action', 'wiki_ajax_get_doctor');
				form_data.append('id', id);
				$.ajax({
					url: vmajax.ajaxurl,
					type: 'POST',
					data:form_data,
					contentType: false,
					processData: false,
					beforeSend: function () {
						$( ".connect-doctor-main .loader" ).css('display','flex');
						$( ".connect-doctor-content" ).css('opacity',0.5);
					},
					success: function (result) {
						$( ".connect-doctor-content" ).empty();
						$( ".connect-doctor-content" ).html(result.data);
						$( ".connect-doctor-main .loader" ).hide();
						$( ".connect-doctor-content").css('opacity',1);
					}, 
				});
				return false;
			});
			if($list_address.length > 0){
				$list_address.on('click','li',function(){
					var id = $(this).attr('data-id');
					$('.brand-top-content .list-address .item').each(function( index ) {
						$(this).removeClass('active');
					});
					$(this).addClass('active');
					var form_data = new FormData();
					form_data.append('action', 'wiki_ajax_get_brand');
					form_data.append('id', id);
					$.ajax({
						url: vmajax.ajaxurl,
						type: 'POST',
						data:form_data,
						contentType: false,
						processData: false,
						beforeSend: function () {
							$( ".brand-top-content .loader" ).css('display','flex');
							$( ".list-brand" ).css('opacity',0.5);
						},
						success: function (result) {
							$( ".list-brand" ).empty();
							$( ".list-brand" ).html(result.data);
							$( ".brand-top-content .loader" ).hide();
							$( ".list-brand").css('opacity',1);
						}, 
					});
					return false;
					});
			}
		}
	}
}
var send_form = {
	init: function(){
		var question_form = $('.home-connect form.form-connect');
		if (question_form.length > 0) {
            question_form.on('submit', function () {
                var container = $(this);
				var type = "Trở thành đối tác";
                send_form.send_questions(container,type);
                return false;
            });
        }	
	},
	send_questions: function (container,type = '') {
        var form_data = new FormData();

        var fullname = $(container).find('[name="fullname"]').val();
        var email = $(container).find('[name="email"]').val();
        var phone = $(container).find('[name="numberphone"]').val();
        var content = $(container).find('[name="note"]').val();
        var data_url = window.location.href;
        var referer = document.referrer;

        var success_message = '<div class="alert alert-info mt-2 message-text" role="alert">';
        success_message += '<p class="text-center">Gửi thành công! Chúng tôi sẽ sớm liên hệ với bạn.</p>';
        success_message += '</div>';

        form_data.append('fullname', fullname);
        form_data.append('email', email);
        form_data.append('phone', phone);
        form_data.append('content', content);
		form_data.append('type', type);
        form_data.append('data_url', data_url);
        form_data.append('referer', referer);
        form_data.append('action', 'questions_form');

        if ((fullname !== "" && phone !== "")) {
            $.ajax({
                url: vmajax.ajaxurl,
                data: form_data,
                type: "POST",
                dataType: "html",
                cache: false,
                contentType: false,
                processData: false,
                statusCode: {
                    0: function (result) {
                        $(container).next('.result-form').append(success_message);
                        $(container).closest('form').find("input[type=text],input[type=email], textarea").val("");
                        $(container).find('button').attr('disabled', 'disabled');
                        setTimeout(function () {
                            $(container).next('.result-form').empty()
                        }, 5000);
                        $('#modalbooking').modal('hide');
                        setTimeout(function () {
                            $('#modalsucces').modal('show')
                        }, 2000);
                        setTimeout(function () {
                            $('#modalsucces').modal('hide')
                        }, 4000);
                        $('.box-info').show();
                    },
                    200: function () {
                        $(container).next('.result-form').append(success_message);
                        $(container).closest('form').find("input[type=text], textarea").val("");
                        $(container).find('button').attr('disabled', 'disabled')
                        setTimeout(function () {
                            $(container).next('.result-form').empty()
                        }, 5000);

                        $('#modalbooking').modal('hide');
                        setTimeout(function () {
                            $('#modalsucces').modal('show')
                        }, 2000);
                        setTimeout(function () {
                            $('#modalsucces').modal('hide')
                        }, 4000);
                        $('.box-info').show();
                    }
                }
            });
        } else {
            $(container).next('.result-form').append(error_message);
        }
    },
}
var form_comment = {
	init : function(){
		var form = $('form.comment-form');
		var check_agree = $('.comment-form-cookies-consent label');
		if(check_agree.length > 0){
			var content = '<span class="comment-agree">Tôi xác nhận đánh giá trung thực theo <a href="#" class="link">Quy tắc đánh giá</a> của Wiki Nha Khoa <span style="color:red">(*)</span> </span>';
			check_agree.html(content);
		}
		if(form.length > 0){
			form.on('submit', function () {
				var star = $('.value_star'),
					comment = $('textarea[name="comment"]').val(),
					agree = $('input[name="wp-comment-cookies-consent"]:checked');
				var check_star = true;
				star.each(function( index ) {
					var value = $(this).val();
					if(value == ''){
						$(this).parent().find('.text').toggleClass('star-not_click');
						check_star = false;
					}
				});
				if(!check_star || comment == '' || ($('input[name="wp-comment-cookies-consent"]').length > 0 && agree.length == 0)){
					alert("Vui lòng nhập đủ thông tin !");
					return false;
				}
				return true;
            });
		}
	}
}
var slide_list_img = {
	init : function(){
		slide_list_img.doctor_list_img();
		// slide_list_img.list_img_basis();
	},
	doctor_list_img: function(){
        var list_slide = $('.doctor-list-img');
        var number_slide = $('.doctor-list-img .img-item').length;
         if (list_slide.length > 0 && number_slide >= 4) {
            list_slide.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                mobileFirst: false,
                arrows: false,
                dots: false,
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2.3,
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
	list_img_basis: function(){
        var list_slide = $('.list-img-basis .inner');
        var number_slide = $('.list-img-basis .inner .item').length;
         if (list_slide.length > 0 && number_slide >= 4) {
            list_slide.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                mobileFirst: false,
                arrows: false,
                dots: false,
                responsive: [{
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 2.3,
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
}
jQuery(document).ready(function () {
	select_arrange.init();
	scroll_ajax.init();
	show_popup_comment.init();
	link_more_entry.init();
	ajax_home.init();
	send_form.init();
	form_comment.init();
	slide_list_img.init();
});