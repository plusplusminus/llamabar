<section>
	<div id="mid-container">
		<div class="container">
			<div class="row row-home"> 
		  		<!-- mid section codes here-->
					<div class="col-md-6 col-sm-6 col-xs-12 col-sm-offset-3">
						<div class="row">
							
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
	</div>
</section>