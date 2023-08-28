<?php 
$brand_certification = rwmb_meta('brand-certification') ? rwmb_meta('brand-certification') : '';
if ($brand_certification): 
?>
<h2 class="entry-title"><a href="#" id="chung-nhan"></a>Chứng nhận</h2>
<div class="row list-img-certificate">
    <?php
    if ($brand_certification) {
        foreach ($brand_certification as $key => $value) {
    ?>
            <div class=" img-item col-md-3">
                <img class="" src="<?php echo $value['full_url'] ?>" alt="">
            </div>
    <?php
        }
    }
    ?>
</div>
<?php endif; ?>