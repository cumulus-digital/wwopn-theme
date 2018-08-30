<?php
namespace WWOPN_Theme;
?>

<?php if (\have_posts()): ?>
	<?php while (\have_posts()): \the_post(); ?>

		<!-- article -->
		<article id="post-<?php \the_ID() ?>" <?php \post_class('post') ?>>

			<?php if ( \has_post_thumbnail()) : ?>
				<figure>
					<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
						<?php \the_post_thumbnail() ?>
					</a>
				</figure>
			<?php endif ?>

			<section class="content">

				<header>
					<a href="<?php \the_permalink(); ?>" title="<?php \the_title(); ?>">
						<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
							<?php \the_title() ?>
						</h2>
					</a>
				</header>


				<?php \the_excerpt() ?>
				
			</section>

		</article>
		<?php \edit_post_link() ?>

	<?php endwhile ?>

<?php else: ?>

	<article>
		<p>Sorry, nothing to display.</p>
	</article>

<?php endif ?>
