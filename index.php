<?php get_header(); ?>

<main role="main">

	<section class="row features">
		<div class="row-container">
			<?=do_shortcode('[podcasts-big]')?>
		</div>
	</section>

	<section class="row row-headline-left we_are">
		<div class="row-container">
			<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				We Are&hellip;
			</h2>
			<div class="row-body">
				<h3>
					The Leader in News, Talk, Sports, Entertainment &amp; Lifestyle Podcasts.
				</h3>
				<div class="buttons">
					<a href="/pods" class="button">Browse Our Shows</a>
					<a href="<?=\get_permalink(\get_page_by_path('/pitch'))?>" class="button alt">Pitch Us Your Show</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row row-headline-top podcasting_insights basic-blue">
		<div class="row-container">
			<h2 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				Podcasting Insights
			</h2>
			<div class="row-body">
				<h3>
					Download the latest research for advertisers and content creators.
				</h3>
				<div class="buttons">
					<a href="<?=\get_permalink(\get_page_by_path('/insights'))?>" class="button">See What Podcasts Can Do</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row row-headline-right how_to_listen basic">
		<div class="row-container">
			<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
				How to Listen to a Podcast
			</h2>
			<div class="row-body">
				<h3>
					Are you new to podcasts? We'll show you how to join the fun.
				</h3>
				<div class="buttons">
					<a href="<?=\get_permalink(\get_page_by_path('/how-to-listen-to-podcasts'))?>" class="button">Learn About It</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row row-headline-left solutions_for_advertisers basic">
		<div class="row-container">
			<h2 class="stext st_purple" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
				Solutions For Advertisers
			</h2>
			<div class="row-body">
				<h3>
					Reach key demographics across the country.
				</h3>
				<div class="buttons">
					<a href="<?=\get_permalink(\get_page_by_path('/advertising'))?>" class="button">Find Your Audience</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row row-headline-top reach_out basic-purple">
		<div class="row-container">
			<h2 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/left.svg">
				Reach out to us
			</h2>
			<div class="row-body">
				<div class="buttons">
					<a href="<?=\get_permalink(\get_page_by_path('/contact'))?>" class="button">Listeners</a>
					<a href="<?=\get_permalink(\get_page_by_path('/pitch'))?>" class="button alt">Creators</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer();