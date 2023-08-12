<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package top-car-delivery
 */

?>
<?php if(is_page('calculated-costs')){
	echo get_template_part('paypal/script');
}?>
	<footer id="colophon" class="site-footer">
		<div class="footer-links">
			<div class="footer-service-menu">
				<h5 class="text-uppercase color-white-50-opacity">
					Services
				</h5>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-service-menu',
						'menu_id'        => 'footer-service-menu',
					)
				);
				?>
			</div>
			<div class="footer-company-menu">
				<h5 class="text-uppercase color-white-50-opacity">
					Company
				</h5>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-company-menu',
						'menu_id'        => 'footer-company-menu',
					)
				);
				?>
			</div>
			<div class="footer-more-menu">
				<h5 class="text-uppercase color-white-50-opacity">
					More
				</h5>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-more-menu',
						'menu_id'        => 'footer-more-menu',
					)
				);
				?>
				<span>Social:</span>	
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
			<div class="site-info">

				<?php
				$secondary_logo = get_theme_mod( 'secondary_logo' );

				if ( ! empty( $secondary_logo ) ) {
					echo '<img class="footer-logo" src="' . esc_url( $secondary_logo ) . '" alt="Logo">';
				}
				?>
				<span>
					400 Route 34 STE G </br>
					Matawan, NJ 07747
				</span>
				<span class="color-white-50-opacity">Phone: <a href="tel:8889888865">(888) 988-8865</a></span>
				<span class="color-white-50-opacity">Fax: <a href="fax:9086667665">(908) 666-7665</a></span>
				<span class="color-white-50-opacity">Email: <a class="text-underline" href="mailto:info@topcardelivery.com">info@topcardelivery.com</a></span>

			</div><!-- .site-info -->
		</div>
		<div class="terms-and-copyright-container">
			<div class="terms-policy-block">
				<a href="">Terms & Conditions</a><span class="sep color-white-50-opacity"> | </span><a href="">Privacy Policy</a>
			</div>
			<span class="copyright-block">Copyright © <?php echo date("Y") ?> Top Car Delivery</span>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
