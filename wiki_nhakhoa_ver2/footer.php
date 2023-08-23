<?php 
$options = get_option('wiki-theme-options');
$id_logo_mb = isset($options['logo-wiki-mb']) ? $options['logo-wiki-mb'][0] : '';
$number_phone = isset($options['numberphone']) ? $options['numberphone'] : '#';
$url = wp_get_attachment_url( $id_logo_mb );
$address_wiki = isset($options['address_wiki']) ? $options['address_wiki'] : '';
$email_wiki = isset($options['email_wiki']) ? $options['email_wiki'] : '';
$facebook = isset($options['fb_wiki']) ? $options['fb_wiki'] : '#';
$twiter = isset($options['tw_wiki']) ? $options['tw_wiki'] : '#';
$instagram = isset($options['ins_wiki']) ? $options['ins_wiki'] : '#';
$youtube = isset($options['you_wiki']) ? $options['you_wiki'] : '#';
$zalo = isset($options['zalo_wiki']) ? $options['zalo_wiki'] : '#';
?>
<footer class="footer">
    <div class="container">
        <div class="row footer-content">
            <div class="col-6 col-md-3">
                <h3 class="footer-title">Về chúng tôi</h3>
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-about-menu',
                        'menu_class'      => 'list-footer',
                    )
                );
                ?>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="footer-title">Chính sách và điều khoản</h3>
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-policy-menu',
                        'menu_class'      => 'list-footer',
                    )
                );
                ?>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="footer-title">Chuyên mục</h3>
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location'  => 'footer-cate-menu',
                        'menu_class'      => 'list-footer',
                    )
                );
                ?>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="footer-title">Kết nối với Wikinhakhoa</h3>
                <ul class="list-footer-icon">
                    <li class="item"><a href="<?php echo $facebook; ?>" class="item-link"><i class="fa fa-facebook-official"
                        aria-hidden="true"></i>Facebook</a></li>
                        <li class="item"><a href="<?php echo $twiter; ?>" class="item-link"><i class="fa fa-twitter"
                            aria-hidden="true"></i>Twitter</a></li>
                            <li class="item"><a href="<?php echo $instagram; ?>" class="item-link"><i class="fa fa-instagram"
                                aria-hidden="true"></i>Instagram</a>
                            </li>
                            <li class="item fm-bottom"><a href="<?php echo $youtube; ?>" class="item-link"><i class="fa fa-youtube-play"
                                aria-hidden="true"></i>Youtube</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row footer-content fb-border">
                    <div class="col-md-12">
                        <img class="footer-logo" src="<?php echo $url; ?>" alt="">
                    </div>
                    <div class="col-12 col-md-3">
                        <h3 class="footer-heading">Nền tảng Đánh giá cơ sở, bác sĩ nha khoa toàn diện</h3>
                        <p class="footer-excerpt">Cung cấp giá trị hữu ích cho khách hàng chọn lựa sử dụng dịch vụ từ nha
                            khoa từ thẩm mỹ, phục hình răng, chỉnh nha cho
                        đến điều trị các vấn đề về răng miệng.</p>
                    </div>
                    <div class="col-6 col-md-3">
                        <ul class="footer-list-infor">
                            <li class="item"><?php echo $address_wiki; ?></li>
                            <li class="item"><?php echo $number_phone; ?></li>
                            <li class="item fm-bottom"><?php echo $email_wiki; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="number-phone">
                        <img class="footer-phone-icon" src="<?php echo THEME_URI; ?>/images/icons/calling.png" alt=""><?php echo $number_phone; ?>
                    </a>
                    <img src="<?php echo THEME_URI; ?>/images/icons/dmca.png" alt="">
                </div>
            </div>
            <div class="copyright">
                <p class="copyright-title text-center"><b>© 2023 - Wiki nha khoa - All Rights Resered</b></p>
                <p class="copyright-excerpt text-center">Thông tin trên website này chỉ mang tính chất tham khảo; không
                    được xem là
                    tư vấn y khoa và không
                    nhằm mục đích thay thế
                cho tư vấn, chẩn đoán hoặc điều trị từ nhân viên y tế. Miễn trừ trách nhiệm.</p>
            </div>
        </div>
    </footer>
    <?php get_template_part('template-parts/action', 'cta'); ?>
    <div class="cta-action">
        <a href="tel:<?php echo $number_phone; ?>" class="cta-link" ><img src="<?php echo THEME_URI; ?>/images/icons/icon-phone.png" alt=""
            />
        </a>
        <a href="<?php echo $facebook; ?>" class="cta-link"><img src="<?php echo THEME_URI; ?>/images/icons/icon-mess.png" alt=""
            />
        </a>
        <a href="<?php echo $zalo; ?>" class="cta-link"><img src="<?php echo THEME_URI; ?>/images/icons/icon-zalo.png" alt=""
            />
        </a>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
