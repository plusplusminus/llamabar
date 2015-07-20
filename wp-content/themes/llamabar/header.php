<!doctype html>
<?php global $tpb_options; ?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<?php global $tpb_options; ?>
		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> 
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
		<![endif]-->

		

	</head>

	<body <?php body_class(); ?>>
		<div class="wrapper"> 
		<!--header section starts-->
		<header>
			<div id="header-main">
				<div class="header-top">
					<div class="container">
			  			<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
				  				<div class="social-media">
									<ul>
										<li><a class="foot_item--social" href="<?php echo $tpb_options['twitter_url'];?>"><i class="fa fa-twitter"></i></a> </li>
										<li><a class="foot_item--social" href="<?php echo $tpb_options['facebook_url'];?>"><i class="fa fa-facebook"></i></a> </li>
										<li><a class="foot_item--social" href="<?php echo $tpb_options['instagram_url'];?>"><i class="fa fa-instagram"></i></a> </li>
									</ul>

				  				</div>
							</div>
			  			</div>
					</div>
				</div>
			
				<div class="header-bottom ">
					<div class="container">
			  			<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 clearfix">
								<?php if ( ( '' != $tpb_options['site_logo']['url'] ) ) {
									$logo_url = $tpb_options['site_logo']['url'];
									$sticky_url = $tpb_options['sticky_logo']['url'];
									$site_url = get_bloginfo('url');
									$site_name = get_bloginfo('name');
									$site_description = get_bloginfo('description');
									if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
									echo '<a class="mainlogo" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="img-responsive" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
									echo '<a class="logo-sticky" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="img-responsive" src="'.$sticky_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
								} // End IF Statement */
								?> 
								
								<div class="mainnavigation">
									<?php secondary_nav('main-nav','enumenu_ul clearfix'); ?>
									<?php $site_description = get_bloginfo('description'); ?>
									<p><?php echo $site_description; ?></p>
								</div>
								<div class="social-media fixed-header">
									<ul>
										<li><a title="Twitter" target="_blank" href="<?php echo $tpb_options['twitter_url'];?>"><i class="fa fa-twitter"></i></a> </li>
										<li><a title="Facebook" target="_blank" href="<?php echo $tpb_options['facebook_url'];?>"><i class="fa fa-facebook"></i></a> </li>
										<li><a title="Instagram" target="_blank" href="<?php echo $tpb_options['instagram_url'];?>"><i class="fa fa-instagram"></i></a> </li>
									</ul>
								</div>
							</div>
			  			</div>
					</div>
				</div>
			<!-- header section coding ends here--> 
			</div>
		</header>
		<div class="dummy-height"></div>


