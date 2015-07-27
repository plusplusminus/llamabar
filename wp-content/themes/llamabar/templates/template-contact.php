<?php 

/* Template Name: Contact */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section class="vendors">
	<div class="container">

		<div class="row">
			<div class="col-md-3 section-right-title">
				<h1 class="title"><?php the_title(); ?></h1>
				<br>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/contact-llama.png" class="img-responsive visible-md visible-lg">
			</div>
			<div class="col-md-9 section-right-content">
				<div class="row">
					<div class="col-md-4">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								
								<?php the_content();?>
										
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
					<div class="col-md-8">
						<?php gravity_form(1, false, false, false, '', true, 12); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>