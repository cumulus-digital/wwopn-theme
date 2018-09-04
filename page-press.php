<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="press">
	<section class="row">
		<div class="row-container">

			<?php if (\have_posts()): ?>
				<?php while (\have_posts()) : \the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php \post_class(); ?>>

						<header>
							<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
								<?php \the_title(); ?>
							</h1>
						</header>

						testing

					<?php \edit_post_link(); ?>
					</article>

				<?php endwhile; ?>
			<?php else: ?>

				<article>

					<p>
						Sorry, nothing to display.
					</p>

				</article>

			<?php endif; ?>

		</div>
	</section>
</main>

<?php \get_footer(); ?>