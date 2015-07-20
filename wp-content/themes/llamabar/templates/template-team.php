<?php 

/* Template Name: Athletes */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section class="athletes">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-4 section-right-title">
						<h1 class="title"><?php the_title(); ?></h1>
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								
								<?php the_content();?>
										
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</div>
					<div class="col-md-8 section-right-content">
						

						<?php
						// Exclude categories on the homepage.

						$query_args = array(
							'post_type' => 'athletes', 
							'posts_per_page' => -1
						);

						query_posts( $query_args );

						?>


						<?php if ( have_posts() ) : $count = 0; ?>
							<div class="row">
								<?php while ( have_posts() ) : the_post(); $count++;?>
								  	<div class="col-md-6 athlete">
								  		<figure class="athlete-image">
								  			<?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?>
								  		</figure>
								    	<?php the_title(); ?>
								    	<?php $sport = get_post_meta($post->ID,'_ck_athletes_sport',true); ?>
								    	<?php $team = get_post_meta($post->ID,'_ck_athletes_team',true); ?>

								    	<?php if(!empty($sport)) : ?>
								    		<div class="athlete-sport"><span><?php echo $sport; ?></span></div>
								    	<?php endif; ?>
								    	<?php if(!empty($team)) : ?>
								    		<div class="athlete-team"><span><?php echo $team; ?></span></div>
								    	<?php endif; ?>

								    	<?php $instagram = get_post_meta($post->ID,'_ck_athletes_instagram',true); ?>
								    	<?php $twitter = get_post_meta($post->ID,'_ck_athletes_twitter',true); ?>
								    	<ul class="list-inline">
									    	<?php if(!empty($instagram)) : ?>
									    		<li class="athlete-instagram"><a href="https://instagram.com/<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
									    	<?php endif; ?>
									    	<?php if(!empty($twitter)) : ?>
									    		<li class="athlete-twitter"><a href="https://twitter.com/<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
									    	<?php endif; ?>
									    </ul>
									</div>
									<?php if ($count % 2 == 0) echo '<div class="clearfix"></div>';?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
						<?php wp_reset_query(); ?>

					</div>
					
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>


<?php get_footer(); ?>