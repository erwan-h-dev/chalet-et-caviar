<?php get_header();

if ( have_posts() ) : 
	
	while( have_posts() ) : the_post(); ?>

		<style>
			.header-image{
				background-image: url(<?php echo the_post_thumbnail_url('post-image'); ?>) !important;
			}
		</style>

		<div class="content section-inner">
		
			<div id="post-<?php the_ID(); ?>" <?php post_class( 'single single-post' ); ?>>
				
				<div class="post-container">
					<div class="post-header">

						<?php if ( is_single() ) : ?>
						
							

						<?php endif; ?>
						
						<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
						
					</div>
					<?php 
						
					if ( ! post_password_required() ) :
					
						$post_format = get_post_format();

						if ( $post_format == 'gallery' ) : ?>
						
							<figure class="featured-media group">
								<?php hitchcock_flexslider( 'post-image' ); ?>
							</figure><!-- .featured-media -->
							
						<?php elseif ( has_post_thumbnail() ) : ?>
								
							<figure class="featured-media">
								<?php the_post_thumbnail( 'post-image' ); ?>
							</figure><!-- .featured-media -->
								
						<?php endif; ?>
						
					<?php endif; ?>

					<?php $attributs = get_fields();?>
						<div class="post-attributes">
							<?php if($attributs['places-min']): ?>
								<div class="attribute-view">
									<i class="fas fa-euro-sign fa-2x desktop-view"></i>
									<i class="fas fa-euro-sign fa-lg mobile-view"></i>
									<p><?php echo $attributs['prix'];?> € la semaine</p>
								</div>
							<?php endif; ?>
							<?php if($attributs['surface']): ?>
								<div class="attribute-view">
									<i class="fas fa-euro-sign fa-2x desktop-view"></i>
									<i class="fas fa-euro-sign fa-lg mobile-view"></i>
									<p><?php echo $attributs['prix'];?> €</p>
								</div>
							<?php endif; ?>
							<div class="attribute-view">
								<i class="fas fa-bed fa-2x desktop-view"></i>
								<i class="fas fa-bed fa-lg mobile-view"></i>
								<p><?php echo $attributs['chambres'];?> chambres</p>
							</div>
							<div class="attribute-view">
								<i class="fas fa-bath fa-2x desktop-view"></i>
								<i class="fas fa-bath fa-lg mobile-view"></i>
								<p><?php echo $attributs['salle_de_bain'];?> salles de bain</p>
							</div>
							<?php if($attributs['places-min']): ?>
								<div class="attribute-view">
									<i class="fas fa-users fa-2x desktop-view"></i>
									<i class="fas fa-users fa-lg mobile-view"></i>
									<p><?php echo $attributs['places-min'];?> - <?php echo $attributs['places-max'];?> personnes</p>
								</div>
							<?php endif; ?>
							<?php if($attributs['surface']): ?>
								<div class="attribute-view">
									<i class="fas fa-expand-arrows-alt fa-2x desktop-view"></i>
									<i class="fas fa-expand-arrows-alt fa-lg mobile-view"></i>
									<p><?php echo $attributs['surface'];?> m²</p>
								</div>
							<?php endif; ?>
						</div><!-- FIN attributes -->
					
					
					
					<div class="post-inner">

						
						<div class="post-content entry-content">
							<?php the_content(); ?>
						</div><!-- .post-content -->
						
						

						<?php 
						$args = array(
							'before'           => '<div class="page-links group"><span class="title">' . __( 'Pages:', 'hitchcock' ) . '</span>',
							'after'            => '</div>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'separator'        => '',
							'pagelink'         => '%',
							'echo'             => 1
						);
					
						wp_link_pages( $args );

						?>

							<?php if ( is_single() ) : ?>
							
								<div class="post-meta">

								</div><!-- .post-meta -->

								<?php
							else :

								edit_post_link(__( 'Edit', 'hitchcock' ), '<div class="post-meta"><p class="post-edit">', '</div></div>' );
							
							endif; ?>
					
					</div><!-- .post-inner -->
					
					<?php comments_template( '', true ); ?>
				
				</div><!-- .post-container -->
				
			</div><!-- .post -->
			
		</div><!-- .content -->

		<?php if(the_post_thumbnail_url('post-image')): ?>
			<style>
				.header-image{
					background-image: url(<?php echo the_post_thumbnail_url('post-image'); ?>) !important;
				}
			</style>
		<?php endif; ?>
		
		<?php 

	endwhile;

endif;

?>
		
<?php get_footer(); ?>