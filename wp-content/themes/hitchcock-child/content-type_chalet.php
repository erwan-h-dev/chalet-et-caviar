<?php 

$thumbnail_url = ( has_post_thumbnail() && ! post_password_required() ) ?  get_the_post_thumbnail_url( $post->ID, 'post-thumb' ) : ''; 
$style_attr = $thumbnail_url ? ' style="background-image: url( ' . $thumbnail_url . ' );"' : '';

?>

<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class( 'post chalet-card' ); ?><?php echo $style_attr; ?>>

	<div class="post-overlay">
		
		<?php if ( is_sticky() && ! is_single() ) : ?>
		
			<p><span class="fa fw fa-star"></span><?php _e( 'Sticky', 'hitchcock' ); ?></p>
		
		<?php endif; ?>
		
		<div class="archive-post-header">

		<?php $type = get_the_terms( $post_id, 'type_chalet' ); ?>
		
			<p class="archive-post-price"><?php echo get_price($post_id); ?></p>
			<?php if ( get_the_title() ) : ?>
				<h2 class="archive-post-title"><?php the_title(); ?></h2>
			<?php endif; ?>
		
		</div>

	</div>
	
</a>
<!-- .post -->
