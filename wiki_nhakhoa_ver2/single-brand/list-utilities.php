<?php
$list_brand_utilities = rwmb_meta('list-brand-utilities') ? rwmb_meta('list-brand-utilities') : '';
$list_service_utilities = rwmb_meta('list-service-utilities') ? rwmb_meta('list-service-utilities') : '';
?>
<h2 class="entry-title"><a href="#" id="tien-ich"></a>Tiện ích tại nha khoa</h2>
<p><b>Cơ sở</b></p>
<div class="row">
    <div class="col-6 col-md-4">
        <ul class="list-utilities">
            <li class="item <?php if (!in_array('dau-xe', $list_brand_utilities)) echo 'item-not'; ?>">Bãi đậu xe</li>
            <li class="item <?php if (!in_array('wc', $list_brand_utilities)) echo 'item-not'; ?>">Nhà vệ sinh</li>
            <li class="item <?php if (!in_array('hieu-thuoc', $list_brand_utilities)) echo 'item-not'; ?>">Hiệu thuốc tại chỗ</li>
        </ul>
    </div>
    <div class="col-6 col-md-4">
        <ul class="list-utilities">
            <li class="item <?php if (!in_array('phong-cho', $list_brand_utilities)) echo 'item-not'; ?>">Phòng chờ</li>
            <li class="item <?php if (!in_array('phong-nghi-duong', $list_brand_utilities)) echo 'item-not'; ?>">Phòng nghỉ dưỡng</li>
        </ul>
    </div>
</div>
<p><b>Dịch vụ phòng khám</b></p>
<div class="row">
    <div class="col-6 col-md-4">
        <ul class="list-utilities">
            <li class="item <?php if (!in_array('dat-lich', $list_service_utilities)) echo 'item-not'; ?>">Đặt lịch trực tuyến</li>
            <li class="item <?php if (!in_array('tu-van', $list_service_utilities)) echo 'item-not'; ?>">Tư vấn trực tuyến</li>
            <li class="item <?php if (!in_array('mo-cua', $list_service_utilities)) echo 'item-not'; ?>">Mở cửa cuối tuần</li>
        </ul>
    </div>
    <div class="col-6 col-md-4">
        <ul class="list-utilities">
            <li class="item <?php if (!in_array('cham-soc', $list_service_utilities)) echo 'item-not'; ?>">Chăm sóc sau khám chữa</li>
            <li class="item <?php if (!in_array('ho-so', $list_service_utilities)) echo 'item-not'; ?>">Hồ sơ bệnh nhân điện tử</li>
        </ul>
    </div>
    <div class="col-6 col-md-4">
        <ul class="list-utilities">
            <li class="item <?php if (!in_array('ho-tro', $list_service_utilities)) echo 'item-not'; ?>">Hỗ trợ đi lại</li>
        </ul>
    </div>
</div>