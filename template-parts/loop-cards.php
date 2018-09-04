<?php
namespace WWOPN_Theme;
?>

<?php if (\have_posts()): ?>
	<?php while (\have_posts()): \the_post(); ?>

		<article id="post-<?php \the_ID() ?>" <?php \post_class('card') ?>>

			<?php get_template_part('template-parts/cards/' . \get_post_type()); ?>

			<?php \edit_post_link() ?>
		</article>

	<?php endwhile ?>

<?php else: ?>

	<article>
		<p>Sorry, nothing to display.</p>
	</article>

<?php endif ?>
