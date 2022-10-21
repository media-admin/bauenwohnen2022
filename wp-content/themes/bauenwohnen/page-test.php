<?php
/**
* Template Name: Seite Test
*/

get_header( '' );
?>

	<main class="site-main">
		<div class="site-content">

			<section class="site-intro">
				<article class="wrapper">
					<h1 class="site-title h1__title"><?php the_title();?></h1>
					<div class="single-project__content-container">
					<?php
						global $post;
						$content = apply_filters('the_content',$post->post_content);
						echo $content;
					?>
					</div>
					<?php echo do_shortcode("[shortcode_projects_overview]"); ?>
				</article>
			</section>

			<?php echo do_shortcode("[shortcode_faqs]"); ?>

			<img class="img--fullwidth lazyload" src="<?php bloginfo( 'template_directory' ); ?>/assets/images/tischlerei/projekte/cut-for-webhighres-23-DSC03459_web.jpg" alt="Platzhalter-Bild">

			<?php echo do_shortcode("[shortcode_recall]"); ?>

		</div>
	</main>

<?php get_footer(); ?>