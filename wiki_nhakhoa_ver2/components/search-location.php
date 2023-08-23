 <div class="search-brands">
    <div class="container">
        <form action="<?php echo get_home_url(); ?>">
            <?php 
                $name_province = wiki_get_province(); 
                $post_type  = isset($_GET['post-type']) ? $_GET['post-type'] : get_post_type();
                $taxonomy = 'doctor_cat';
                $meta_key = 'in_search_box';
                if($post_type == 'doctor'){
                    $taxonomy = 'service_cat';
                    $meta_key = 'in_search_box_service';
                }
                $category_search = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false,
                    'meta_query' => '=',
                    'meta_key' => array($meta_key),
                    'meta_value' => '1',
                ));
            ?>
            <div class="form-row form-search-brands">
                <div class="col-md-3 col-12 form-group form-search-item">
                    <select name="name-province" id="name-province" class="form-control select">
                        <option value="">Chọn tỉnh thành</option>
                        <?php foreach ($name_province as $key => $value) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 col-12 form-group form-search-item">
                    <select name="name-district" id="name-district" class="form-control select">
                        <option value="">Chọn quận huyện</option>
                    </select>
                </div>
                <div class="col-md-3 col-12 form-group form-search-item m-last-child">
                    <select name="name-category" id="name-specialist" class="form-control select">
                        <option value="">Lựa chọn</option>
                        <?php foreach ($category_search as $key => $value) { ?>
                            <option value="<?php echo $value->term_id; ?>"><?php echo $value->name;  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="text" name="s" value="" hidden>
                <input type="text" name="post-type" value="<?php echo $post_type; ?>" hidden>
                <button type="submit" class="btn btn-search">Lọc</button>
            </div>
        </form>
    </div>
</div>