<?php
$data  = $args['data'];
$name  = $args['name']->name;
$title = $args['title'];
?>
<h2 class="single-title"><a href="#" id="bang-gia"></a>
	<?php echo $title; ?>
</h2>
<div class="price-table">
	<table>
		<tbody>
			<tr>
				<th>STT</th>
				<th>
					<?php echo $name; ?>
				</th>
				<th>Giá thị trường (VNĐ)</th>
			</tr>
			<?php
			foreach ($data as $key => $value) {
				?>
				<tr>
					<td>
						<?php echo $key + 1; ?>
					</td>
					<td>
						<?php echo $value['table-name-category']; ?>
					</td>
					<td>
						<?php echo $value['table-price-expected']; ?> -
						<?php echo $value['table-price-expected1']; ?> vnđ
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>