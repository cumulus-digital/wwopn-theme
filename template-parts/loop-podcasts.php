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
								<?php \the_post_thumbnail() ?>
						</figure>
					<?php endif ?>

					<div class="content">

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
