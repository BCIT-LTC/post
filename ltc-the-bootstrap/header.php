<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0 - 05.02.2012
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<?php tha_head_top(); ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<title><?php wp_title( '&laquo;', true, 'right' ); ?></title>
		
		<?php tha_head_bottom(); ?>
		<?php wp_head(); ?>
	</head>
	
	<body <?php body_class(); ?>>
		<div class="container">
			<div id="page" class="hfeed row">
				<?php tha_header_before(); ?>

<header id="branding" role="banner" class="span12">
					<?php tha_header_top();
					wp_nav_menu( array(
						'container'			=>	'nav',
						'container_class'	=>	'subnav clearfix',
						'theme_location'	=>	'header-menu',
						'menu_class'		=>	'nav nav-pills pull-right',
						'depth'				=>	3,
						'fallback_cb'		=>	false,
						'walker'			=>	new The_Bootstrap_Nav_Walker,
					) ); ?>

<div id="logo-bar"> <!-- repeated bg -->
        <h1 id="logo" class="shift">
		<a class="nav_bcit" href="http://www.bcit.ca/">
			<abbr title="British Columbia Institute of Technology">BCIT</abbr>
		</a>
	</h1>

	<nav id="nav_site" role="navigation">
                <ul>
                        <li class="nav_home">
				<a href="https://post.bcit.ca/" class="underline">home</a>
			</li>
                        <li class="common"><a href="http://www.bcit.ca/mybcit/login/" class="underline">myBCIT</a></li>
                        <li class="common"><a href="http://www.bcit.ca/about/locations.shtml" class="underline">Campuses</a></li>
                        <li class="common"><a href="http://www.bcit.ca/contacts/" class="underline">Contacts</a></li>
                        <li class="common"><a href="http://www.bcit.ca/calendar/" class="underline">Calendar</a></li>
                        <li id="nav_shortcuts" class="common">
				<a href="http://www.bcit.ca/a2z/" class="underline" title="Short cuts.">Short Cuts</a>
			</li>
                </ul>
	</nav>

<form method="get" id="searchform" class="form-search" action="https://post.bcit.ca/service-bulletin/" style="float:right;position:relative;top:18px;right: 20px;">
	<label for="s" class="assistive-text hidden">Search</label>
	<div class="input-append">
		<input id="s" class="span2 search-query" type="search" name="s" placeholder="Search">
		<button class="btn btn-primary" name="submit" id="searchsubmit" type="submit">Go</button>
   	</div>
</form>
</div>
<div id="title-bar">
<div id="site-splash"></div>
	<h1 id="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="underline" rel="home">
			<span>Technology Service Bulletin</span></a>
	</h1>

</div>


					<nav id="access" role="navigation">
						<h3 class="assistive-text"><?php _e( 'Main menu', 'the-bootstrap' ); ?></h3>
						<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'the-bootstrap' ); ?>"><?php _e( 'Skip to primary content', 'the-bootstrap' ); ?></a></div>
						<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'the-bootstrap' ); ?>"><?php _e( 'Skip to secondary content', 'the-bootstrap' ); ?></a></div>
						<?php if ( has_nav_menu( 'primary' ) OR the_bootstrap_options()->navbar_site_name OR the_bootstrap_options()->navbar_searchform ) : ?>
						<div <?php the_bootstrap_navbar_class(); ?>>
							<div class="navbar-inner">
								<div class="container">
									<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
									<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</a>
									<?php if ( the_bootstrap_options()->navbar_site_name ) : ?>
									<span class="brand"><?php bloginfo( 'name' ); ?></span>
									<?php endif;?>
									<div class="nav-collapse">
										<?php wp_nav_menu( array(
											'theme_location'	=>	'primary',
											'menu_class'		=>	'nav',
											'depth'				=>	3,
											'fallback_cb'		=>	false,
											'walker'			=>	new The_Bootstrap_Nav_Walker,
										) ); 
										if ( the_bootstrap_options()->navbar_searchform ) {
											the_bootstrap_navbar_searchform();
										} ?>
								    </div>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</nav><!-- #access -->
					<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<nav id="breadcrumb" class="breadcrumb">', '</nav>' );
					}
					tha_header_bottom(); ?>
				</header><!-- #branding --><?php
				tha_header_after();
				

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
