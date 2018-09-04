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