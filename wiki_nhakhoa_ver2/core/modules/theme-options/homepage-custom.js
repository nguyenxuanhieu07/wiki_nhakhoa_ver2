var slider_2 = {
    init: function () {
        slider_2.list_img_certificate();
        slider_2.list_infrastructure();
    }
    ,
    list_infrastructure: function () {
        var list_slide = $(".list-infrastructure");
        var number_slide = $(".list-infrastructure .item").length;
        if (list_slide.length > 0 && number_slide >= 2) {
            list_slide.slick({
                slidesToShow: 2,
                slidesToScroll: 2,
                mobileFirst: true,
                arrows: true,
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
    list_img_certificate: function () {
        var list_slide = $(".list-img-certificate");
        var number_slide = $(".list-img-certificate .img-item").length;
        if (list_slide.length > 0 && number_slide > 4) {
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
                            slidesToShow: 1.8,
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
    }
}
var show_more_toplist = {
    init: function () {
        var link_more = $('.toplist-item .item-more');
        if (link_more.length > 0) {
            link_more.on('click', function () {
                var tag = $(this);
                var ul = $(this).parent().find('ul');
                var li = ul.find('li');
                if (ul.length > 0 && li.length > 2) {
                    li.each(function (index) {
                        if (index > 1) {
                            if (!$(this).hasClass('active')) {
                                $(this).css('display', 'list-item');
                                $(this).addClass('active');
                                console.log($(this))
                                tag.html('Ẩn bớt');
                            } else {
                                $(this).css('display', 'none');
                                $(this).removeClass('active');
                                tag.html('Xem thêm');
                            }
                        }
                    });
                }
            });
        }
    }
}
var form_sidebar = {
    init: function () {
        var question_form = $('form.form-register-sidebar');
        if (question_form.length > 0) {
            question_form.on('submit', function () {
                var container = $(this);
                var type = "Đặt lịch khám";
                form_sidebar.send_questions(container, type);
                return false;
            });
        }
    },
    send_questions: function (container, type) {
        var form_data = new FormData();
        var fullname = $(container).find('[name="fullname"]').val();
        var email = $(container).find('[name="email"]').val();
        var phone = $(container).find('[name="numberphone"]').val();
        var address = $(container).find('[name="address"]').val();
        var list_service = $(container).find('[name="list-service"]').val();
        var expert = $(container).find('[name="expert"]').val();
        var content = $(container).find('[name="note"]').val();
        var data_url = window.location.href;
        var referer = document.referrer;

        var success_message = '<div class="alert alert-info mt-2 message-text" role="alert">';
        success_message += '<p class="text-center">Gửi thành công! Chúng tôi sẽ sớm liên hệ với bạn.</p>';
        success_message += '</div>';

        form_data.append('fullname', fullname);
        form_data.append('email', email);
        form_data.append('phone', phone);
        form_data.append('service', list_service);
        form_data.append('address', address);
        form_data.append('content', content);
        form_data.append('type', type);
        form_data.append('data_url', data_url);
        form_data.append('referer', referer);
        form_data.append('action', 'questions_form');

        if ((fullname !== "" && phone !== "" && list_service !== '')) {
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
jQuery(document).ready(function () {
    slider_2.init();
    show_more_toplist.init();
    form_sidebar.init();

    var link_more = $('.toplist-item .item-more');
    link_more.each(function (index) {
        var li = $(this).parent().find('ul li');
        $(this).hide();
        if (li.length > 2) {
            $(this).show();
        }
    });
})