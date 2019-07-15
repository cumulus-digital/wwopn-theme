<?php
/*
Template Name: Full-width
Template Post Type: page
*/
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="page full-width">
	<section class="row">
		<div class="row-container">

			<?php
				get_template_part('template-parts/page-inner');
			?>

		</div>
	</section>
</main>

<?php \get_footer(); ?>