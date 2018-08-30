<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main">
	<div class="row">

	<?php if (\have_posts()): ?>
		<?php while (\have_posts()) : \the_post(); ?>

			<article id="podcast-<?php the_ID() ?>" <?php \post_class(array('podcast')) ?>>

				<?php 
					$header_id = \get_post_meta(\get_the_ID(), '_wpn_podcast_meta_headerimage', true);
					if ($header_id) {
						$header_img = \get_post($header_id);
					}
				?>

				<header class="<?=!($header_id && $header_img) ?: 'has_header'?>">

					<div class="header-bg-container">
						<?php if($header_id && $header_img): ?>

							<img src="<?=\wp_get_attachment_image_src($header_img->ID, 'full')[0]; ?>">

						<?php endif ?>
					</div>

					<div class="row-container">
						<div class="info">
							<?php if (\has_post_thumbnail()): ?>
							<figure>
								<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
									<img src="<?=\wp_get_attachment_image_src(get_post_thumbnail_id(\get_the_ID()), 'full')[0] ?>">
								</a>
							</figure>
							<?php endif ?>
							<div class="title">
								<div class="meta">
									<div class="genres">
									<?php 
										\the_terms(
											\get_the_ID(),
											'wpn_podcast_genre',
											'',
											', ',
											''
										)
									?>
									</div>
									<aside class="tags">
										<?php
											\the_terms(
												\get_the_ID(),
												'wpn_podcast_tag',
												'',
												'',
												''
											)
										?>
									</aside>
								</div>
								<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
									<?php \the_title() ?>
								</h1>
								<h2>
								<?php if (\get_post_meta(get_the_ID(), '_wpn_podcast_meta_subTitle', true)): ?>
										<?=\get_post_meta(get_the_ID(), '_wpn_podcast_meta_subTitle', true) ?>
								<?php else: ?>
									<span>&nbsp;</span>
								<?php endif; ?>
								</h2>
							</div>
						</div>
					</div>

				</header>

				<div class="row-container">
					
					<div class="content">

						<div class="description">
							<div class="body">
								<?php \the_content() ?>
							</div>
						</div>

						<div class="player_embed">
							<?=\get_post_meta(get_the_ID(), '_wpn_podcast_meta_playerembed', true) ?>
						</div>

					</div>

				</div>

			</article>
			<?php \edit_post_link(); ?>

		<?php endwhile ?>
	<?php else: ?>
		<article class="row-container">
			<p>
				Sorry, nothing to display.
			</p>
		</article>
	<?php endif; ?>
</main>

<?php \get_footer(); ?>