<?php 

/* Template Name: About */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section>
	<div class="fw-container clearfix">
		<div class="fw-right">
			<div class="right-section-1">
				<div class="row">
					<div class="col-lg-4 section-right-title">
						<?php $wtb_link = get_post_meta( $post->ID, '_ck_wtb_link', 1 ); ?>
						<h1 class="title"><?php the_title(); ?></h1>
					</div>
					<div class="col-lg-8 section-right-content">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								
								<?php the_content();?>
										
							<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>	
					</div>
				</div>
			</div>
		</div>
		<div class="fw-left">
			<?php 
				$image_1_src = wp_get_attachment_image_src( get_post_meta( $post->ID, 'about_1_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
				$image_1 = wp_get_attachment_image( get_post_meta( $post->ID, 'about_1_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
			?>
			<div class="about-image-1" style="background-image:url('<?php echo $image_1_src[0]; ?>');">
				<?php echo $image_1; ?>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="fw-container clearfix bg-primary">
		<div class="fw-left">
			<?php 
				$image_2_src = wp_get_attachment_image_src( get_post_meta( $post->ID, 'about_2_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
				$image_2 = wp_get_attachment_image( get_post_meta( $post->ID, 'about_2_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
			?>
			<div class="about-image-2" style="background-image:url('<?php echo $image_2_src[0]; ?>');">
				<?php echo $image_1; ?>
			</div>
		</div>
		<div class="fw-right">
			<div class="right-section-1">
				<?php $quote = get_post_meta( $post->ID, '_ck_about_quote', 1 ); ?>
				<blockquote>
					<?php echo wpautop($quote); ?>
				</blockquote>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="fw-container clearfix">
		<div class="fw-left">
			<div class="right-section-1">
				<div class="row">
					<div class="col-lg-4 bg-bar-wrapper"></div>
					<div class="col-lg-8 section-right-content">
						<?php $content = get_post_meta( $post->ID, '_ck_about_content', 1 ); ?>
						<?php echo wpautop($content); ?>
						<?php $wtb_link = get_post_meta( $post->ID, '_ck_wtb_link', 1 ); ?>
						<a class="rect-link" href="<?php echo $wtb_link;?>" title="<?php echo $title; ?>">Where to buy</a>
					</div>
				</div>
			
			</div>
		</div>
		<div class="fw-right">
			<?php 
				$image_3_src = wp_get_attachment_image_src( get_post_meta( $post->ID, 'about_3_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
				$image_3 = wp_get_attachment_image( get_post_meta( $post->ID, 'about_3_id', 1 ), 'full','',array('class'=>'img-responsive hide') );
			?>
			<div class="about-image-3" style="background-image:url('<?php echo $image_3_src[0]; ?>');">
				<?php echo $image_1; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>