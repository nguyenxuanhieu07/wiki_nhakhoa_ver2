<?php 
$author_id = get_post_field ('post_author', get_the_ID());
$display_name = get_the_author_meta( 'display_name' , $author_id );
$post_id = get_the_ID();
$current_comment = get_comments_number($post_id);
$post_upload = mt_rand(500, 1200);
$post_reviews = mt_rand(4, 6);
$user_follower = mt_rand(50, 100);  
?>
<div class="author-box ">
	<div class="d-flex align-items-center">
		<div class="avartar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 40); ?>
		</div>
		<div class="post-info">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author-link" rel="author">
				<?php echo $display_name; ?>
			</a>
			<div class="d-flex author-meta-wrap">
				<div class="author-meta">
					<span class="author-meta-item">
						Bài đăng
						<span class="value">
							<?php echo $post_upload; ?>
						</span>
					</span>
				</div>
				<div class="author-meta">
					<span class="author-meta-item">
						Điểm đánh giá
						<span class="value">
							<?php echo $post_reviews; ?>
						</span>
					</span>
				</div>
				<div class="author-meta">
					<span class="author-meta-item">
						Người theo dõi
						<span class="value">
							<?php echo $user_follower; ?>
						</span>
					</span>
				</div>
			</div>
		</div>
		<a href="" class="btn-follow">
			<svg xmlns="http://www.w3.org/2000/svg" width="22.243" height="21.368" viewBox="0 0 22.243 21.368">
				<path id="Path_1950" data-name="Path 1950"
				d="M-74.406-7.274a.709.709,0,0,0-.119-.242,5.938,5.938,0,0,0-2.032-1.717l-.382-.2.27-.333a3.278,3.278,0,0,0,.722-2.032,3.282,3.282,0,0,0-.967-2.334,3.276,3.276,0,0,0-2.334-.967,3.276,3.276,0,0,0-2.334.967,3.282,3.282,0,0,0-.967,2.334,3.261,3.261,0,0,0,.722,2.029l.27.336-.382.2a5.944,5.944,0,0,0-2.036,1.717.684.684,0,0,0-.137.417A.86.86,0,0,0-84.105-7a.672.672,0,0,0,.27.456.691.691,0,0,0,.512.133.688.688,0,0,0,.459-.27A4.544,4.544,0,0,1-81.27-8.017a4.549,4.549,0,0,1,2.022-.477,4.549,4.549,0,0,1,2.022.477,4.544,4.544,0,0,1,1.594,1.331.662.662,0,0,0,.2.179.663.663,0,0,0,.252.091A.72.72,0,0,0-74.9-6.43a.709.709,0,0,0,.242-.119.71.71,0,0,0,.182-.2A.715.715,0,0,0-74.392-7,.7.7,0,0,0-74.406-7.274Zm-2.964-4.145a1.886,1.886,0,0,1-.526.978,1.886,1.886,0,0,1-.978.526,1.974,1.974,0,0,1-.375.039,1.885,1.885,0,0,1-.732-.147,1.918,1.918,0,0,1-.858-.7,1.886,1.886,0,0,1-.322-1.065,1.886,1.886,0,0,1,.561-1.353,1.886,1.886,0,0,1,1.353-.561,1.9,1.9,0,0,1,1.065.322,1.918,1.918,0,0,1,.7.858A1.928,1.928,0,0,1-77.371-11.419ZM-69,2.5A5.891,5.891,0,0,0-71.347.327l-.385-.2.273-.336a3.284,3.284,0,0,0,.725-2.036A3.282,3.282,0,0,0-71.7-4.575a3.287,3.287,0,0,0-2.334-.964,3.287,3.287,0,0,0-2.334.964,3.282,3.282,0,0,0-.967,2.334A3.284,3.284,0,0,0-76.61-.205l.273.336-.385.2a5.955,5.955,0,0,0-2.235,2l-.291.438-.291-.438a5.955,5.955,0,0,0-2.235-2l-.385-.2.273-.336a3.284,3.284,0,0,0,.725-2.036,3.282,3.282,0,0,0-.967-2.334,3.293,3.293,0,0,0-2.334-.964,3.287,3.287,0,0,0-2.334.964,3.282,3.282,0,0,0-.967,2.334,3.284,3.284,0,0,0,.725,2.036l.273.336-.385.2A5.923,5.923,0,0,0-89.5,2.5a5.9,5.9,0,0,0-.869,3.08.692.692,0,0,0,.2.491.692.692,0,0,0,.491.2h20.855a.7.7,0,0,0,.491-.2.692.692,0,0,0,.2-.491A5.909,5.909,0,0,0-69,2.5ZM-85.818-3.593a1.914,1.914,0,0,1,1.356-.561,1.911,1.911,0,0,1,1.062.322,1.9,1.9,0,0,1,.708.858,1.931,1.931,0,0,1,.109,1.107,1.91,1.91,0,0,1-.526.981,1.917,1.917,0,0,1-.981.522,1.91,1.91,0,0,1-.371.039,1.885,1.885,0,0,1-.732-.147,1.9,1.9,0,0,1-.858-.7,1.89,1.89,0,0,1-.326-1.065A1.9,1.9,0,0,1-85.818-3.593Zm-3.136,8.483.112-.438A4.556,4.556,0,0,1-87.234,2a4.554,4.554,0,0,1,2.772-.946A4.554,4.554,0,0,1-81.691,2a4.556,4.556,0,0,1,1.608,2.449l.112.438Zm13.567-8.483a1.9,1.9,0,0,1,1.353-.561,1.931,1.931,0,0,1,1.065.322,1.918,1.918,0,0,1,.7.858,1.931,1.931,0,0,1,.109,1.107,1.91,1.91,0,0,1-.526.981,1.906,1.906,0,0,1-.978.522,1.974,1.974,0,0,1-.375.039,1.9,1.9,0,0,1-.732-.147,1.9,1.9,0,0,1-.858-.7,1.886,1.886,0,0,1-.322-1.065A1.886,1.886,0,0,1-75.387-3.593Zm-3.139,8.483.116-.438A4.534,4.534,0,0,1-76.8,2.006a4.544,4.544,0,0,1,2.768-.946,4.544,4.544,0,0,1,2.768.946,4.559,4.559,0,0,1,1.612,2.446l.112.438Z"
				transform="translate(90.37 15.095)" fill="#fff"></path>
			</svg>
			Theo dõi tác giả
		</a>
	</div>
</div>