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

					<div class="contact-form-section__form content-wrapper">

						<div class="column--half">
							<label class="contact-form-section__form-label-firstname">Vorname<sup>*</sup>
							<input type="text" name="firstname" class="contact-form-section__form-item contact-form-section__form-item-firstname" value="" aria-required="true" aria-invalid="false" placeholder="Ihr Vorname">
							</label>
						</div>

						<div class="column--half">
							<label class="contact-form-section__form-label-lastname">Nachname<sup>*</sup>
							<input type="text" name="lastname" class="contact-form-section__form-item contact-form-section__form-item-lastname" value="" aria-required="true" aria-invalid="false" placeholder="Ihr Nachname">
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-email">E-Mail-Adresse<sup>*</sup>
							<input type="email" name="email" class="contact-form-section__form-item contact-form-section__form-item-email" value="" aria-required="true" aria-invalid="false" placeholder="Ihre E-Mail-Adresse*">
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-phone">Telefonnummer<sup>*</sup>
							<input type="phone" name="phone" class="contact-form-section__form-item contact-form-section__form-item-phone" value="" aria-required="true" aria-invalid="false" placeholder="Ihre Telefonnummer*">
							</label>
						</div>

						<div class="column--half">
							<label class="contact-form-section__form-label-zip">Postleitzahl<sup>*</sup>
							<input type="text" name="zip" class="contact-form-section__form-item contact-form-section__form-item-zip" value="" aria-required="true" aria-invalid="false" placeholder="Postleitzahl des Grundstücks">
							</label>
						</div>

						<div class="column--half">
							<label class="contact-form-section__form-label-city">Ort<sup>*</sup>
							<input type="text" name="city" class="contact-form-section__form-item contact-form-section__form-item-city" value="" aria-required="true" aria-invalid="false" placeholder="Ort des Grundstücks">
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-street">Adresse<sup>*</sup>
							<input type="text" name="street" class="contact-form-section__form-item contact-form-section__form-item-street" value="" aria-required="true" aria-invalid="false" placeholder="Adresse des Grundstücks">
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-property">Ich biete<sup>*</sup>
							[checkbox* property use_label_element class:contact-form-section__form-item-property "Grundstück 500m" "Grundstück 750m" "Grundstück 1000m" ]
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-message">Ihre Nachricht
							<input type="textarea" name="message" class="contact-form-section__form-item contact-form-section__form-item-message" value="" aria-required="true" aria-invalid="false" placeholder="Hier ist Platz für Ihre Nachricht">
							</label>
						</div>

						<div class="column--full">
							<label class="contact-form-section__form-label-dsgvo-acceptance">
							<input type="checkbox" name="ihre-datenschutzzustimmung" class="contact-form-section__form-item-dsgvo-checkbox" value="1" aria-required="true" aria-invalid="false" data-rule="name"><span class="contact-form-section__form-item-dsgvo-acceptance">Ich habe die <a href="/datenschutz" target="_blank">Datenschutzerklärung</a> zur Kenntnis genommen und akzeptiere diese hiermit ausdrücklich. Weiters stimme ich zu, dass meine Formularangaben zur Kontaktaufnahme bzw. zur Bearbeitung meines Anliegens verwendet werden.</span>
							</label>
						</div>

						<div class="column--full">
							<a class="btn btn--blue contact-form-section__btn open-modal" href="#">Formular absenden</a>
						</div>

					</div>

					</div>
				</article>
			</section>

		</div>
	</main>

<?php get_footer(); ?>