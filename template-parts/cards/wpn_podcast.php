<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">

	<?php get_template_part('template-parts/cards/inc-featured_image'); ?>

	<div class="content">

		<span class="listen">Listen Now!</span>

		<div class="body excerpt">
			<?php \the_excerpt() ?>
		</div>

	</div>

</a>