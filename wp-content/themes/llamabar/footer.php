  <?php global $tpb_options; ?>
	<?php if (!(is_home() || is_front_page())) : ?>
		<div class="footer-tagline">
			<h2>BORN THROUGH ADVENTURE. MADE BY HAND. CHEWED BY ATHLETES.</h2>
		</div> 
	<?php endif; ?>
	<footer>

		<div id="footer-main"> 
		  <!-- footer section codes starts here-->
		  	<div class="container">
				<div class="row">
				  <div class="col-xs-12 col-sm-12 col-md-12 bottm-part">
					<div class="mountain-main">
						<div class="mountain-box">
							<div class="mountain"></div>
							<div class="flag one"></div>
							<div class="flag two"></div>
							<div class="flag three"></div>
						</div>
						<div class="dont-miss">
							<a href="#" data-toggle="modal" data-target="#newsletterModal" title="SIGN UP">SIGN UP <span>AND</span> 
							<p><i class="fa fa-envelope-o"></i> DON’T MISS OUT</p></a>
						</div>
					</div>
				  </div>
				</div>
		  	</div>
		</div>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve"><style>.style0{fill:	#fff;}</style><polygon points="77.6,21.1 49.6,49.2 21.5,21.1 19.6,23 47.6,51.1 19.6,79.2 21.5,81.1 49.6,53 77.6,81.1 79.6,79.2 51.5,51.1 79.6,23" class="style0"/></svg></span></button>
          <h4 class="modal-title" id="myModalLabel">Subscribe to our Newsletter</h4>
        </div>
        <div class="modal-body">
        	<?php gravity_form( 'Newsletter', false, true, false, '', true ); ?>
        </div>
      </div>
    </div>
  </div>

	<!-- all js scripts are loaded in library/bones.php -->
	<?php wp_footer(); ?>
  </body>
	<!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
