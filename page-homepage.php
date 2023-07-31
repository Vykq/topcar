<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package top-car-delivery
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="hero">
		<div class="hero-bg-image"
			style="background:linear-gradient(transparent 85%, var(--main-bg-color) 100%), url(<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/cf209b420c01d0951ab8b845b30fadc2.png) 11% 50%/cover no-repeat">
		</div>
		<div>
			<div class="hero-top">
				<div class="hero-top-header">
				<h1>High-Quality Car Transport Services You Can Trust</h1>
				<h2>Fast and Reliable Car Shipping with Top Car Delivery.</h2>
				</div>
				<?php get_template_part('template-parts/calculator-form'); ?>
			</div>
			<h1 class="reviews-h1">Customer Satisfaction is </br>Our Top Priority</h1>
			<?php get_template_part('template-parts/review-carousel'); ?>
		</div>
	
	</section>
	<section class="how-works">
		<div class="container">
			<div>
				<h1 >How Does Car Transport Work?</h1>
				<h3>How to book your delivery</h3>
				<p>At Top Car Delivery, we understand that your car is your pride and joy. That's why we've made the auto transport process as easy as possible.</p>
				<button class="primary-btn big-btn text-uppercase desktop-btn">
					quote to ship a car
				</button>
			</div>
			<div>
				<hr>
				<div class="info-block">
					<div class="faq-head">
						<div class="img-block">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_1.svg" alt="">
						</div>
						<p>Use our quote calculator or call to book your order</p>
					</div>
				</div>
				<hr>
				<div class="info-block">
					<div class="faq-head">
						<div class="img-block">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_2.svg" alt="">
					</div>
					<p>Our driver will call you and pick up your vehicle</p>
					</div>
				</div>
				<hr>
				<div class="info-block">
					<div class="faq-head">
						<div class="img-block">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_3.svg" alt="">
					</div>
					<p>Reliable & fast delivery done - your vehicle awaits you</p>
					</div>
				</div>
				<hr>
				<button class="primary-btn big-btn w-100 text-uppercase mobile-btn">
					quote to ship a car
				</button>
			</div>
		</div>
		<div class="bb-image"
			style="background: url(<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/ornament-elements.png) 100% 0%/300% no-repeat">
		</div>
	</section>
	<section class="why-us">
		<div class="container">
			<h1 class="mb-60">Why Should You Choose Top Car Delivery for Your Auto Transport?</h1>
			<div class="posts">
				<div>
					<div class="img-frame">
						<div class="bg-block bg-block-top bg-color-bluegray"></div>
						<div class="bg-block bg-block-left bg-color-bluegray"></div>
						<div class="bg-block bg-block-right bg-color-bluegray"></div>
						<div class="bg-block bg-block-bottom bg-color-bluegray"></div>
						<img src="<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/1-img.png" alt="">
					</div>
					<h3 class="white-text-color text-uppercase mt-40">Premier Auto Shipping</h3>
					<hr>
					<p class="white-text-color">We make auto transport effortless for our customers. Our team of experts handles every detail, from pickup to delivery, to ensure that your car arrives safely and ...</p>
					<a href="">Read more</a>
				</div>
				<div>
					<div class="img-frame">
						<div class="bg-block bg-block-top bg-color-bluegray"></div>
						<div class="bg-block bg-block-left bg-color-bluegray"></div>
						<div class="bg-block bg-block-right bg-color-bluegray"></div>
						<div class="bg-block bg-block-bottom bg-color-bluegray"></div>
						<img src="<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/1-img-1.png" alt="">
					</div>
					<h3 class="white-text-color text-uppercase mt-40">Car Shipping Security</h3>
					<hr>
					<p class="white-text-color">At Top Car Delivery, we understand how important it is to protect your car during transport. That's why we only work with auto transport companies that include ...</p>
					<a href="">Read more</a>
				</div>
				<div>
					<div class="img-frame">
						<div class="bg-block bg-block-top bg-color-bluegray"></div>
						<div class="bg-block bg-block-left bg-color-bluegray"></div>
						<div class="bg-block bg-block-right bg-color-bluegray"></div>
						<div class="bg-block bg-block-bottom bg-color-bluegray"></div>
						<img src="<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/1-img-2.png" alt="">
					</div>
					<h3 class="white-text-color text-uppercase mt-40">$0 Due at Pickup</h3>
					<hr>
					<p class="white-text-color">No upfront payment required when you book our auto transport services. We only bill you once the carrier has been dispatched for your car shipping order ...</p>
					<a href="">Read more</a>
				</div>
			</div>
			<a class="secondary-btn big-btn text-uppercase white-text-color w-100 mt-60 mobile-btn" href="">See more</a>
			<div class="xp-wrapper">
				<h1 class="mt-100">Reliable Auto Transport Services with a Personal Touch</h1>
				<p class="white-text-color">At Top Car Delivery, we are committed to delivering exceptional service and taking care of your car transport needs with the utmost ...</p>
				<a class="read-more-btn white-text-color" href="">Read more</a>
				<div class="xp-blocks mt-40">
					<div>
						<h1>50,000+</h1>
						<hr>
						<span>Satisfied customers</span>
					</div>
					<div>
						<h1>20 YR</h1>
						<hr>
						<span>Experience</span>
					</div>
				</div>
			</div>
		</div>
		<div class="truck-visual-image"
			style="background: url(<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/truck-visual.png) 100% 0%/125% no-repeat">
		</div>
	</section>
	<section class="cost">
		<div class="container">
			<div class="info-header-wrapper">
				<h1>How Much Does It Cost to Ship a Car?</h1>
				<p>We understand that the cost of auto transport is an important consideration for our customers. The total price you pay for car transport services depends on several factors, including the type of vehicle ...</p>
				<a class="read-more-btn mobile-btn" href="">Read more</a>
				<a class="secondary-btn big-btn black-border text-uppercase mt-60 desktop-btn" href="">more about your price</a>
			</div>
			<div class="info-block-wrapper">
			<hr>
				<div class="info-block">
					<div class="faq-head faq-expandable-mobile">
						<div class="img-block">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_4.svg" alt="">
						</div>
						<div class="faq-wrapper">
							<div>
								<p>Vehicle dimensions and weight</p>
								<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
								<label for="menu_arrow"></label>
							</div>
							<div class="faq-text">
								<p>Carriers may need to make special arrangements for vehicles that are larger, taller, or heavier than average. This can impact the cost of shipping your car, as additional accommodations may be required.</p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="info-block">
					<div class="faq-head faq-expandable-mobile">
						<div class="img-block">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_5.svg" alt="">
						</div>
						<div class="faq-wrapper">
							<div>
								<p>Vehicle condition & operability</p>
								<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
								<label for="menu_arrow"></label>
							</div>
							<div class="faq-text">
								<p>Shipping non-running cars costs more as car transport companies need additional tools and labor to accommodate the cargo. However, if your vehicle can roll, steer, and brake, we can still provide transport services for it.</p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="info-block">
					<div class="faq-head faq-expandable-mobile">
						<div class="img-block">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_6.svg" alt="">
						</div>
						<div class="faq-wrapper">
							<div>
								<p>Transport type and protection level</p>
								<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
								<label for="menu_arrow"></label>
							</div>
							<div class="faq-text">
								<p>Open transport is the more economical and common choice, while enclosed transport may require specialized handling and thus the price may vary.</p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="info-block">
					<div class="faq-head faq-expandable-mobile">
						<div class="img-block">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/icons/icon_7.svg" alt="">
						</div>
						<div class="faq-wrapper">
							<div>
								<p>Car shipment distance</p>
								<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
								<label for="menu_arrow"></label>
							</div>
							<div class="faq-text">
								<p>Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<a class="secondary-btn big-btn black-border text-uppercase w-100 mt-60 mobile-btn" href="">more about your price</a>
			</div>
		</div>
		<div class="bb-image flip-v"
			style="background: url(<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/ornament-elements.png) 67% 100%/300% no-repeat">
		</div>
	</section>
	<section class="faq-section">
		<div class="container">
			<div>
				<div>
					<h1>Frequently asked questions</h1>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How does auto transport work?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text faq-expandable">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How much does it cost to ship a car?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How long does it take to ship a car?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
				</div>
				<div class="img-frame">
					<div class="bg-block bg-block-top "></div>
					<div class="bg-block bg-block-left "></div>
					<div class="bg-block bg-block-right "></div>
					<div class="bg-block bg-block-bottom "></div>
					<img src="<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/1-img-3.png" alt="">
				</div>
			</div>
			<div>
				<div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How does auto transport work?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How much does it cost to ship a car?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>How long does it take to ship a car?</p>
							<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" />
							<label for="menu_arrow"></label>
						</div>
						<div class="faq-text">
							<p class="white-text-color">Greater distances result in a higher total cost for shipping, but the cost per mile is lower. By choosing our auto transport services, the more miles your vehicle travels, the more you save on transportation costs.</p>
						</div>
					</div>
					<hr>
					<div class="info-block">
						<div class="faq-head faq-expandable">
							<p>Can’t find the answers you’re looking for?</p>
						</div>
					</div>
					<p class="white-text-color">Our team is on hand from Monday to Friday, 9am - 5pm, to answer any questions. Give us a call on <span class="blue-text-color font-w-700 no-wrap">(888) 988-8865</span> or <span class="blue-text-color font-w-700">email us.</span></p>
				</div>
				<div class="img-frame">
					<div class="bg-block bg-block-top "></div>
					<div class="bg-block bg-block-left "></div>
					<div class="bg-block bg-block-right "></div>
					<div class="bg-block bg-block-bottom "></div>
					<img src="<?php echo wp_upload_dir()['baseurl']; ?>/2023/06/1-img-4.png" alt="">
				</div>
			</div>
		</div>
	</section>
	<section class="blog-list">
		<div class="container">
			<h1>Latest stories for you</h1>
			<div class="articles-list">
			<?php
			   // the query
			   $the_query = new WP_Query( array(
				 'posts_per_page' => 3,
			  )); 

				if ( $the_query->have_posts() ) :

					/* Start the Loop */
					while ( $the_query->have_posts() ) :
						$the_query->the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
			<a class="secondary-btn big-btn white-text-color text-uppercase w-100 mt-60 " href="">SEE ALL blog posts</a>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();