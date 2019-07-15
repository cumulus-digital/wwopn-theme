<?php
namespace WWOPN_Theme;
?>
<?php if (\have_posts()): ?>
	<?php while (\have_posts()) : \the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php \post_class(); ?>>

			<?php $title_display = PageMeta\CustomMetas::getTitleDisplay() ?>
			<?php if ($title_display !== 'none'): ?>
			<header>
				<?php
				switch($title_display):
					case '3d_purple':
						?>
						<h1 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
							<?php \the_title(); ?>
						</h1>
						<?php
						break;
					case 'plain_blue':
						?>
						<h1 class="blue">
							<?php \the_title(); ?>
						</h1>
						<?php
						break;
					case 'plain_purple':
						?>
						<h1 class="purple">
							<?php \the_title(); ?>
						</h1>
						<?php
						break;
					default:
						?>
						<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
							<?php \the_title(); ?>
						</h1>
						<?php
				endswitch;
				?>
			</header>
			<?php endif ?>

			<div class="body">
				<?php \the_content(); ?>
			</div>

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