<?php $component = \ColibriWP\Theme\View::getData( 'component' ); ?>
<div class="wp-block wp-block-kubio-hero position-relative wp-block-kubio-hero__outer pathway-front-header__k__J6FPNZyUrn-outer pathway-local-lEgv7azZau-outer d-flex h-section-global-spacing align-items-lg-center align-items-md-center align-items-center" data-kubio="kubio/hero" id="hero">
	<?php $component->printBackground(); ?><?php $component->printSeparator(); ?>
	<div class="position-relative wp-block-kubio-hero__inner pathway-front-header__k__J6FPNZyUrn-inner pathway-local-lEgv7azZau-inner h-navigation-padding h-section-grid-container h-section-boxed-container">
		<script type='text/javascript'>
			(function () {
				// forEach polyfill
				if (!NodeList.prototype.forEach) {
					NodeList.prototype.forEach = function (callback) {
						for (var i = 0; i < this.length; i++) {
							callback.call(this, this.item(i));
						}
					}
				}
				var navigation = document.querySelector('[data-colibri-navigation-overlap="true"], .h-navigation_overlap');
				if (navigation) {
					var els = document
						.querySelectorAll('.h-navigation-padding');
					if (els.length) {
						els.forEach(function (item) {
							item.style.paddingTop = navigation.offsetHeight + "px";
						});
					}
				}
			})();
		</script>
		<div class="wp-block wp-block-kubio-row position-relative wp-block-kubio-row__container pathway-front-header__k__bgnhUSaQMl-container pathway-local-GY0EIawfVu-container gutters-row-lg-0 gutters-row-v-lg-0 gutters-row-md-0 gutters-row-v-md-3 gutters-row-2 gutters-row-v-3" data-kubio="kubio/row">
			<div class="position-relative wp-block-kubio-row__inner pathway-front-header__k__bgnhUSaQMl-inner pathway-local-GY0EIawfVu-inner h-row align-items-lg-stretch align-items-md-stretch align-items-stretch justify-content-lg-center justify-content-md-center justify-content-center gutters-col-lg-0 gutters-col-v-lg-0 gutters-col-md-0 gutters-col-v-md-3 gutters-col-2 gutters-col-v-3">
				<div class="wp-block wp-block-kubio-column position-relative wp-block-kubio-column__container pathway-front-header__k__9IGHpldIpw-container pathway-local-bs-ZNxDQgo-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner pathway-front-header__k__9IGHpldIpw-inner pathway-local-bs-ZNxDQgo-inner d-flex h-flex-basis h-px-lg-0 v-inner-lg-2 h-px-md-0 v-inner-md-2 h-px-2 v-inner-2">
						<div class="position-relative wp-block-kubio-column__align pathway-front-header__k__9IGHpldIpw-align pathway-local-bs-ZNxDQgo-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-center align-self-md-center align-self-center">
							<?php pathway_theme()->get('front-title')->render(); ?><?php pathway_theme()->get('front-subtitle')->render(); ?><?php pathway_theme()->get('buttons')->render(); ?>
						</div>
					</div>
				</div>
				<div class="wp-block wp-block-kubio-column position-relative wp-block-kubio-column__container pathway-front-header__k__vgmHh05cVt-container pathway-local-6wh9f2Jo9-container d-flex h-col-lg-auto h-col-md-auto h-col-auto" data-kubio="kubio/column">
					<div class="position-relative wp-block-kubio-column__inner pathway-front-header__k__vgmHh05cVt-inner pathway-local-6wh9f2Jo9-inner d-flex h-flex-basis h-px-lg-2 v-inner-lg-2 h-px-md-2 v-inner-md-2 h-px-2 v-inner-2">
						<div class="position-relative wp-block-kubio-column__align pathway-front-header__k__vgmHh05cVt-align pathway-local-6wh9f2Jo9-align h-y-container h-column__content h-column__v-align flex-basis-100 align-self-lg-start align-self-md-start align-self-start">
							<?php pathway_theme()->get('front-image')->render(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
