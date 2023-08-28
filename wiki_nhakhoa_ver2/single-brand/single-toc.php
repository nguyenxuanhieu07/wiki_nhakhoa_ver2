<?php
$brand_desc = rwmb_meta('brand-desc') ? rwmb_meta('brand-desc') : '';
$license = rwmb_meta('brand-degree') ? rwmb_meta('brand-degree') : '';
$brand_certification = rwmb_meta('brand-certification') ? rwmb_meta('brand-certification') : '';
$list_service = rwmb_meta('brand-list-service') ? rwmb_meta('brand-list-service') : '';
$list_basis = rwmb_meta('brand-degree-basis') ? rwmb_meta('brand-degree-basis') : '';
$brand_insurance_group = rwmb_meta('brand-insurance-group') ? rwmb_meta('brand-insurance-group') : '';
$number_post = isset($args['number_post']) ? $args['number_post'] : 0;
?>
<section class="toc-top">
    <div class="container">
        <ul class="list-toc">
            <?php if ($brand_desc) : ?>
                <li class="item"><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
            <?php endif; ?>
            <?php if ($license) : ?>
                <li class="item"><a href="#giay-phep" class="smoothScroll">Giấy phép</a></li>
            <?php endif; ?>
            <?php if ($brand_certification): ?>
            <li class="item "><a href="#chung-nhan" class="smoothScroll">Chứng nhận</a></li>
            <?php endif; ?>
            <?php if ($list_service): ?>
            <li class="item "><a href="#dich-vu" class="smoothScroll">Dịch vụ</a></li>
            <?php endif; ?>
            <?php if ($list_basis): ?>
            <li class="item "><a href="#co-so-vc" class="smoothScroll">Cơ sở vật chất</a></li>
            <?php endif; ?>
            <?php if ($brand_insurance_group): ?>
            <li class="item "><a href="#bao-hanh" class="smoothScroll">Bảo hành</a></li>
            <?php endif; ?>
            <?php if ($number_post): ?>
            <li class="item "><a href="#expert" class="smoothScroll">Đội ngũ chuyên gia</a></li>
            <?php endif; ?>
            <li class="item"><a href="#tien-ich" class="smoothScroll">Tiện ích</a></li>
            <li class="item"><a href="#danh-gia" class="smoothScroll">Đánh giá khách hàng</a></li>
        </ul>
    </div>
</section>