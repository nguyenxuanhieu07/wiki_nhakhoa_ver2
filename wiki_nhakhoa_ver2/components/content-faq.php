<?php 
    $faq  = rwmb_meta( 'toplist-faq') ? rwmb_meta( 'toplist-faq') : [];
?>
<section class="toplist-faq">
    <a href="#" id="faq"></a>
    <div class="container">
        <h2 class="faq-title">Câu hỏi thường gặp</h2>
        <div class="list-faq">
            <?php 
            foreach ($faq as $key => $value) { 
                $class = '';
                $class_2 = '';
                if($key == 0){
                    $class = 'show';
                    $class_2 = 'active-faq';
                }
            ?>
                <div class="item-faq">
                    <a class="faq-btn <?php echo $class_2; ?>" data-toggle="collapse" href="#collapse-<?php echo $key; ?>" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        <?php echo $value['toplist-title']; ?>
                    </a>
                    <div class="collapse <?php echo $class; ?> " id="collapse-<?php echo $key; ?>">
                        <div class="card card-body collapse-content">
                           <?php echo $value['toplist-content']; ?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>