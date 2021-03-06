<?php 
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="prs">

	<header class="row basic-blue">
		<div class="row-container">

			<?php 
				\the_archive_title(
					'<h1 class="stext st_purple" data-st-src="' . \get_template_directory_uri() . '/assets/prod/images/stext/left.svg">',
					'</h1>'
				)
			?>

		</div>
	</header>
	<section class="row">

		<div class="row-container cards">

			<?php get_template_part('template-parts/loop-cards'); ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>
