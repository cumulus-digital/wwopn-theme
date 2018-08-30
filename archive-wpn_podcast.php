<?php 
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="genres">

	<header class="row basic-blue">
		<div class="row-container">

			<h1 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				Podcasts
			</h1>

		</div>
	</header>	
	<section class="row">

		<div class="row-container">

			<?php 
				$genres = \get_terms(
					array(
						'taxonomy' => 'wpn_podcast_genre',
						'hide_empty' => true
					)
				)
			?>
			
			<?php if ($genres): ?>
				<?php foreach ($genres as $genre): ?>

					<article class="genre">
	
						<header>
							<a href="<?=get_term_link($genre)?>">
								<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
									<?=$genre->name?>
								</h2>
							</a>
							<a href="<?=get_term_link($genre)?>" class="button">View All</a>
						</header>

						<section>
							<?=\do_shortcode('[podcasts-genre genre_id=' . $genre->term_id . ']') ?>
						</section>
					</article>

				<?php endforeach ?>
			<?php endif ?>

		</div>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
