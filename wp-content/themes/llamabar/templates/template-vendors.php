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
				<ul id="filters" class="list-unstyled">
				  <li><a class="filter active" data-filter="*">All</a></li>
					<?php foreach ( $terms as $term ) {
       						echo '<li><a role="button" class="filter" data-filter=".' . $term->slug . '">' . $term->name . '</a></li>';
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
						  		
						  		<h3 class="vendor-title"><?php the_title(); ?></h3>

						  		<p class="vendor-details">							    	
							    	<?php $address = get_post_meta($post->ID,'_ck_vendor_address',true); ?>
							    	<?php $tel = get_post_meta($post->ID,'_ck_vendor_phone',true); ?>
							    	<?php $website = get_post_meta($post->ID,'_ck_vendor_website',true); ?>
							    	<?php $email = get_post_meta($post->ID,'_ck_vendor_email',true); ?>
							    	
							    	<?php if(!empty($tel)) : ?>
							    		<span class="fa fa-building fa-fw"></span> <?php echo $address;?><br>
									 <?php endif; ?>

							    	<?php if(!empty($tel)) : ?>
							    		<span class="fa fa-mobile fa-fw"></span> <a href="tel:<?php echo $tel;?>" target="_blank"><?php echo $tel; ?></a><br>
									 <?php endif; ?>

							     	<?php if(!empty($website)) : ?>
							     		<span class="fa fa-globe fa-fw"></span> <a href="http://<?php echo $website;?>" target="_blank">Visit Website</a><br>
							 		 <?php endif; ?>

							    	<?php if(!empty($email)) : ?>
							    		<span class="fa fa-envelope fa-fw"></span> <a href="mailto:<?php echo $email;?>" >Send an email.</a><br>
									 <?php endif; ?>
								</p>
							</div>
							<?php if ($count % 3 == 0) echo '<div class="clearfix"></div>';?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
			
		</div>

	</div>
</section>


<?php get_footer(); ?>