<?php 

/* Template Name: Product */

?>

<?php get_header(); ?>
<?php global $post; ?>

<section>
	<div class="container-fluid clearfix">
		<div class="row">
			<div class="col-md-5 same-height" style="padding-left:0px; padding-right: 0px;">
				<?php 
					$image_1 = wp_get_attachment_image( get_post_meta( $post->ID, 'products_1_id', 1 ), 'full','',array('class'=>'img-responsive') );
					$image_2 = wp_get_attachment_image( get_post_meta( $post->ID, 'products_2_id', 1 ), 'full','',array('class'=>'img-responsive') );
				?>
				<div class="products-image-1">
					<?php echo $image_1; ?>
				</div>
				<div class="products-image-2">
					<?php echo $image_2; ?>
				</div>
			</div>
			<div class="col-md-7 same-height">
				<div class="right-section-1">
					<div class="row">
						<div class="col-md-5 section-right-title">
							<?php $wtb_link = get_post_meta( $post->ID, '_ck_wtb_link', 1 ); ?>
							<h1 class="title"><?php the_title(); ?></h1>
						</div>
						<div class="col-md-7 section-right-content">
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
									
									<?php the_content();?>
											
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>	
							  <?php
								  $entries = get_post_meta( get_the_ID(), '_ck_page_links', true );

								  foreach ( (array) $entries as $key => $entry ) {
								    $img = $title = $desc = $caption = '';

								    if ( isset( $entry['link'] ) )
								  	      $link = esc_html( $entry['link'] );
								  	 }
								?>


							<div class="row">
								<a class="rect-link" href="<?php echo $link;?>" title="<?php echo $title; ?>">Where to buy</a>
							</div>
						</div>
					</div>
				</div>
				<div class="right-section-2">
					<div class="row">
						<div class="col-md-5 section-right-title">
							<?php $sub_header = get_post_meta( $post->ID, '_ck_secondary_header', 1 ); ?>
							<span class="title"><?php echo $sub_header; ?></span>
						</div>
						<div class="col-md-7 section-right-content">
							<?php 
								$image_3 = wp_get_attachment_image( get_post_meta( $post->ID, 'products_3_id', 1 ), 'full','',array('class'=>'img-responsive') );
							?>
							<div class="product-image-3">
								<?php echo $image_3; ?>
							</div>
							<div class="product-info">
								<?php $ingredients = get_post_meta( $post->ID, '_ck_ingredients', true ); ?>
								<?php $nutritional = get_post_meta( $post->ID, '_ck_nutritional', true ); ?>
								<?php if (!empty($ingredients) || !empty($nutritional)) : ?>
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<?php if (!empty($ingredients)) : ?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingIngre">
												   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseIngre" aria-expanded="true" aria-controls="collapseIngre">
												  		<h4 class="panel-title">Ingredients</h4>
												    </a>
												</div>
												<div id="collapseIngre" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingIngre">
												  <div class="panel-body">
												    <?php echo wpautop( $ingredients ); ?>
												  </div>
												</div>
											</div>
										<?php endif; ?>
										<?php if (!empty($ingredients)) : ?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="headingNut">
												    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNut" aria-expanded="false" aria-controls="collapseNut">
												      <h4 class="panel-title">Nutritional Information</h4>
												    </a>
												</div>
												<div id="collapseNut" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												  <div class="panel-body">
												    <?php echo wpautop( $nutritional ); ?>
												  </div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php

global $post; 

$query_args = array(
	'post_type' => 'page', 
	'posts_per_page' => -1,
	'post_parent' => $post->ID,
);

query_posts( $query_args );

?>

<section class="ingredients">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="child_row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="item item-content">
				  		<div class="title-block">
				  			<h3><?php the_title(); ?></h3>
				  		</div>
				  		<div class="content-block">
				  			<?php the_content(); ?>
				  		</div>
				  	</div>
				  	<?php $gallery = get_post_meta($post->ID,'ingredients_images',true); ?>
					<?php if(!empty($gallery)) :?>
						<?php foreach ($gallery as $key => $image) {

							$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
							$attachment = get_post($key); 
							?>
							<div class="item">
								<figure class="ingredient-image">
									<img alt="<? _e($attachment->post_title); ?>" src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
									<figcaption class="ingredient-caption">
										<span><? _e($attachment->post_title); ?></span>
									</figcaption>
								</figure>
							</div>

						<?php } ?>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		
	</div>	
</section> <?php // end #wrapper ?>


<div class="page-link products-pages">

  <?php global $post; ?>

  <?php
  $entries = get_post_meta( get_the_ID(), '_ck_page_links', true );

  foreach ( (array) $entries as $key => $entry ) {
    $img = $title = $desc = $caption = '';

    if ( isset( $entry['title'] ) )
        $title = esc_html( $entry['title'] );

    if ( isset( $entry['link'] ) )
        $link = esc_html( $entry['link'] );

    if ( isset( $entry['image_id'] ) ) {
        $img = wp_get_attachment_image_src( $entry['image_id'], 'full' );
    }

    ?>
    <div class="col-xs-12 link-box" style="background:url('<?php echo $img[0];?>');">
        <div class="row"> 
          <a href="<?php echo $link;?>" title="<?php echo $title; ?>">
            <?php echo $title; ?>
          </a> 
        </div>
    </div>

    <?php

      
      // Do something with the data
  }

  ?>

</div>

<?php get_footer(); ?>