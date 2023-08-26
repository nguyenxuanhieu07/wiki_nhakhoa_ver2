<?php
$data  = $args['data'];
$title = $args['title'];
?>
<h2 class="single-title"><a href="#" id="yeu-to"></a>
	<?php echo $title; ?>
</h2>
<div class="list-affecting row">
	<?php
	foreach ($data as $key => $value) {
		$key = $key + 1;
		if($key < 10){
			$key_r = '0'.$key;
		}
		?>
		<div class="col-md-6 affecting-item">
			<div class="inner-factors">
				<h3 class="inner-number">
					<?php echo $key_r; ?>.
				</h3>
				<h4 class="inner-text">
					<?php echo $value['factors-title']; ?>
				</h4>
				<div class="inner-desc">
					<?php echo $value['factors-desc']; ?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>