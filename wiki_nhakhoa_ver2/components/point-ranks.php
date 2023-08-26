<?php
$post_id               = get_the_ID();
$total_ratting_comment = get_post_meta($post_id, 'total-ratting-post', true) ? get_post_meta($post_id, 'total-ratting-post', true) : 0;
$status_good           = get_post_meta($post_id, 'comment-good', true) ? get_post_meta($post_id, 'comment-good', true) : 0;
$status_rather         = get_post_meta($post_id, 'comment-rather', true) ? get_post_meta($post_id, 'comment-rather', true) : 0;
$status_bad            = get_post_meta($post_id, 'comment-bad', true) ? get_post_meta($post_id, 'comment-bad', true) : 0;
?>
<div class="point-rank">
	<p class="point-total text-center">Điểm đánh giá: 50.1</p>
	<ul class="list-status">
		<li class="item good"><i class="fa fa-circle" aria-hidden="true"></i>Tốt
			<span class="number">(<?php echo $status_good; ?>)</span>
		</li>
		<li class="item rather"><i class="fa fa-circle" aria-hidden="true"></i>khá
			<span class="number">(<?php echo $status_rather; ?>)</span>
		</li>
		<li class="item bad"><i class="fa fa-circle" aria-hidden="true"></i>Cần cải
			thiện <span class="number">(<?php echo $status_bad; ?>)</span></li>
	</ul>
</div>
<div class="modal fade" id="modal-show-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Danh sách bình luận</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>