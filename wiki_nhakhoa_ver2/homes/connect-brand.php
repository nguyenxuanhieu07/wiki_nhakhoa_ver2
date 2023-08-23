<?php 
    $option = get_option('wiki-homepage-options');
    $option_themes = get_option('wiki-theme-options');
    $display_province = isset($option['display_province']) ? $option['display_province'] : [];
    $name_province = wiki_get_province();
    $result_array = array_intersect_key($name_province, array_flip(array_values($display_province)));
    $number_phone = isset($option_themes['numberphone']) ? $option_themes['numberphone'] : '#';
    $wiki_register_doctor = isset($option['wiki-register-doctor']) ? $option['wiki-register-doctor'] : '' ;
    $wiki_register_brand = isset($option['wiki-register-brand']) ? $option['wiki-register-brand'] : '' ;
?>
<section class="brand-top">
    <div class="container">
        <?php if(!empty($display_province)){ ?>
        <h2 class="heading">Top Thương hiệu nha khoa uy tín</h2>
        <div class="brand-top-content">
            <ul class="list-address">
                <?php 
                    $i = 1;
                    foreach ($result_array as $key => $value) { 
                        $class = '';
                        if($i == 1) $class = 'active';
                ?>
                        <li class="item <?php echo $class; ?>" data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
                <?php 
                    $i++;
                }
                ?>
            </ul>
            <div class="row list-brand">
                <?php 
                        $args = array(
                            'post_type' => 'brand',
                            'post_status'   => 'publish',
                            'posts_per_page' => 6,
                            'order'        => 'desc',
                            'orderby'        => 'meta_value_num',
                            'meta_key' => 'total-ratting-post',
                            'meta_query' => array(
                                array(
                                    'meta_key'  => 'doctor_province',
                                    'value'     => $display_province[0],
                                    'compare'  => '=',
                                ),
                            ),
                        );
                        $list_post = new WP_Query($args);
                        if($list_post->have_posts()) {
                            $i = 1;
                            while ( $list_post->have_posts() ) : $list_post->the_post();
                            $args = array( 'key' => $i ,'homepage' => true);
                            ?>
                                <div class="col-md-6">
                                    <?php get_template_part('components/post','brand',$args); ?>
                                </div>
                            <?php 
                            $i++;   
                        endwhile;
                        wp_reset_postdata();
                        }
                ?>
            </div>
            <div class="loader">
                <li class="ball"></li>
                <li class="ball"></li>
                <li class="ball"></li>
            </div>
        </div>
        <?php } ?>
        <div class="home-connect">
            <div class="row home-connect-content">
                <div class="col-md-3  col-phone">
                    <div class="inner-phone">
                        <img class="img d-none d-md-block" src="<?php echo THEME_URI; ?>/images/icons/phone-2.png" alt="">
                        <img class="img d-block d-md-none" src="<?php echo THEME_URI; ?>/images/icons/phome-mb.png" alt="">
                        <div class="inner-content">
                            <p class="hotline"><?php echo $number_phone; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form action="" class="form-connect">
                        <h2 class="form-heading text-center">Trở thành đối tác Wiki Nha Khoa</h2>
                        <div class="form-row">
                            <div class="form-group group-custom col-md-6">
                                <input type="text" name="fullname" class="form-control input-custom"
                                    placeholder="Họ và tên" required>
                                <input type="text" name="numberphone" class="form-control input-custom"
                                    placeholder="Số điện thoại" required
                                    pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}">
                                <input type="email" name="email" class="form-control input-custom"
                                    placeholder="Email" required>
                            </div>
                            <div class="form-group group-custom col-md-6">
                                <textarea type="text" name="note" class="form-control input-custom"
                                    placeholder="Lời nhắn của bạn" rows="5"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-send">Gửi thông tin</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                    if(!empty($wiki_register_doctor)){
                        $url = wp_get_attachment_url($wiki_register_doctor['wiki-register-image'][0]);
                        $link = $wiki_register_doctor['wiki-register-link'] ? $wiki_register_doctor['wiki-register-link'] : '#';
                        ?>
                            <div class="col-md-6">
                                <div class="background-connect">
                                    <img class="img-basis" src="<?php echo $url; ?>" alt="">
                                    <div class="background-connect-content">
                                        <h3 class="title-img"><?php echo $wiki_register_doctor['wiki-register-title']; ?>
                                            <p class="desc-img"><?php echo $wiki_register_doctor['wiki-register-desc']; ?></p>
                                        </h3>
                                        <a href="<?php echo $link; ?>" class="btn-register">Đăng ký tại đây</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                <?php
                    if(!empty($wiki_register_brand)){
                        $url = wp_get_attachment_url($wiki_register_brand['wiki-register-brand-image'][0]);
                        $link = $wiki_register_brand['wiki-register-brand-link'] ? $wiki_register_brand['wiki-register-brand-link'] : '#';
                        ?>
                            <div class="col-md-6">
                                <div class="background-connect">
                                    <img class="img-basis" src="<?php echo $url; ?>" alt="">
                                    <div class="background-connect-content">
                                        <h3 class="title-img"><?php echo $wiki_register_brand['wiki-register-brand-title']; ?>
                                            <p class="desc-img"><?php echo $wiki_register_brand['wiki-register-brand-desc']; ?></p>
                                        </h3>
                                        <a href="<?php echo $link; ?>" class="btn-register">Đăng ký tại đây</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
        </section>