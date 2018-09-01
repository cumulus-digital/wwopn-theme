<?php
	namespace WWOPN_Theme;
?>

	<footer role="contentinfo">

		<div class="row-container">

			<div class="copyright">
				&copy; <?=date('Y')?> <?=\esc_html(\get_option('copyright_info'))?>
			</div>

			<nav class="menu">
				<?php footer_menu() ?>
			</nav>

		</div>

	</footer>

	<?php wp_footer(); ?>

	<!-- Designed and built by @danielvena -->

	<script>window.jQuery || document.write('<script src="<?=\get_template_directory_uri()?>/assets/static/jquery-3.3.1.min.js>\x3C/script>')</script>
</body>
</html>