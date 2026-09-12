<?php
/**
 * Temporary Meybell & Co. front page.
 *
 * The holding page intentionally uses a minimal document shell rather
 * than the framework's standard header and footer templates.
 *
 * @package Meybell_Framework
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main class="mnco-holding-page">
	<div class="mnco-holding-page__inner">
		<img
			class="mnco-holding-page__logo"
			src="https://assets.meybell.com/brand/logos/mnco-logo-cream.png"
			alt="Meybell & Co."
		>

		<div class="mnco-holding-page__content">
			<p class="mnco-holding-page__eyebrow">We're making some changes</p>

			<h1>We turn complicated work into smart, useful, gorgeous systems.</h1>

			<p class="mnco-holding-page__intro">
				Our new home is taking shape, but we're still hard at work for you.
			</p>

			<a class="mnco-holding-page__contact" href="mailto:ideas@meybell.com">
				Start a conversation
			</a>
		</div>
	</div>
</main>

<?php wp_footer(); ?>
</body>
</html>
