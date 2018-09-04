<?php if (\get_post_meta(get_the_ID(), '_wpn_prs_meta_prlink', true)): ?>
	<a href="<?=esc_attr(\get_post_meta(get_the_ID(), '_wpn_prs_meta_prlink', true)) ?>" title="<?php \the_title() ?>" target="_blank">
<?php else: ?>
	<a href="<?php \the_permalink() ?>" title="<?php \the_title() ?>">
<?php endif ?>

		<?php if ( \has_post_thumbnail()) : ?>
			<figure>
					<?php \the_post_thumbnail() ?>
			</figure>
		<?php endif ?>

		<div class="content">
			<h3>
				<?php \the_title() ?>
			</h3>
			
			<aside class="meta">
				<time datetime="<?=\get_the_date('Y-m-d', get_the_ID())?>">
					<?=\get_the_date('F j, Y', get_the_ID())?>
				</time>

				<?php if (\get_post_meta(get_the_ID(), '_wpn_prs_meta_prsource', true)): ?>
					<div class="source">
						<?=esc_html(\get_post_meta(get_the_ID(), '_wpn_prs_meta_prsource', true)) ?>
					</div>
				<?php endif ?>
			</aside>

			<div class="body">
				<?php if (\has_excerpt()): ?>
					<?php \the_excerpt() ?>
				<?php else: ?>
					<?=substr(\get_the_content(), 0, 400) ?>
				<?php endif ?>
			</div>
		</div>

</a>