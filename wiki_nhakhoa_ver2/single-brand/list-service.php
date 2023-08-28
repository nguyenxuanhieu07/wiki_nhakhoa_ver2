<?php
$list_service = rwmb_meta('brand-list-service') ? rwmb_meta('brand-list-service') : '';
if ($list_service) :
?>
    <h2 class="entry-title"><a href="#" id="dich-vu"></a>Dịch vụ</h2>
    <div class="row list-service-brand">
        <?php
        if ($list_service) {
            foreach ($list_service as $key => $value) {
                $term_image = get_term_meta($value->term_id, 'icon-service_cat', true);
                $url = wp_get_attachment_url($term_image);
                $link = get_term_link($value->term_id);
        ?>
                <div class="col-md-6">
                    <a href="<?php echo $link; ?>" class="inner">
                        <img class="img <?php if (!$url) echo 'd-none'; ?>" src="<?php echo $url; ?>" alt="">
                        <h3 class="inner-title"><?php echo $value->name; ?></h3>
                    </a>
                </div>
        <?php
            }
        }
        ?>
    </div>
<?php endif; ?>