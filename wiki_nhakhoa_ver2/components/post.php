<?php 
$author_id=$post->post_author;
$name_author = get_the_author_meta('display_name', $author_id);
$post_id = get_the_ID();
$views = wb_get_post_view($post_id);
?>
<a href="<?php the_permalink(); ?>" class="post-thumbnail">
    <?php the_post_thumbnail('thumbnail'); ?>
</a>
<h3 class="post-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h3>
<div class="post-meta">
    <span class="post-date"><?php the_time( 'd/m/Y' ); ?></span>
    <span class="post-view"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views; ?> lượt xem
    </span>
    
</div>