<?php
namespace WWOPN_Theme;
?><!doctype html>
<html <?php \language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php \bloginfo('charset'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<link rel="apple-touch-icon" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/apple-touch-icon.png?v=jw7E95zRQe">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/apple-touch-icon-180x180.png?v=jw7E95zRQe">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/favicon-32x32.png?v=jw7E95zRQe">
	<link rel="icon" type="image/png" sizes="194x194" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/favicon-194x194.png?v=jw7E95zRQe">
	<link rel="icon" type="image/png" sizes="192x192" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/android-chrome-192x192.png?v=jw7E95zRQe">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/favicon-16x16.png?v=jw7E95zRQe">
	<link rel="manifest" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/site.webmanifest?v=jw7E95zRQe">
	<link rel="mask-icon" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/safari-pinned-tab.svg?v=jw7E95zRQe" color="#6a2774">
	<link rel="shortcut icon" href="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/favicon.ico?v=jw7E95zRQe">
	<meta name="apple-mobile-web-app-title" content="WWOPN">
	<meta name="application-name" content="WWOPN">
	<meta name="msapplication-TileColor" content="#6a2774">
	<meta name="msapplication-config" content="<?=\get_template_directory_uri()?>/assets/prod/images/favicons/browserconfig.xml?v=jw7E95zRQe">
	<meta name="theme-color" content="#6a2774">

	<?php \wp_head(); ?>
</head>
<body <?php \body_class(); ?>>
	<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

	<header class="masthead">
		<div class="row-container">
			<div class="logo">
				<a href="<?= \home_url() ?>">
					<?php if (function_exists('custom_logo')): ?>
						<?php \custom_logo(); ?>
					<?php else: ?>
						<img src="<?=\get_template_directory_uri()?>/assets/prod/images/wwopn-logo.svg" alt="<?php \bloginfo('name') ?>">
					<?php endif ?>
				</a>
			</div>

			<?php if ( ! \is_post_type_archive('wpn_podcast') && ! is_tax('wpn_podcast_genre') && ! is_tax('wpn_podcast_tag')): ?>
			<div class="all_shows">
				<a href="/pods">All Shows</a>
			</div>
			<?php endif ?>

			<nav class="menu">
				<input type="checkbox" id="hamburger-toggle" aria-hidden="true" />
				<label for="hamburger-toggle" class="hamburger" aria-hidden="true">
					<span class="burger-shade"></span>
					Expand the menu
					<span class="burger-lines">
						<span class="burger-line"></span>
						<span class="burger-line"></span>
						<span class="burger-line"></span>
					</span>
				</label>
				
				<?php header_menu() ?>
			</nav>
		</div>
	</header>
