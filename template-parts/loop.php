<?php
namespace WWOPN_Theme;
?>

<?php if (\have_posts()): ?>
	<?php while (\have_posts()): \the_post(); ?>

		<!-- article -->
		<article id="post-<?php \the_ID() ?>" <?php \post_class('post') ?>>

			<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">

				<div>
					<?php if ( \has_post_thumbnail()) : ?>
						<figure>
								<img data-src="<?=\get_the_post_thumbnail_url() ?>">
						</figure>
					<?php endif ?>

					<div class="content">

						<header>
							<a href="<?php \the_permalink(); ?>" title="<?php \the_title(); ?>">
								<h2>
									<?php \the_title() ?>
								</h2>
							</a>
						</header>

						<div class="excerpt">
							<?php \the_excerpt() ?>
						</div>
						
						<?php \edit_post_link() ?>
					</div>
				</div>

			</a>

		</article>

	<?php endwhile ?>

<?php else: ?>

	<article>
		<p>Sorry, nothing to display.</p>
	</article>

<?php endif ?>
