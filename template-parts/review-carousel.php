<section class="splide" aria-labelledby="carousel-heading">
		<div class="splide__track">
				<ul class="splide__list">
					<li class="splide__slide">
						<div class="review-block">
							<div class="review-block-top">
								<span class="review-name">John D.</span>
								<div class="stars">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
								</div>
								<span class="review-score">5.0</span>
							</div>
							<p>Top Car Delivery was excellent from start to finish. They picked up my car on time and delivered it to my new home in perfect condition. The driver was friendly and professional, and I was able to track my car throughout the entire process. I highly recommend Top Car Delivery for anyone who needs to transport their car across the country.</p>
							<span class="review-date">October 27, 2023</span>
						</div>
					</li>
					<li class="splide__slide">						
						<div class="review-block">
							<div class="review-block-top">
								<span class="review-name">John D.</span>
								<div class="stars">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
								</div>
								<span class="review-score">5.0</span>
							</div>
							<p>Top Car Delivery provided me with excellent service when I needed to transport my car across the country. They were responsive and reliable, and the entire process was stress-free. I would highly recommend them to anyone who needs to transport their car.</p>
							<span class="review-date">October 27, 2023</span>
						</div>
					</li>
					<li class="splide__slide">						
						<div class="review-block">
							<div class="review-block-top">
								<span class="review-name">John D.</span>
								<div class="stars">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
								</div>
								<span class="review-score">5.0</span>
							</div>
							<p>Top Car Delivery was excellent from start to finish. They picked up my car on time and delivered it to my new home in perfect condition. The driver was friendly and professional, and I was able to track my car throughout the entire process. I highly recommend Top Car Delivery for anyone who needs to transport their car across the country.</p>
							<span class="review-date">October 27, 2023</span>
						</div>
					</li>
				</ul>
		</div>
		<div class="splide__arrows">
			<button class="splide__arrow splide__arrow--prev">
				<i class="icon-review-btn"></i>
			</button>
			<button class="splide__arrow splide__arrow--next">
				<i class="icon-review-btn flip-h"></i>
			</button>
  		</div>
		</section>
<script>
  document.addEventListener( 'DOMContentLoaded', function() {
    var splide = new Splide( '.splide', {
		perPage  : 2,
		focus    : 'center',
		trimSpace: true,
		padding: { right: '16%', bottom: '20%' },
		gap: 30,
		arrows: true,
		pagination: false,
		breakpoints: {
            767: {
              	perPage: 1,
				gap: 20,
				arrows: false,
				pagination: true,
            }
		}
	});
    splide.mount();
  } );
</script>