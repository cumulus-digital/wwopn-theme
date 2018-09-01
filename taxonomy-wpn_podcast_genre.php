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

			<h1 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				<?=\esc_html(single_tag_title())?>
			</h1>

		</div>
	</header>	
	<section class="row podcasts">

		<div class="row-container">

			<?php
				$post_ids = \wp_list_pluck($posts, 'ID');
				$tag_ids = \wp_get_object_terms(
					$post_ids,
					'wpn_podcast_tag',
					array( 'fields' => 'ids' )
				);
			?>
			<?php if (count($tag_ids)): ?>
				<aside class="tags">
					<?php
					\wp_tag_cloud(array(
						'taxonomy' => 'wpn_podcast_tag',
						'include' => $tag_ids,
						'exclude' => 0,
						'smallest' => 1,
						'largest' => 1,
						'unit' => 'em',
					));
					?>
				</aside>
			<?php endif ?>

			<div class="cards">
				<?php get_template_part('template-parts/loop-cards'); ?>
			</div>

			<?php get_template_part('template-parts/pagination'); ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
