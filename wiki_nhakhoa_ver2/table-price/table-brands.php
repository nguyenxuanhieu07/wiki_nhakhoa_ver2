<?php
$data         = $args['data'];
$title        = $args['title'];
$id_service   = $args['id_service']->term_id;
$name_service = $args['id_service']->name;
?>
<h2 class="single-title"><a href="#" id="bang-gia-co-so"></a>
	<?php echo $title; ?>
</h2>
<div class="list-table-brands">
	<?php
	foreach ($data as $key => $value) {
		$name        = rwmb_meta('brand-fullname', '', $value) ? rwmb_meta('brand-fullname', '', $value) : '';
		$list_brand  = rwmb_meta('list-address-brand', '', $value) ? rwmb_meta('list-address-brand', '', $value) : [];
		$brand_desc  = rwmb_meta('brand-desc', '', $value) ? rwmb_meta('brand-desc', '', $value) : '';
		$table_price = rwmb_meta('brand-table', '', $value) ? rwmb_meta('brand-table', '', $value) : '';
		?>
		<div class="table-brands-item">
			<h3 class="table-brand-name">
				<a href="<?php echo get_permalink($value); ?>" class="brand-name-link">
					<?php echo $key + 1; ?>.
					<?php echo $name; ?>
				</a>
			</h3>
			<div class="list-brand-address">
				<?php
				foreach ($list_brand as $key_brand => $value_brand) {
					$class = '';
					if ($key_brand > 1)
						$class = 'd-none';
					?>
					<p class="table-brand-address <?php echo $class; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i>
						<?php echo $value_brand['title-address-brand']; ?>
					</p>
					<?php
				}
				?>
				<?php
				if (count($list_brand) > 2) {
					?>
					<a href="#" class="link-more">Xem thêm</a>
				<?php } ?>
			</div>
			<div class="table-brand-desc">
				<?php echo $brand_desc; ?>
			</div>
			<?php
			if ($table_price) {
				foreach ($table_price as $key_table => $value_table) {
					if ($value_table['brand_table_service'] == $id_service) {
						?>
						<div class="price-table">
							<table>
								<tbody>
									<tr>
										<th>STT</th>
										<th>
											<?php echo $name_service; ?>
										</th>
										<th>Giá (VNĐ)</th>
										<th>Bảo hành</th>
									</tr>
									<?php
									foreach ($value_table['option-table'] as $key_option => $value_option) {
										?>
										<tr>
											<td>
												<?php echo $key_option + 1; ?>
											</td>
											<td>
												<?php echo $value_option['option_table_type'] ?>
											</td>
											<td>
												<?php echo $value_option['option_table_price'] ?>
											</td>
											<td>
												<?php echo $value_option['option_table_guaranteed'] ?>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<?php
					}
				}
			}
			?>
		</div>
		<?php
	}
	?>

</div>