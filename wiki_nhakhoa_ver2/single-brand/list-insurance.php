<?php
$brand_insurance_group = rwmb_meta('brand-insurance-group') ? rwmb_meta('brand-insurance-group') : '';
if ($brand_insurance_group) :
?>
    <h2 class="entry-title "><a href="#" id="bao-hanh"></a>Bảo hành</h2>
    <div class="row list-warrant">
        <?php
        if ($brand_insurance_group) {
            foreach ($brand_insurance_group as $key => $value) {
                $url = wp_get_attachment_url($value['brand-insurance-img'][0]);
                $title = $value['brand-insurance-title'];
                $desc = $value['brand-insurance-text'];
        ?>
                <div class="col-md-4">
                    <div class="inner">
                        <img class="img" src="<?php echo $url; ?>" alt="">
                        <div class="content">
                            <p class="item title"><?php echo $title; ?></p>
                            <p class="item desc"><?php echo $desc; ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
<?php endif; ?>