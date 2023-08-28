<?php 
$license = rwmb_meta('brand-degree') ? rwmb_meta('brand-degree') : '';
if ($license): 
?>
<h2 class="entry-title"><a href="#" id="giay-phep"></a>Giấy phép hoạt động</h2>
<div class="row doctor-list-img">
    <?php
    if ($license) {
        foreach ($license as $key => $value) {
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