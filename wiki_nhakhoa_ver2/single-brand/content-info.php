<?php
$list_brand = rwmb_meta('list-address-brand') ? rwmb_meta('list-address-brand') : '';
$brand_desc = rwmb_meta('brand-desc') ? rwmb_meta('brand-desc') : '';
$time_work = rwmb_meta('brand-time-work') ? rwmb_meta('brand-time-work') : '';
?>
<?php if ($brand_desc) : ?>
    <h2 class="entry-title"><a href="#" id="gioi-thieu"></a>Giới thiệu chung về Cơ sở</h2>
    <?php echo $brand_desc; ?>
    <?php if ($list_brand) : ?>
        <div class="time-work">
            <p class="time"><b>Thời gian làm việc:</b> <?php echo $time_work; ?></p>
            <span class="title-brand"><b>Danh sách cơ sở</b></span>
            <ul class="list-address">
                <?php
                foreach ($list_brand as $key => $value) {
                    $class = '';
                    if ($key > 2) {
                        $class = 'd-none';
                    }
                ?>
                    <li class="item <?php echo $class; ?>"><?php echo $value['title-address-brand']; ?></li>
                <?php } ?>
            </ul>
            <a href="#" class="entry-link link-more <?php if (count($list_brand) <= 2) echo 'd-none'; ?>">Xem thêm</a>
        </div>
    <?php endif; ?>
<?php endif; ?>