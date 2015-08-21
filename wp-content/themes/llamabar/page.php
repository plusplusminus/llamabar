<?php get_header(); ?>
<?php global $post; ?>

<section class="vendors">
	<div class="container">

		<div class="row">
			<div class="col-md-4 section-right-title">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
			<div class="col-md-8 section-right-content">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php the_content();?>
								
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>


<?php get_footer(); ?>