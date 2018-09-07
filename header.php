<?php
namespace WWOPN_Theme;
?><!doctype html>
<html <?php \language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php \bloginfo('charset'); ?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php \wp_head(); ?>
</head>
<body <?php \body_class(); ?>>

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
