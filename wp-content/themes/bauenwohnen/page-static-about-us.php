<?php
/**
* Template Name: ÜBER UNS STATISCH
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

	</div>
</main>

<?php get_footer(); ?>