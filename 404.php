<?php
namespace WWOPN_Theme;

\get_header();
?>

<main role="main" class="notfound">
	<section class="row">
		<div class="row-container">

		
			<h1 class="stext st_blue" data-st-src="<?=\get_template_directory_uri()?>/assets/prod/images/stext/right.svg">
				404
			</h1>

			<p>
				Maybe you can find what you're looking for in one 
				of our podcasts?
			</p>

			<p>
				<a href="/pods" class="button">
					Browse Our Shows
				</a>
			</p>

		</div>
	</section>
</main>

<?php \get_footer(); ?>