<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="teams">

	<section class="row basic-blue">
		<div class="row-container">

			<h1 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				Meet the Team
			</h1>

		</div>
	</section>
	<section class="row">

		<div class="row-container members">

			<?php get_template_part('template-parts/loop-cards'); ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>
