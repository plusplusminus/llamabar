<?php 

/* Template Name: Vendors */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section class="vendors">
	<div class="container">

		<div class="row">
			<div class="col-md-3 section-right-title">
				<h1 class="title"><?php the_title(); ?></h1>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php the_content();?>
								
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
				<?php $terms = get_terms('location','orderby=count&hide_empty=1');?>
				<ul id="filters">
				  <li><button href="#" class="filter" data-filter="*">All</button></li>
					<?php foreach ( $terms as $term ) {
       						echo '<li><button class="filter" data-filter=".' . $term->slug . '">' . $term->name . '</button></li>';
     					} ?>
				</ul>
			</div>
			<div class="col-md-9 section-right-content">

				<?php
				// Exclude categories on the homepage.

				$query_args = array(
					'post_type' => 'vendors', 
					'posts_per_page' => -1
				);

				query_posts( $query_args );

				?>


				<?php if ( have_posts() ) : $count = 0; ?>
					<div id="vendor-grid" class="row">
						<?php while ( have_posts() ) : the_post(); $count++;?>
							<?php $product_terms = wp_get_object_terms($post->ID, 'location'); ?>
						  	<div class="col-md-4 vendor mix <?php foreach ($product_terms as $product_term) echo $product_term->slug.' '; ?>">
						  		<figure class="vendor-image">
						  			<?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?>
						  		</figure>
						    	<?php the_title(); ?>
						    	<?php the_content(); ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
			
		</div>

	</div>
</section>


<?php get_footer(); ?>