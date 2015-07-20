<?php 

/* Template Name: Products */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section class="products">  
	<div class="container">
		<div class="products-heading">
			<h1 class="products-title"><?php the_title(); ?></h1>
		</div>

		<?php

		$query_args = array(
			'post_type' => 'page', 
			'posts_per_page' => -1,
			'post_parent' => $post->ID,
		);

		query_posts( $query_args );

		?>

		<?php if ( have_posts() ) : ?>
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col-md-6">
						<figure class="product-image">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							</a>
						</figure>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>	
</section> <?php // end #wrapper ?>

<section>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php the_content();?>
							
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>	
		</div>
	</div>
</section>
	
<?php get_footer(); ?>