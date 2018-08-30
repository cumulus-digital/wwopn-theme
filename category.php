<?php 
namespace WWOPN_Theme;

\get_header();
?>

<main role="main">

	<header class="row basic-blue">
		<div class="row-container">

			<h1 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				<?=\esc_html(single_cat_title())?>
			</h1>

		</div>
	</header>	
	<section class="row category">

		<div class="row-container">

			<?php get_template_part('template-parts/loop'); ?>

			<?php get_template_part('template-parts/pagination'); ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
