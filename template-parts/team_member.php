<?php
namespace WWOPN_Theme;
?>

<?php if (\have_posts()): ?>
	<?php while (\have_posts()): \the_post(); ?>

		<!-- article -->
		<article id="post-<?php \the_ID() ?>" <?php \post_class('member') ?>>

			<?php if ( \has_post_thumbnail()) : ?>
				<figure>
					<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
						<img data-src="<?=\get_the_post_thumbnail_url() ?>">
					</a>
				</figure>
			<?php endif ?>

			<section class="content">

				<header>
					<a href="<?php \the_permalink(); ?>" title="<?php \the_title(); ?>">
						<h2>
							<?php \the_title() ?>
						</h2>
					</a>
				</header>


				<?php \the_content() ?>
				
			</section>

			<?php \edit_post_link() ?>
		</article>

	<?php endwhile ?>

<?php else: ?>

	<article>
		<p>Sorry, nothing to display.</p>
	</article>

<?php endif ?>
