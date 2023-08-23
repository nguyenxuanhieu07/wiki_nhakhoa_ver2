<?php 
    $options = get_option(get_post_type().'_setting');
    $evaluation = $options[get_post_type().'-evaluation-criteria'];
    if($options){
?>
<div class="rate">
    <?php foreach ($evaluation as $key => $value) { ?>
    <div class="comment-criteria">
        <span class="text"><?php echo $value[get_post_type().'-criteria-item'];  ?></span>
        <ul class="ratting-star">
            <li class="star" data-value="5"><i class="fa fa-star"
                    aria-hidden="true"></i></li>
            <li class="star" data-value="4"><i class="fa fa-star"
                    aria-hidden="true"></i></li>
            <li class="star" data-value="3"><i class="fa fa-star"
                    aria-hidden="true"></i></li>
            <li class="star" data-value="2"><i class="fa fa-star"
                    aria-hidden="true"></i></li>
            <li class="star" data-value="1"><i class="fa fa-star"
                    aria-hidden="true"></i></li>
        </ul>
        <input type="text" class="value_star" name="criteria-<?php echo $key; ?>" value="" hidden />
    </div>
    <?php } ?>
    <input type="text" name="check_ratting"   value="<?php echo get_post_type(); ?>" hidden>
</div>
<?php } ?>