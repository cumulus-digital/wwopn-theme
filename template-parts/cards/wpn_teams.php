<?php get_template_part('template-parts/cards/inc-featured_image'); ?>

<div class="content">

	<h3>
		<?php \the_title() ?>
	</h3>

	<ul class="roles">
		<?php
			$roles = \wp_get_object_terms(
				\get_the_ID(),
				'wpn_teams_role',
				'',
				'',
				''
			)
		?>
		<?php foreach($roles as $role): ?>
			<li><?php echo $role->name?></li>
		<?php endforeach ?>
	</ul>

	<?php if (\get_post_meta(get_the_ID(), '_wpn_teams_meta_favoritePodcast', true)): ?>

		<div class="favorite_podcast">
			Favorite Podcast: <?php echo \get_post_meta(get_the_ID(), '_wpn_teams_meta_favoritePodcast', true)?>
		</div>

	<?php endif ?>

	<div class="body bio">
		<?php \the_content() ?>
	</div>

</div>