var search_banner={
  init: function() {
    $(".search-box .search-type li").click(function() {
      $(this).siblings().removeClass("active");
      $(this).addClass("active");
      var data_type=$(this).attr("data-type");
      $(this)
        .closest(".search-type")
        .find('input[name="post-type"]')
        .val(data_type);
    });
  },
};
var slider={
  init: function() {
    slider.service_top();
    slider.js_list_post();
    slider.list_home_brand();
    slider.list_home_solution();
    slider.specialist_brands();
    slider.doctor_list_img();
    slider.list_img_certificate();
    slider.list_service_brand();
    slider.list_img_basis();
    slider.list_warrant();
    slider.home_list_author();
    slider.service_list_experts();
    slider.service_list_brands();
    slider.service_list_suggest();
    slider.list_blogs_related();
    slider.list_affecting()
  },
  service_top: function() {
    var list_slide=$(".service-top .list-service");
    var number_slide=$(".service-top .list-service .item-service").length;
    if(list_slide.length>0&&number_slide>=6) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        // autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true,
              centerMode: false,
              arrows: false,
            },
          },
        ],
      });
    }
  },
  list_home_brand: function() {
    var list_slide=$(".home-brand .list-home-brand");
    var number_slide=$(".home-brand .list-home-brand .item-brand").length;
    if(list_slide.length>0&&number_slide>6) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: false,
            },
          },
        ],
      });
    }
  },
  js_list_post: function() {
    var list_slide=$(".list-post-bottom .js-list-post");
    var number_slide=$(".list-post-bottom .js-list-post .post-grid").length;
    if(list_slide.length>0&&number_slide>3) {
      list_slide.slick({
        dots: false,
        arrow: false,
        speed: 1000,
        // autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1.5,
              slidesToScroll: 1,
              dots: false,
              centerMode: false,
              arrows: false,
            },
          },
        ],
      });
    }
  },
  list_home_solution: function() {
    var list_slide=$(".solution-home .list-solution");
    var number_slide=$(".solution-home .list-solution .item-solution").length;
    if(list_slide.length>0&&number_slide>=4) {
      list_slide.slick({
        slidesToShow: 1.9,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        // centerMode: true,
        // centerPadding: '40px',
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  specialist_brands: function() {
    var list_slide=$(".specialist .list-brand");
    var number_slide=$(".specialist .list-brand .brand-item").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        dots: false,
        arrow: false,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1.5,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: false,
            },
          },
        ],
      });
    }
  },
  home_list_author: function() {
    var list_slide=$(".home-team-experts .home-list-author");
    var number_slide=$(".home-team-experts .home-list-author .item-author").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        dots: false,
        arrow: false,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              infinite: true,
              dots: true,
              centerMode: false,
              arrows: false,
            },
          },
        ],
      });
    }

    var expert_title=$('.list-experts-title .item');
    if(expert_title.length>0) {
      expert_title.on('click',function() {
        expert_title.removeClass('active');
        $(this).addClass('active');
        return false;
      })
    }
  },
  doctor_list_img: function() {
    var list_slide=$(".info-doctor .doctor-list-img");
    var number_slide=$(".info-doctor .doctor-list-img .img-item").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        slidesToShow: 2.3,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_img_certificate: function() {
    var list_slide=$(".list-img-certificate");
    var number_slide=$(".list-img-certificate .img-item").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        slidesToShow: 1.8,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_service_brand: function() {
    var list_slide=$(".list-service-brand");
    var number_slide=$(".list-service-brand .inner").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_img_basis: function() {
    var list_slide=$(".list-img-basis .inner");
    var number_slide=$(".list-img-basis .inner .item").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        slidesToShow: 2.3,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_warrant: function() {
    var list_slide=$(".list-warrant");
    var number_slide=$(".list-warrant .inner").length;
    if(list_slide.length>0&&number_slide>=3) {
      list_slide.slick({
        slidesToShow: 1.5,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: false,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  service_list_experts: function() {
    var list_slide=$(".top-experts .list-top-expert");
    var number_slide=$(".top-experts .list-top-expert .expert-item").length;
    if(list_slide.length>0&&number_slide>2) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: true,
            },
          },
        ],
      });
    }
  },
  service_list_brands: function() {
    var list_slide=$(".top-brands .list-top-brand");
    var number_slide=$(".top-brands .list-top-brand .brand-item").length;
    if(list_slide.length>0&&number_slide>2) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: true,
            },
          },
        ],
      });
    }
  },
  service_list_suggest: function() {
    var list_slide=$(".status-content .list-suggest");
    var number_slide=$(".status-content .list-suggest .suggest-item").length;
    if(list_slide.length>0&&number_slide>4) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: true,
            },
          },
        ],
      });
    }
  },
  list_blogs_related: function() {
    var list_slide=$(".comments-area .list-blogs-related");
    var number_slide=$(".comments-area .list-blogs-related .related-item").length;
    if(list_slide.length>0&&number_slide>2) {
      list_slide.slick({
        dots: false,
        arrow: true,
        speed: 1000,
        autoplaySpeed: 3000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 575,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              centerMode: false,
              arrows: true,
            },
          },
        ],
      });
    }
  },
  list_affecting: function() {
    var list_slide=$(".list-affecting");
    var number_slide=$(".list-affecting .affecting-item").length;
    if(list_slide.length>0&&number_slide>1) {
      list_slide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: true,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_affecting: function() {
    var list_slide=$(".list-affecting");
    var number_slide=$(".list-affecting .affecting-item").length;
    if(list_slide.length>0&&number_slide>1) {
      list_slide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: true,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
  list_affecting: function() {
    var list_slide=$(".list-affecting-service");
    var number_slide=$(".list-affecting-service .archive-item").length;
    if(list_slide.length>0&&number_slide>1) {
      list_slide.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        arrows: false,
        dots: true,
        responsive: [
          {
            breakpoint: 575,
            settings: "unslick",
          },
        ],
      });
    }
  },
};
var show_menu_mb={
  init: function() {
    var icon_menu=$(".menu-mb");
    icon_menu.on("click",function() {
      $(".collapse-primary").toggleClass("active");
      return false;
    });
  },
};
var show_menu={
  init: function() {
    var item_menu=$(".main-menu .menu-item");
    if(item_menu.length>0) {
      item_menu.hover(function() {
        $(this).find(".dropdown-menu").toggleClass("show");
      });
    }
  },
};
var faq={
  init: function() {
    $(".faq-btn").on("click",function() {
      $(this).toggleClass("active-faq");
    });
  },
};
var smoothScroll={
  init: function() {
    $(".table-content-item").tooltip();
    $(".smoothScroll").click(function() {
      if(
        location.pathname.replace(/^\//,"")==
        this.pathname.replace(/^\//,"")&&
        location.hostname==this.hostname
      ) {
        var target=$(this.hash);
        target=target.length
          ? target
          :$("[name="+this.hash.slice(1)+"]");
        $(".table-content-item").removeClass("table-content-active");
        $('a[href="'+this.hash+'"]')
          .parent()
          .addClass("table-content-active");
        if(target.length) {
          $("html,body").animate(
            {
              scrollTop: target.offset().top,
            },
            1000
          );
          return false;
        }
      }
    });
  },
};
var ratting_star_comment={
  init: function() {
    var star=$(".comment-criteria .ratting-star .star");
    star.on("click",function() {
      $(this).parent().find("li").removeClass("active");
      $(this).toggleClass("active");
      var value=$(this).attr("data-value");
      $(this).parent().parent().find("input").val(value);
    });
  },
};
var general={
  init: function() {
    var focus_comment=$(".edit-rate");
    var focus_view_comment=$(".more-rate");
    if(focus_comment.length>0) {
      focus_comment.on("click",function() {
        $("#comment").focus();
        return false;
      });
    }
    if(focus_view_comment.length>0) {
      focus_view_comment.on("click",function() {
        return false;
      });
    }
  },
};

// custom
var select_arrange={
  init: function() {
    var arrange=$('.select-arrange');
    if(arrange.length>0) {
      arrange.on('change',function() {
        var value=$(this).val();
        var url=new URL(window.location.href);
        var parameterValue=url.searchParams.get('arrange');
        url.searchParams.set('arrange',value);
        var newUrl=url.toString();
        window.location.href=newUrl;
      });
    }
  }
}

var scroll_ajax={
  init: function() {
    var ajaxSuccess=false;
    $(window).on('scroll',function() {
      var item=$(".list-doctors .item-doctor");
      if(item.length>0&&item.length<30&&!ajaxSuccess) {
        var targetOffset=$('.list-doctors .load-more').offset().top;
        var windowHeight=$(window).height();
        var scrollPosition=$(this).scrollTop();
        if(targetOffset>0&&(scrollPosition>targetOffset-(windowHeight*0.8))) {
          var number_page=$(".list-doctors .load-more").attr('data-number'),
            page_load=$(".list-doctors .load-more").attr('data-load');
          if(number_page>1&&(page_load<3||page_load=='')) {
            ajax_load_post();
          }
        }
      }
    });
    var load_more=$('.list-doctors .load-more a.load-more-item');
    if(load_more.length>0) {
      $(document).on('click','.list-doctors .load-more a.load-more-item',function(event) {
        event.preventDefault();
        ajax_load_post();
      });
    }
  },
}

function ajax_load_post() {
  var item=$(".list-doctors .item-doctor"),
    page_load=$(".list-doctors .load-more").attr('data-load'),
    number_page=$(".list-doctors .load-more").attr('data-number'),
    arrange=$(".select-arrange").val();
  var form_data=new FormData();
  form_data.append('action','wiki_ajax_get_post');
  form_data.append('post-type',wikipost.posttype);
  form_data.append('posts_per_page',item.length);
  form_data.append('page_load',page_load);
  form_data.append('arrange',arrange);
  form_data.append('number_page',number_page);
  $.ajax({
    url: vmajax.ajaxurl,
    type: 'POST',
    data: form_data,
    contentType: false,
    processData: false,
    beforeSend: function() {
      $(".list-doctors .loader").css('display','flex');
      $(".list-doctors .item-doctor").css('opacity',0.5);
      ajaxSuccess=true;
    },
    success: function(result) {
      $(".list-doctors").empty();
      $(".list-doctors").html(result.data);
      $(".list-doctors .loader").hide();
      $(".list-doctors .item-doctor").css('opacity',1);
      ajaxSuccess=false;
    },
  });
}

var show_popup_comment={
  init: function() {
    $(document).on('click','.list-status .item',function(event) {
      event.preventDefault(); // Chặn sự kiện chuyển hướng
      $('#modal-show-comment').modal('show');
      var post_id=$(this).parent().find('.post-id-cmt').val(),
        status=$(this).attr('data-status');
      var form_data=new FormData();
      form_data.append('action','wiki_ajax_get_comment');
      form_data.append('post-id',post_id);
      form_data.append('status',status);
      $.ajax({
        url: vmajax.ajaxurl,
        type: 'POST',
        data: form_data,
        contentType: false,
        processData: false,
        beforeSend: function() {
          // $( ".list-doctors .loader" ).css('display','flex');
          // $( ".list-doctors .item-doctor" ).css('opacity',0.5);
          // ajaxSuccess = true;
        },
        success: function(result) {
          $("#modal-show-comment .modal-body").empty();
          $("#modal-show-comment .modal-body").html(result.data);
          // $( ".list-doctors" ).html(result.data);
          // $( ".list-doctors .loader" ).hide();
          // $( ".list-doctors .item-doctor" ).css('opacity',1);
          // ajaxSuccess = false;
        },
      });
    });
  }
}

var link_more_entry={
  init: function() {
    var link_more=$('.entry-link.link-more');
    if(link_more.length>0) {
      link_more.on('click',function() {
        var list_address=$(this).parent().find('.list-address .item');
        list_address.each(function(index) {
          if(index>2&&$(this).hasClass('d-none')) {
            $(this).removeClass('d-none');
            link_more.html('Ẩn bớt');
          } else if(index>2&&!$(this).hasClass('d-none')) {
            $(this).addClass('d-none');
            link_more.html('Xem thêm');
          }
        });
        return false
      });
    }
    var link_more_toplist=$('.toplist-item .link-more');
    if(link_more_toplist.length>0) {
      link_more_toplist.on('click',function() {
        var content=$(this).parent().find('p');
        if(!content.hasClass('show-content')) {
          content.addClass('show-content');
          $(this).html('Ẩn bớt');
        } else {
          content.removeClass('show-content');
          $(this).html('Xem thêm');
        }
        return false
      });
    }
  }
}
var ajax_home={
  init: function() {
    $experts_special=$('.experts-specialist');
    $list_address=$('.brand-top-content .list-address');
    if($experts_special.length>0) {
      $experts_special.on('click','a',function() {
        var id=$(this).parent().attr('data-id');
        $('.experts-specialist a').each(function(index) {
          $(this).removeClass('active');
        });
        $(this).addClass('active');
        $experts_special.removeClass('active');
        var form_data=new FormData();
        form_data.append('action','wiki_ajax_get_doctor');
        form_data.append('id',id);
        $.ajax({
          url: vmajax.ajaxurl,
          type: 'POST',
          data: form_data,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $(".connect-doctor-main .loader").css('display','flex');
            $(".connect-doctor-content").css('opacity',0.5);
          },
          success: function(result) {
            $(".connect-doctor-content").empty();
            $(".connect-doctor-content").html(result.data);
            $(".connect-doctor-main .loader").hide();
            $(".connect-doctor-content").css('opacity',1);
          },
        });
        return false;
      });
      if($list_address.length>0) {
        $list_address.on('click','li',function() {
          var id=$(this).attr('data-id');
          $('.brand-top-content .list-address .item').each(function(index) {
            $(this).removeClass('active');
          });
          $(this).addClass('active');
          var form_data=new FormData();
          form_data.append('action','wiki_ajax_get_brand');
          form_data.append('id',id);
          $.ajax({
            url: vmajax.ajaxurl,
            type: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            beforeSend: function() {
              $(".brand-top-content .loader").css('display','flex');
              $(".list-brand").css('opacity',0.5);
            },
            success: function(result) {
              $(".list-brand").empty();
              $(".list-brand").html(result.data);
              $(".brand-top-content .loader").hide();
              $(".list-brand").css('opacity',1);
            },
          });
          return false;
        });
      }
    }
  }
}
var send_form={
  init: function() {
    var question_form=$('.home-connect form.form-connect');
    if(question_form.length>0) {
      question_form.on('submit',function() {
        var container=$(this);
        var type="Trở thành đối tác";
        send_form.send_questions(container,type);
        return false;
      });
    }
  },
  send_questions: function(container,type) {
    var form_data=new FormData();
    var fullname=$(container).find('[name="fullname"]').val();
    var email=$(container).find('[name="email"]').val();
    var phone=$(container).find('[name="numberphone"]').val();
    var content=$(container).find('[name="note"]').val();
    var data_url=window.location.href;
    var referer=document.referrer;

    var success_message='<div class="alert alert-info mt-2 message-text" role="alert">';
    success_message+='<p class="text-center">Gửi thành công! Chúng tôi sẽ sớm liên hệ với bạn.</p>';
    success_message+='</div>';

    form_data.append('fullname',fullname);
    form_data.append('email',email);
    form_data.append('phone',phone);
    form_data.append('content',content);
    form_data.append('type',type);
    form_data.append('data_url',data_url);
    form_data.append('referer',referer);
    form_data.append('action','questions_form');

    if((fullname!==""&&phone!=="")) {
      $.ajax({
        url: vmajax.ajaxurl,
        data: form_data,
        type: "POST",
        dataType: "html",
        cache: false,
        contentType: false,
        processData: false,
        statusCode: {
          0: function(result) {
            $(container).next('.result-form').append(success_message);
            $(container).closest('form').find("input[type=text],input[type=email], textarea").val("");
            $(container).find('button').attr('disabled','disabled');
            setTimeout(function() {
              $(container).next('.result-form').empty()
            },5000);
            $('#modalbooking').modal('hide');
            setTimeout(function() {
              $('#modalsucces').modal('show')
            },2000);
            setTimeout(function() {
              $('#modalsucces').modal('hide')
            },4000);
            $('.box-info').show();
          },
          200: function() {
            $(container).next('.result-form').append(success_message);
            $(container).closest('form').find("input[type=text], textarea").val("");
            $(container).find('button').attr('disabled','disabled')
            setTimeout(function() {
              $(container).next('.result-form').empty()
            },5000);

            $('#modalbooking').modal('hide');
            setTimeout(function() {
              $('#modalsucces').modal('show')
            },2000);
            setTimeout(function() {
              $('#modalsucces').modal('hide')
            },4000);
            $('.box-info').show();
          }
        }
      });
    } else {
      $(container).next('.result-form').append(error_message);
    }
  },
}
var form_comment={
  init: function() {
    var form=$('form.comment-form');
    var check_agree=$('.comment-form-cookies-consent label');
    if(check_agree.length>0) {
      var content='<span class="comment-agree">Tôi xác nhận đánh giá trung thực theo <a href="#" class="link">Quy tắc đánh giá</a> của Wiki Nha Khoa <span style="color:red">(*)</span> </span>';
      check_agree.html(content);
    }
    if(form.length>0) {
      form.on('submit',function() {
        var star=$('form.comment-form .value_star'),
          comment=$('form.comment-form textarea[name="comment"]').val(),
          agree=$('form.comment-form input[name="wp-comment-cookies-consent"]:checked'),
          address=$('form.comment-form input[name="address"]').val(),
          numberphone=$('form.comment-form input[name="numberphone"]').val();
        var check_star=true;
        star.each(function(index) {
          var value=$(this).val();
          if(value=='') {
            $(this).parent().find('.text').toggleClass('star-not_click');
            check_star=false;
          }
        });

        if((!numberphone&&$('form.comment-form input[name="address"]').length>0)||($('form.comment-form input[name="address"]').length>0&&!address)||!check_star||comment==''||($('form.comment-form input[name="wp-comment-cookies-consent"]').length>0&&agree.length==0)) {
          alert("Vui lòng nhập đủ thông tin !");
          return false;
        }
        return true;
      });
    }
  }
}
var slide_list_img={
  init: function() {
    slide_list_img.doctor_list_img();
    // slide_list_img.list_img_basis();
  },
  doctor_list_img: function() {
    var list_slide=$('.doctor-list-img');
    var number_slide=$('.doctor-list-img .img-item').length;
    if(list_slide.length>0&&number_slide>3) {
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
  list_img_basis: function() {
    var list_slide=$('.list-img-basis .inner');
    var number_slide=$('.list-img-basis .inner .item').length;
    if(list_slide.length>0&&number_slide>=4) {
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

var status_select_option={
  init: function() {
    var option=$('.rate .inner');
    if(option.length>0) {
      option.on('click',function() {
        var item=$(this);
        item.toggleClass('select-option');
      });
    }
  }
}
var show_more={
  init: function() {
    show_more.table_price_brands();
  },
  table_price_brands: function() {
    jQuery('.list-brand-address .link-more').on('click',function() {
      var element=jQuery(this).parents('.list-brand-address').find('.table-brand-address');
      var btn_link = $(this);
      if(!element.hasClass('d-none')){
        btn_link.html('Xem thêm');
      }else{
        btn_link.html('Ẩn bớt');
      }
      jQuery.each(element,function(index) {
        if(index>1) {
          jQuery(this).toggleClass('d-none');
        }
      });
      return false;
    });
  },
}
var ajax_posttype_table={
  init: function() {
    ajax_posttype_table.load_post_experts();
  },
  load_post_experts: function() {
    $(document).on('click','.list-doctors-table .load-more',function() {
      var number_post=$('.list-doctors-table .inner').length;
      var id_service=$(this).attr('data-service')
      $('.list-doctors-table').css('opacity',0.5);
      $('.list-doctors-table loader').css('display','flex');
      jQuery.ajax({
        type: "POST",
        url: vmajax.ajaxurl,
        data: {
          'number_post': number_post,
          'id_service': id_service,
          'action': 'get_posts_experts',
        },
        success: function(result) {
          $('.list-doctors-table').css('opacity',1);
          $('.list-doctors-table loader').css('display','block');
          $('.list-doctors-table').empty();
          $('.list-doctors-table').append(result.data);
        }
      });
      return false;
    });
  },
}
jQuery(document).ready(function() {
  general.init();
  search_banner.init();
  slider.init();
  show_menu_mb.init();
  show_menu.init();
  faq.init();
  smoothScroll.init();
  ratting_star_comment.init();

  select_arrange.init();
  scroll_ajax.init();
  show_popup_comment.init();
  link_more_entry.init();
  ajax_home.init();
  send_form.init();
  // form_comment.init();
  slide_list_img.init();
  status_select_option.init();
  show_more.init();
  ajax_posttype_table.init();
});
