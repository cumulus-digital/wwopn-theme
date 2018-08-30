<?php
namespace WWOPN_Theme;
?>

<?php if (\have_posts()): ?>
	<?php while (\have_posts()): \the_post(); ?>

		<!-- article -->
		<article id="post-<?php \the_ID() ?>" <?php \post_class('card') ?>>

			<?php if (\get_post_type() !== 'wpn_teams'): ?>
			<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
			<?php endif ?>

				<div>
					<?php if ( \has_post_thumbnail()) : ?>
						<figure>
								<?php \the_post_thumbnail() ?>
						</figure>
					<?php else: ?>
						<div class="headline">
							<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
								<?php \the_title() ?>
							</h2>
						</div>
					<?php endif ?>

					<div class="content">

						<?php get_template_part('template-parts/loop-cards-' . \get_post_type()); ?>

						
						<?php \edit_post_link() ?>
					</div>
				</div>

			<?php if (\get_post_type() !== 'wpn_teams'): ?>
			</a>
			<?php endif ?>

		</article>

	<?php endwhile ?>

<?php else: ?>

	<article>
		<p>Sorry, nothing to display.</p>
	</article>

<?php endif ?>
