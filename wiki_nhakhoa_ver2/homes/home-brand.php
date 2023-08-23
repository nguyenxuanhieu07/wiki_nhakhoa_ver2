<?php 
    $option = get_option('wiki-homepage-options');
    $list_home_brand = isset($option['brand-group']) ? $option['brand-group'] : [];
    if(!empty($list_home_brand)){
        ?>
        <section class="home-brand">
            <div class="container">
                <h2 class="heading">Khám phá các thương hiệu nha khoa</h2>
                <div class="row list-home-brand">
                    <?php 
                        foreach ($list_home_brand as $key => $value) { 
                        $url = wp_get_attachment_url($value['brand-item-image'][0]);
                        $title = $value['brand-group-title'];
                    ?>

                        <div class="col-md-2">
                            <div class="inner item-brand">
                                <img src="<?php echo $url; ?>" alt="">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php
    }
?>
