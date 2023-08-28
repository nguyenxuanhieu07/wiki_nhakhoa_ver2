<?php 
$list_basis = rwmb_meta('brand-degree-basis') ? rwmb_meta('brand-degree-basis') : '';
if ($list_basis): 
?>
<h2 class="entry-title"><a href="#" id="co-so-vc"></a>Cơ sở vật chất</h2>
<div class="list-img-basis">
    <?php
    if ($list_basis) {
        $i = 1;
        foreach ($list_basis as $key => $value) {
            if ($i == 1) {
    ?>
                <img class="item item-top" src="<?php echo $value['full_url'] ?>" alt="">
                <div class="row inner">
                <?php
            } else {
                ?>
                    <div class="item item-top col-md-3">
                        <img class="" src="<?php echo $value['full_url'] ?>" alt="">
                    </div>
            <?php
            }
            $i++;
        }
            ?>
                </div>
            <?php
        }
            ?>
</div>
<?php endif; ?>