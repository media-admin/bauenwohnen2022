	<footer class="site-footer">

		<section class="site-footer__contact">
			<div class="site-footer__logo-img-container">
				<img class="site-footer__logo-img lazyload" src="<?php bloginfo( 'template_directory' ); ?>/assets/images/logos/logo_buw-3-lines_lightgray.svg" alt="Logo: Bauen & Wohnen Wohnbau GmbH">
			</div>
			<div class="site-footer__contact-container">
				<?php
					$args = array(
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'post_type' => 'company-details',
					);
					$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<p class="site-footer__contact-data">
								<strong><?php the_field('company-name')?></strong><br>
								<?php the_field('company-address')?><br>
								<a class="site-footer__contact-data-phone" href="tel:<?php the_field('company-phonenumber')?>"><?php the_field('company-phonenumber')?></a>
								<a class="site-footer__contact-data-mail" href="mailto:<?php the_field('company-email')?>"><?php the_field('company-email')?></a>
								<?php the_field('company-opening-hours')?>
							</p>
					<?php
					endwhile;
					?>
				</div>
		</section>

		<section class="site-footer__bottom-line">
			<nav class="site-footer__navigation">
				<ul class="site-footer__navigation-list">
					<?php
						wp_nav_menu(array(
							'walker' => new Footer_Walker(),
							'menu' => 'Footermenü',
							'theme_location'=> 'nav-menu-footer',
							'container'=> '<ul>',
							'menu_class' => 'footer-navigation__list',
							'items_wrap'=> '%3$s',
							'fallback_cb'=> false
						));
					?>
				</ul>
			</nav>

			<p class="site-footer__copyright">©&nbsp;2022 by Bauen & Wohnen Wohnbau GmbH. Alle Rechte vorbehalten.</p>

		</section>

	</footer>

	<?php wp_footer();?>

	<!-- START SCRIPTS AREA -->

	<!-- Hamburger Menu Toggle -->
	<script type="text/javascript">
		var navigation = document.querySelector(".main-navigation");
		var hamburger = document.querySelector(".burger-menu");

	 	navigation.onclick = function () {
			this.classList.toggle ("is-active");
		}

		hamburger.onclick = function () {
			this.classList.toggle ("checked");
		}
	</script>


	<!-- Accordion -->
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			acc[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var panel = this.nextElementSibling;
				if (panel.style.maxHeight) {
					panel.style.maxHeight = null;
				} else {
					panel.style.maxHeight = panel.scrollHeight + "px";
				}
			});
		}
	</script>

	<!-- === SLICK SLIDERS === -->

	<!-- Slick Sliders -->
	<script type="text/javascript">

		jQuery('.home-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 1500,
			fade: true,
			cssEase: 'linear'
		});

	</script>



	<script type="text/javascript">

		jQuery('.single-item').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			dots: true,
		});

	</script>


	<script type="text/javascript">

		jQuery('.project-carousel__projects-container').slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 800,
			slidesToShow: 4,
			slidesToScroll: 1,
			arrows: false,

			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						arrows: false,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false,
						centerMode: true,
						centerPadding: '40px',
					}
				}
			]
		});

	</script>


	<!-- Projects -->
	<script type="text/javascript">

		/* ---- for-filter-menu -----------------------------------------------*/
		jQuery(document).on('click','.projects-overview__project-filters li',function(){
			jQuery(this).addClass('projects-overview__project-filter--active').siblings().removeClass('projects-overview__project-filter--active')
		});

		/* ---- for-project/work-filter -----------------------------------------------*/
		jQuery(document).ready(function(){
			jQuery('.projects-overview__list').click(function(){
				const value = jQuery(this).attr('data-filter');
				if(value == 'alle'){
					jQuery('.projects-overview__project-box').show('1000');
				}
				else {
					jQuery('.projects-overview__project-box').not('.'+value).hide('1000');
					jQuery('.projects-overview__project-box').filter('.'+value).show('1000');
				}
			})
		});

	</script>

	<!-- END SCRIPTS AREA -->

	</body>

</html>