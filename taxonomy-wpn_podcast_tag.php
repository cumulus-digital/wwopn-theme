<?php 
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="taxonomy podcasts">

	<header class="row basic-blue">
		<div class="row-container">

			<a href="/pods" class="button">
				Back to the Pods
			</a>

			<h1 class="stext st_purple" data-st-src="<?php echo \get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				<?php echo \esc_html(single_tag_title())?>
			</h1>

		</div>
	</header>	
	<section class="row podcasts">

		<div class="row-container">

			<div class="cards">
				<?php get_template_part('template-parts/loop-cards'); ?>
			</div>

			<?php get_template_part('template-parts/pagination'); ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
