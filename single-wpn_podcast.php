<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="podcast">
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

				<header class="<?php
					echo ($header_id && $header_img) ? 'has_header_img ' : '';
					echo \get_post_meta(get_the_ID(), '_wpn_podcast_meta_subTitle', true) ? 'has_subtitle ' : '';
				?>">

					<div class="header-bg-container">
						<?php if($header_id && $header_img): ?>

							<img src="<?=\wp_get_attachment_image_src($header_img->ID, 'full')[0]; ?>" alt="">

						<?php endif ?>
					</div>

					<div class="row-container">
						<div class="info">
							<?php if (\has_post_thumbnail()): ?>
							<figure>
								<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
									<img src="<?=\wp_get_attachment_image_src(get_post_thumbnail_id(\get_the_ID()), 'full')[0] ?>" alt="">
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
									<?php
										$tag_ids = \wp_get_post_terms(
											$post->ID,
											'wpn_podcast_tag',
											array( 'fields' => 'ids' )
										);
									?>
									<?php if ($tag_ids): ?>
										<?php
										$tags = \wp_tag_cloud(array(
											'taxonomy' => 'wpn_podcast_tag',
											'format' => 'array',
											'include'  => $tag_ids,
											'number' => 4,
											'orderby' => 'count',
											'order' => 'DESC',
											'echo' => false,
											'smallest' => 1,
											'largest' => 1,
											'unit' => 'em',
										));
										?>
										<?php if ($tags): ?>
											<aside class="tags">
												<ul>
													<?php foreach ($tags as $tag): ?>
														<li>
															<?=$tag?>
														</li>
													<?php endforeach ?>
												</ul>
											</aside>
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
									<?php \the_title() ?>
								</h1>
								<h2>
								<?php if (\get_post_meta(get_the_ID(), '_wpn_podcast_meta_subTitle', true)): ?>
										<?=\get_post_meta(get_the_ID(), '_wpn_podcast_meta_subTitle', true) ?>
								<?php else: ?>
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
							<aside class="storelinks">
								<ul>
								<?php foreach(\get_post_meta(get_the_ID(), '_wpn_podcast_meta_storelinks', true) as $store=>$storelink): ?>

									<?php if ($storelink): ?>
									<li class="<?=\esc_attr($store) ?>">
										<a href="<?=\esc_url($storelink)?>" target="_blank">
											<img src="<?=\get_template_directory_uri()?>/assets/prod/images/badges/<?=\esc_attr($store) ?>.svg" alt="listen on <?=\esc_attr($store) ?>">
										</a>
									</li>
									<?php endif ?>

								<?php endforeach; ?>
								</ul>
							</aside>
							<aside class="tags">
								<?php if (\has_term('', 'wpn_podcast_tag')): ?>
									<h5>Tags:</h5>
									<?php
										\the_terms(
											\get_the_ID(),
											'wpn_podcast_tag',
											'',
											'',
											''
										)
									?>
								<?php endif ?>
							</aside>
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
	</div>
</main>

<?php \get_footer(); ?>