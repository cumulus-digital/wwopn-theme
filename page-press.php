<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="press">
	<section class="row">
		<div class="row-container">

			<header class="page_header">
				<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
					<?php \the_title(); ?>
				</h1>

				<aside class="contact">
					<h2>Media Contact</h2>
					<?php if (\get_option('wpn_prs_mediacontact')): ?>
						<h3><?=esc_html(\get_option('wpn_prs_mediacontact')['mc_name'])?></h3>
						<ul>
							<?php if (\get_option('wpn_prs_mediacontact')['mc_email']): ?>
								<li class="email">
									<a href="mailto:<?=esc_attr(\get_option('wpn_prs_mediacontact')['mc_email'])?>">
										<?=esc_html(\get_option('wpn_prs_mediacontact')['mc_email'])?>
									</a>
								</li>
							<?php endif ?>
							<?php if (\get_option('wpn_prs_mediacontact')['mc_twitter']): ?>
								<li class="twitter">
									<a href="https://twitter.com/<?=esc_attr(\get_option('wpn_prs_mediacontact')['mc_twitter'])?>">
										@<?=esc_html(\get_option('wpn_prs_mediacontact')['mc_twitter'])?>
									</a>
								</li>
							<?php endif ?>							
						</ul>
					<?php endif ?>
				</aside>
			</header>

			<section class="content">

				<section class="column releases">
					<header>
						<h2>Releases</h2>
					</header>

					<?php
					$tax_release = \get_term_by(
						'slug', 'release', 'wpn_prs_type'
					);
					?>
					<?php if ($tax_release): ?>
						<div class="cards">
	
							<?php
							$releases = get_posts(array(
								'post_type' => 'wpn_prs',
								'showposts' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $tax_release->taxonomy,
										'field' => 'term_id',
										'terms' => $tax_release->term_id,
										'include_children' => false,
									)
								),
							));
							?>
							<?php foreach($releases as $release): ?>
								<?php \setup_postdata($GLOBALS['post'] =& $release) ?>
								<article id="post-<?php \the_ID() ?>" <?php \post_class('card') ?>>
									<?php get_template_part('template-parts/cards/wpn_prs'); ?>
								</article>
							<?php endforeach ?>

						</div>

					<?php endif ?>
				</section>

				<section class="column news">
					<header>
						<h2>In the News</h2>
					</header>

					<?php
					$tax_news = \get_term_by(
						'slug', 'news', 'wpn_prs_type'
					);
					?>
					<?php if ($tax_news): ?>
						<div class="cards">
					
							<?php
							$news = get_posts(array(
								'post_type' => 'wpn_prs',
								'showposts' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $tax_news->taxonomy,
										'field' => 'term_id',
										'terms' => $tax_news->term_id,
										'include_children' => false,
									)
								)
							));
							?>
							<?php foreach($news as $news_item): ?>
								<?php \setup_postdata($GLOBALS['post'] =& $news_item) ?>
								<article id="post-<?php \the_ID() ?>" <?php \post_class('card') ?>>
									<?php get_template_part('template-parts/cards/wpn_prs'); ?>
								</article>
							<?php endforeach ?>

						</div>

					<?php endif ?>
				</section>

			</section>

			<?php \edit_post_link(); ?>

		</div>
	</section>
</main>

<?php \get_footer(); ?>