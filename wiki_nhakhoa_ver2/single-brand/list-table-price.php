<?php

$list_service = rwmb_meta('brand-table') ? rwmb_meta('brand-table') : '';
if ($list_service) :
    $table_first = $list_service[0];
    $term_id = $table_first['brand_table_service'];
    $term_data = get_term($term_id, 'service_cat');
    $name = $term_data->name;
?>
    <h2 class="entry-title"><a href="#" id="dich-vu"></a>Bảng giá dịch vụ</h2>
    <section class="search-table-brand">
        <div class="table-search">
            <select class="form-control select-table" post="<?php echo get_the_ID(); ?>">
                <?php
                foreach ($list_service as $key => $value) {
                    $term_id = $value['brand_table_service'];
                    $term_data = get_term($term_id, 'service_cat');
                    //echo '<pre>';
                    //print_r($value);
                    //echo '</pre>';
                ?>
                    <option value="<?php echo $term_id; ?>"><?php echo $term_data->name;  ?></option>
                <?php
                }
                ?>
            </select>
            <a href="#" class="btn-search-table">Tìm kiếm</a>
        </div>
        <div class="price-table brand-table">
            <table>
                <tbody>
                    <tr>
                        <th>STT</th>
                        <th>
                            <?php echo $name; ?>
                        </th>
                        <th>Giá (VNĐ)</th>
                        <th>Bảo hành</th>
                    </tr>
                    <?php
                    foreach ($table_first['option-table'] as $key => $value) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $key + 1; ?>
                            </td>
                            <td>
                                <?php echo $value['option_table_type']; ?>
                            </td>
                            <td>
                                <?php echo $value['option_table_price']; ?>
                            </td>
                            <td>
                                <?php echo $value['option_table_guaranteed']; ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="loader">
            <li class="ball"></li>
            <li class="ball"></li>
            <li class="ball"></li>
        </div>
    </section>
<?php endif; ?>