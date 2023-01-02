<?php
/**
* Template Name: Seite Haustype
* Template Post Type: housetype
* Template Description: Vorlage für Haustype
*/

get_header(); ?>

<main class="site-main">
	<div class="site-content">

		<section class="site-intro">
			<article class="wrapper">
				<h1 class="site-title h1__title"><?php the_title();?></h1>
				<div class="single-housetype__content-container content-container">
					<div class="single-housetype__content-columns fullwidth-wrapper overview-sizes">
						<div class="single-housetype__content-column--left">
							<div class="single-housetype__content-column-thumbnail">
								<?php if ( has_post_thumbnail() ) : ?>
									<a class="" href="<?php the_post_thumbnail_url($size = 'full'); ?>" data-featherlight="image"><img class="single-housetype__content-column-thumbnail-img" src="<?php the_post_thumbnail(); ?></a>
								<?php endif; ?>
							</div>
							<div class="single-housetype__content-column-gallery">
								<?php
									global $post;
									$content = apply_filters('the_content',$post->post_content);
									echo $content;
								?>
							</div>
						</div>

						<div class="single-housetype__content-column--right">
							<div class="single-housetype__content-descripion">
								<?php the_field('housetype_description', $post->ID); ?>
							</div>
							<div class="single-housetype__content-price">
								<strong><?php the_field('housetype_price_info', $post->ID); ?>: <?php the_field('housetype_price', $post->ID); ?></strong>
							</div>
						</div>

					</div>

					<?php
						$image_location_map = get_field('housetype_location_map');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
					?>

					<?php if( $image_location_map ): ?>
						<div class="single-housetype__location-map fullwidth-wrapper fullwidth">
							<a href="<?php echo esc_url($image_location_map['sizes']['large']); ?>" data-lightbox="Pläne"><img class="single-housetype__location-map-img" src="<?php echo esc_url($image_location_map['sizes']['large']); ?>" alt="<?php echo esc_attr($image_location_map['alt']); ?> " /></a>
						</div>
					<?php endif; ?>

					<?php echo do_shortcode("[contact-form-7 id='677' title='Giardino-Kontaktformular']"); ?>

				</div>

			</article>
		</section>

	</div>
</main>

<?php get_footer(); ?>