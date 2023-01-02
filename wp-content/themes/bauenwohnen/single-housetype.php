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
					<div class="single-housetype__content-columns overview-sizes">
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
						$image_plan_floor1 = get_field('housetype_plan_floor1');
						$image_plan_floor2 = get_field('housetype_plan_floor2');
						$image_plan_basement = get_field('housetype_plan_basement');
						$image_plan_floor1_url = $image_plan_floor1['url'];
						$image_plan_floor2_url = $image_plan_floor2['url'];
						$image_plan_basement_url = $image_plan_basement['url'];
						$size = 'large'; // (thumbnail, medium, large, full or custom size)
					?>

					<div class="single-housetype__plan-container fullwidth content-container--blue" data-featherlight-gallery>
						<div class="single-housetype__plan-floor1">
							<?php if( $image_plan_floor1_url ): ?>
								<a class="single-housetype__plan-floor1-link" href="<?php echo esc_url($image_plan_floor1_url); ?>" data-featherlight-rel="lightbox[Plan]" data-featherlight-gallery="lightbox-gallery-plans" data-featherlight="image" >
									<img class="single-housetype__plan-floor1-img" src="<?php echo esc_url($image_plan_floor1['sizes']['large']); ?>" alt="<?php echo esc_attr($image_plan_floor1['alt']); ?>" />
								</a>
							<?php endif; ?>
						</div>
						<div class="single-housetype__plan-floor2">
							<?php if( $image_plan_floor2_url ): ?>
								<a class="single-housetype__plan-floor2-link" href="<?php echo esc_url($image_plan_floor2_url); ?>" rel="lightbox[Plan]" data-featherlight-gallery="lightbox-gallery-plans" data-featherlight="image" >
									<img class="single-housetype__plan-floor2-img" src="<?php echo esc_url($image_plan_floor2['sizes']['large']); ?>" alt="<?php echo esc_attr($image_plan_floor2['alt']); ?>" />
								</a>
							<?php endif; ?>
						</div>
						<div class="single-housetype__plan-basement">
							<?php if( $image_plan_basement_url ): ?>
								<a class="single-housetype__plan-basement-link" href="<?php echo esc_url($image_plan_basement_url); ?>" rel="lightbox[Plan]" data-featherlight-gallery="lightbox-gallery-plans" data-featherlight="image" >
									<img class="single-housetype__plan-basement-img" src="<?php echo esc_url($image_plan_basement['sizes']['large']); ?>" alt="<?php echo esc_attr($image_plan_basement['alt']); ?>" />
								</a>
							<?php endif; ?>
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

	<?php
			//Get the images ids from the post_metadata
			$images = acf_photo_gallery('housetype_plans', $post->ID);
			//Check if return array has anything in it
			if( count($images) ): ?>
				<div class="single-housetype__plan-container fullwidth-wrapper content-container--blue" data-featherlight-gallery >
					<?php foreach($images as $image):
						$id = $image['id']; // The attachment id of the media
						$title = $image['title']; //The title
						$caption= $image['caption']; //The caption
						$full_image_url= $image['full_image_url']; //Full size image url
						// $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
						$thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
						$url= $image['url']; //Goto any link when clicked
						$target= $image['target']; //Open normal or new tab
						$alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
						$class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
						?>

						<div class="single-housetype__plan">
							<?php if( !empty($url) ){ ?>
								<li><a href="<?php echo $url; ?> data-featherlight='image' tabindex='-1' " ><?php } ?>
									<img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" >
							<?php if( !empty($url) ){ ?>
								</a></li>
								<?php } ?>
						</div>
						<?php endforeach; endif; ?>
				</div>








					<?php echo do_shortcode("[contact-form-7 id='538' title='Giardino-Kontaktformular']"); ?>

				</div>

			</article>
		</section>

	</div>
</main>

<?php get_footer(); ?>