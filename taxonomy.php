<?php 
namespace WWOPN_Theme;

\get_header();
?>

<main role="main">

	<section class="row basic-blue">
		<div class="row-container">

			<h1 class="stext st_purple" data-st-src="<?php echo \get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				<?php echo \esc_html(single_tag_title())?>
			</h1>

		</div>
	</section>	
	<section class="row taxonomy podcasts">

		<div class="row-container cards">

			<?php get_template_part('template-parts/loop-cards'); ?>

			<?php get_template_part('template-parts/pagination'); ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
