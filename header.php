<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package top-car-delivery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php if(is_page('calculated-costs')){ ?>
		<script src="https://js.braintreegateway.com/web/3.96.1/js/client.min.js"></script>
		<script src="https://js.braintreegateway.com/web/3.96.1/js/paypal-checkout.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.96.1/js/hosted-fields.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<?php } ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'top-car-delivery' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-align">
		<div class="site-branding margin-x-10">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home">
			<?php
				$primary_logo = get_theme_mod( 'primary_logo' );
				$custom_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
				echo '<img src="' . esc_url($primary_logo) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" class="custom-logo desktop-logo">';
			?>
			<?php
				echo '<img src="' . esc_url($custom_logo[0]) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" class="custom-logo mobile-logo">';
			?>
			</a>
		</div><!-- .site-branding -->
		<button class="primary-btn margin-x-10">CALL US</button>
		<div class="menu-icon" aria-controls="primary-menu" aria-expanded="false">
			<input class="menu-icon__cheeckbox" type="checkbox" />
			<div>
				<span></span>
				<span></span>
			</div>
		</div>

		</div>		
		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
			<div class="menu-align">
				<button class="primary-btn big-btn text-uppercase">quote to ship a car</button>
				<a class="secondary-btn big-btn" href="tel:8889888865">Call us: (888) 988-8865</a>
				<div class="socials-block">
					<a href="">
						<i class="icon-fb"></i>
					</a>
					<a href="">
						<i class="icon-yt"></i>
					</a>					
					<a href="">
						<i class="icon-ig"></i>
					</a>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
