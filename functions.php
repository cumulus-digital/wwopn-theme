<?php
namespace WWOPN_Theme;

const PREFIX = 'wwopn_theme';

// Auto-update plugins
\add_filter( 'auto_update_plugin', '__return_true' );

// Let other scripts know we're lazy loading
define('HAS_LAZY', true);

require 'classes/MenuWalker.php';
require 'classes/CustomMetas.php';

// Remove emoji crud
\remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
\remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Add excerpt support for Pages
\add_action('init', function() {
	\add_post_type_support( 'page', 'excerpt' );
});

// Helper to namespace stuff
function ns($str) {
	return __NAMESPACE__ . '\\' . $str;
}

// Remove Yoast ad
if (defined('WPSEO_VERSION')) {
	// https://buddydev.com/remove-this-site-is-optimized-with-the-yoast-seo-plugin-vx-y-z/
	\add_action( 'template_redirect', function () {

	    if ( ! class_exists( 'WPSEO_Frontend' ) ) {
	        return;
	    }

	    $instance = \WPSEO_Frontend::get_instance();

	    // make sure, future version of the plugin does not break our site.
	    if ( ! method_exists( $instance, 'debug_mark') ) {
	        return ;
	    }

	    // ok, let us remove the love letter.
	    \remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
	}, 9999 );
}

function theme_setup() {

	\add_theme_support( 'title-tag' );
	\add_theme_support('post-thumbnails', array('page', 'post', 'wpn_podcast', 'wpn_teams', 'wpn_prs'));

	\register_nav_menus(array(
		'header-menu' => __('Header Menu'),
		'footer-menu' => __('Footer Menu')
	));

	// Add theme support for Custom Logo.
	\add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

}
\add_action( 'after_setup_theme', ns('theme_setup') );

/**
 * Enqueue scripts and styles
 * @return [type] [description]
 */
function scripts_and_styles() {
	if ($GLOBALS['pagenow'] != 'wp-login.php' && ! \is_admin()) {
		\wp_deregister_script('jquery');
		\wp_register_script(
			'jquery',
			'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
			false,
			'3.3.1',
			true
		);
		\wp_enqueue_script('jquery');
		\wp_register_script(
			'svg_text',
			\get_template_directory_uri() . '/assets/prod/js/lib/svgText.js',
			array('jquery'),
			null,
			true
		);
		\wp_enqueue_script('svg_text');
		\wp_register_script(
			'wwopn_theme_script',
			\get_template_directory_uri() . '/assets/prod/js/index.js',
			array('jquery'),
			null,
			true
		);
		\wp_enqueue_script('wwopn_theme_script');

		\wp_register_style(
			'wwopn_theme_style',
			\get_template_directory_uri() . '/assets/prod/css/index.css',
			array(),
			null,
			'all'
		);
		\wp_enqueue_style('wwopn_theme_style');

		\wp_register_Style(
			'google_montserrat_font',
			'https://fonts.googleapis.com/css?family=Montserrat:100,200,400,700',
			false,
			null,
			'all'
		);
		\wp_enqueue_style('google_montserrat_font');

	}
}
\add_action('wp_enqueue_scripts', ns('scripts_and_styles'));

/**
 * Add stylesheet to post/page editor
 * @return void
 */
function editor_styles() {
	\wp_register_Style(
		'google_montserrat_font',
		'https://fonts.googleapis.com/css?family=Montserrat:100,200,400,700',
		false,
		null,
		'all'
	);
	\wp_enqueue_style('google_montserrat_font');

	\wp_register_Style(
		'guttenberg_styles',
		\get_template_directory_uri() . '/assets/prod/css/editor.css',
		false,
		null,
		'all'
	);
	\wp_enqueue_style('guttenberg_styles');

}
\add_action('enqueue_block_editor_assets', ns('editor_styles'));

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function excerpt_more( $link ) {
	if ( \is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( \get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( 'Listen to <span class="screen-reader-text">%s</span>', \get_the_title( \get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
\add_filter( 'excerpt_more', ns('excerpt_more') );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
\add_filter( 'widget_tag_cloud_args', ns('tag_cloud_args') );

// Header menu
function header_menu() {
	\wp_nav_menu(array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => '',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul itemscope itemtype="http://www.schema.org/SiteNavigationElement">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new MenuWalker
	));
}

function footer_menu() {
	\wp_nav_menu(array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => '',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => new MenuWalker
	));
}

// remove version info from head and feeds
function remove_identity() {
	return '';
}
\add_filter('the_generator', ns('remove_identity'));

function custom_admin_footer() {
	return '&copy; ' . date('Y') . ' ' . esc_html(\get_option('copyright_info'));
}
\add_filter('admin_footer_text', ns('custom_admin_footer'));

// Add a copyright info field to general settings
function register_copyright_field() {
	\register_setting(
		'general',
		'copyright_info',
		array(
			'description' => 'Copyright text displayed on site.',
			'type' => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default' => NULL,
		)
	);
	\add_settings_field('copyright_info', '<label for="copyright_info">'.__('Copyright Info' , 'copyright_info' ).'</label>' , ns('output_copyright_field'), 'general' );
}
function output_copyright_field() {
	$value = \get_option( 'copyright_info', '' );
	echo '<input type="text" id="copyright_info" name="copyright_info" value="' . $value . '" class="regular-text" />';
}
\add_filter('admin_init' , ns('register_copyright_field'));

// determine if podcast plugin is installed
function hasPodcastPlugin() {
	return class_exists('WWOPN_Podcast/CPT');
}

// Return ALL posts for podcasts and team members
function query_getAllPosts($query) {
	if(
		! \is_admin() &&
		(
			$query->is_post_type_archive('wpn_podcast') ||
			$query->is_post_type_archive('wpn_teams')
		) &&
		$query->is_main_query()
	){
		$query->set('posts_per_page', -1 );

		if ($query->is_post_type_archive('wpn_teams')) {
			$query->set('orderby', 'menu_order title');
			$query->set('order', 'DESC');
		} else {
			$query->set(
				'orderby',
				array(
					'title' => 'ASC',
				)
			);
		}
	}
}
\add_action( 'pre_get_posts', ns('query_getAllPosts'), 1, 1 );

// Use front-page.php if blog is set to static posts
function front_page_template( $template ) {
	return \is_home() ? '' : $template;
}
\add_filter( 'frontpage_template',  ns('front_page_template') );

// Remove prefix from archive titles
function archive_title($title) {
	if ( \is_category() ) {
		$title = \single_cat_title( '', false );
	} elseif ( \is_tag() ) {
		$title = \single_tag_title( '', false );
	} elseif ( \is_author() ) {
		$title = '<span class="vcard">' . \get_the_author() . '</span>';
	} elseif ( \is_post_type_archive() ) {
		$title = \post_type_archive_title( '', false );
	} elseif ( \is_tax() ) {
		$title = \single_term_title( '', false );
	}

	return $title;
}
\add_filter('get_the_archive_title', ns('archive_title'));