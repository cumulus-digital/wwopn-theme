<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="podcast">
	<div class="row">

	<?php if (\have_posts()): ?>
		<?php while (\have_posts()) : \the_post(); ?>

			<article id="podcast-<?php the_ID() ?>" <?php \post_class(array('podcast')) ?> itemscope itemtype="http://schema.org/RadioSeries">

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
									<img itemprop="thumbnail" src="<?=\wp_get_attachment_image_src(get_post_thumbnail_id(\get_the_ID()), 'full')[0] ?>" alt="">
								</a>
							</figure>
							<?php endif ?>
							<div class="title">
								<div class="meta">
									<div class="genres">
									<?php $genres = \wp_get_post_terms($post->ID, 'wpn_podcast_genre') ?>
									<?php foreach($genres as $genre): ?>
										<a href="<?=esc_url(\get_term_link($genre)) ?>" rel="tag" itemprop="genre"><?=esc_html($genre->name) ?></a><?=(next($genres) ? ', ' : '') ?>
									<?php endforeach ?>
									</div>
									<?php
										$tags = \wp_get_post_terms(
											$post->ID,
											'wpn_podcast_tag',
											array( 'fields' => 'all' )
										);
									?>
									<?php if ($tags): ?>
										<?php
										$popular_tags = \wp_tag_cloud(array(
											'taxonomy' => 'wpn_podcast_tag',
											'format' => 'array',
											'include'  => array_column($tags, 'term_id'),
											'number' => 3,
											'orderby' => 'count',
											'order' => 'DESC',
											'echo' => false,
											'smallest' => 1,
											'largest' => 1,
											'unit' => 'em',
										));
										?>
										<?php if ($popular_tags): ?>
											<aside class="tags">
												<ul itemprop="keywords" content="<?=implode(', ', array_column($tags, 'name')) ?>">
													<?php foreach ($popular_tags as $tag): ?>
														<li>
															<?=$tag?>
														</li>
													<?php endforeach ?>
												</ul>
											</aside>
										<?php endif; ?>
									<?php endif; ?>
								</div>
								<h1 itemprop="name headline" content="<?=\get_the_title() ?>" class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
									<?php \the_title() ?>
								</h1>
								<h2 itemprop="alternativeHeadline">
								<?php if (\WWOPN_Podcast\CPT::getSubTitle()): ?>
										<?=\WWOPN_Podcast\CPT::getSubTitle() ?>
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
							<div class="body" itemprop="description">
								<?php \the_content() ?>
							</div>

							<?php if (\WWOPN_Podcast\CPT::getSocialLinks()): ?>
							<aside class="social">
								<ul>
								<?php foreach(\WWOPN_Podcast\CPT::getSocialLinks() as $soc_service=>$soc_link): ?>
									<li class="\esc_attr($soc_service) ?>">
										<a href="<?=\esc_url($soc_link) ?>" target="_blank" rel="noopener">
											<?php if ($soc_service=='facebook'): ?>
												<svg class="facebook" aria-labelledby="facebook-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.676 0H1.324C.593 0 0 .593 0 1.324v21.352C0 23.408.593 24 1.324 24h11.494v-9.294H9.689v-3.621h3.129V8.41c0-3.099 1.894-4.785 4.659-4.785 1.325 0 2.464.097 2.796.141v3.24h-1.921c-1.5 0-1.792.721-1.792 1.771v2.311h3.584l-.465 3.63H16.56V24h6.115c.733 0 1.325-.592 1.325-1.324V1.324C24 .593 23.408 0 22.676 0"/></svg>
												<span>
													Facebook
												</span>
											<?php endif ?>
											<?php if ($soc_service=='twitter'): ?>
												<svg class="twitter" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.954 4.569a10 10 0 0 1-2.825.775 4.958 4.958 0 0 0 2.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 0 0-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 0 0-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.061a4.923 4.923 0 0 0 3.946 4.827 4.996 4.996 0 0 1-2.212.085 4.937 4.937 0 0 0 4.604 3.417 9.868 9.868 0 0 1-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 0 0 7.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 0 0 2.46-2.548l-.047-.02z"/></svg>
												<span>
													Twitter
												</span>
											<?php endif ?>
										</a>
									</li>
								<?php endforeach ?>
								</ul>
							</aside>
							<?php endif ?>
							
							<?php if (\has_term('', 'wpn_podcast_tag')): ?>
							<aside class="tags">
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
							</aside>
							<?php endif ?>
						</div>

						<?php if (\WWOPN_Podcast\CPT::getPlayerEmbed()): ?>
							<div class="player_embed">
								<?=\WWOPN_Podcast\CPT::getPlayerEmbed() ?>
							</div>
						<?php endif ?>

						<?php if (\WWOPN_Podcast\CPT::getStoreLinks()): ?>
						<aside class="storelinks">
							<ul>
							<?php foreach(\WWOPN_Podcast\CPT::getStoreLinks() as $store=>$storelink): ?>

								<li class="<?=\esc_attr($store) ?>">
									<a href="<?=\esc_url($storelink)?>" target="_blank" rel="noopener">
										<img data-src="<?=\get_template_directory_uri()?>/assets/prod/images/badges/<?=\esc_attr($store) ?>.svg" alt="listen on <?=\esc_attr($store) ?>">
									</a>
								</li>

							<?php endforeach; ?>
							</ul>
						</aside>
						<?php endif ?>

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