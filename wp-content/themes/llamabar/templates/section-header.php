<?php global $post; ?>

<?php 
	$image_attributes_large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
?>

<section class="banner" style="background:url('<?php echo $image_attributes_large[0];?>');">  
	<div class="container">
      	<div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12">
				<?php $header = get_post_meta($post->ID,'_ck_page_header',true); ?>

				<h1><?php echo $header; ?></h1>

			</div>
		</div>
	</div>
</section>