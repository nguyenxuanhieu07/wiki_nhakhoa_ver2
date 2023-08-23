<section class="hero-section">
    <img class="d-none d-md-block img-desk" src="<?php echo THEME_URI; ?>/images/banner/background-banner.png" alt="">
    <img class="d-block d-md-none img-mb" src="<?php echo THEME_URI; ?>/images/banner/background-banner-mb.png" alt="">
    <div class="container container-bn">
        <div class="row">
            <div class="col-md-6">
                <div class="search-box">
                    <form action="" class="search">
                        <ul class="search-type nav nav-tabs" id="myTab" role="tablist">
                            <li class="brand active" data-type="brand">
                                <span class="nav-link active" id="brand-tab" data-toggle="tab"
                                    data-target="#brand" type="button" role="tab" aria-controls="brand"
                                    aria-selected="true">
                                    <img class="img" src="<?php echo THEME_URI; ?>/images/icons/icon_co_so.svg" alt="">
                                    Tìm cơ sở nha khoa
                                </span>
                            </li>
                            <li class="doctor" data-type="doctor">
                                <span class="nav-link" id="doctor-tab" data-toggle="tab" data-target="#doctor"
                                    type="button" role="tab" aria-controls="doctor" aria-selected="false">
                                    <img class="img" src="<?php echo THEME_URI; ?>/images/icons/icon_doctor.svg" alt="">
                                    Tìm bác sĩ
                                </span>
                            </li>
                            <input type="hidden" value="brand" class="post-type" name="post-type">
                        </ul>
                        <div class="form-group input-top tab-content " id="myTabContent">
                            <div class="tab-pane fade " id="doctor" role="tabpanel"
                                aria-labelledby="doctor-tab">
                                <?php 
                                    $name_province = wiki_get_province(); 
                                    $service = get_terms(array(
                                        'taxonomy' => 'service_cat',
                                        'hide_empty' => false,
                                        'meta_query' => '=',
                                        'meta_key' => array('in_search_box_service'),
                                        'meta_value' => '1',
                                    ));
                                    $special = get_terms(array(
                                        'taxonomy' => 'doctor_cat',
                                        'hide_empty' => false,
                                        'meta_query' => '=',
                                        'meta_key' => array('in_search_box'),
                                        'meta_value' => '1',
                                    ));
                                ?>
                                <select class="form-control input-service dropdown-toggle" name="name-category-service" id="">
                                    <option value=''>Chọn dịch vụ</option>
                                    <?php foreach ($service as $key => $value) { ?>
                                        <option value="<?php echo $value->term_id; ?>"><?php echo $value->name;  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=" tab-pane fade show active" id="brand" role="tabpanel"
                                aria-labelledby="brand-tab">
                                <select class="form-control input-specialize" name="name-category-specical" id="">
                                    <option value=''>Chọn Chuyên khoa</option>
                                    <?php foreach ($special as $key => $value) { ?>
                                        <option value="<?php echo $value->term_id; ?>"><?php echo $value->name;  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-group input-bottom tab-content">
                            <div class="col-md-6 col-6">
                                <select class="form-control" name="name-province" id="name-province">
                                    <option value="">Chọn tỉnh thành</option>
                                    <?php foreach ($name_province as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-6">
                                <select class="form-control" name="name-district" id="name-district">
                                    <option value="">Chọn quận huyện</option>
                                </select>
                            </div>
                        </div>
                        <input type="text" name="s" value="" hidden>
                        <button class="btn btn-search">
                            Tìm kiếm
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>