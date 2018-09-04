<?php get_template_part('template-parts/cards/inc-featured_image'); ?>

<div class="content">
	<h3>
		<?php \the_title() ?>
	</h3>

	<div class="body">
		<?php if (\has_excerpt()): ?>
			<?php \the_excerpt() ?>
		<?php else: ?>
			<?php \the_content() ?>
		<?php endif ?>
	</div>
</div>