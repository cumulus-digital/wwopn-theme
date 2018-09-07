<?php
namespace WWOPN_Theme\PageMeta;
require __DIR__ . '/traits/custom_meta.trait.php';

class CustomMetas {
	
	use CustomMetaboxes;

	const PREFIX = 'page';

	static function init() {
		self::registerMeta([
			'key' => '_wwopn_theme_titledisplay',
			'title' => 'Page Title Display',
			'howto' => '<p class="howto">Select the display method for this page\'s title</p>',
			'type' => 'select',
			'label' => 'Display Format:',
			'value' => array(
				'3d_blue' => '3D (Blue)',
				'3d_purple' => '3D (Purple)',
				'plain_blue' => 'Plain Text (Blue)',
				'plain_purple' => 'Plain Text (Purple)',
				'none' => 'Hide Title',
			),
			'screen' => 'page',
			'context' => 'side',
			'priority' => 'default'
		]);

		self::parentInit();
	}

	static function getID($post_id) {
		if ( ! $post_id) {
			$post_id = \get_the_ID();
		} else if (is_object($post_id)) {
			$post_id = $pod_id->ID;
		} else if (is_array($post_id)) {
			$post_id = $post_id['ID'];
		}
		return $post_id;
	}

	static function getTitleDisplay($post_id = null) {
		$post_id = self::getID($post_id);
		return \get_post_meta($post_id, '_wwopn_theme_titledisplay', true);
	}
}

/**
 * Determine if request is POST
 * @return boolean
 */
function isPost() {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		return true;
	}
	return false;
}

/**
 * Determine if request is AJAX
 * @return boolean
 */
function isAjax() {
	if (defined('DOING_AJAX') && DOING_AJAX) {
		return true;
	}
	return false;
}

/**
 * Determine if a given post or post ID is under our scope
 * @param  mixed  $post_id
 * @return boolean
 */
function isOurPost($post) {
	if (is_object($post) || is_array($post)) {
		$post = (object) $post;
		if (property_exists($post, 'ID')) {
			$id = $post->ID;
		} else if (property_exists($post, 'id')) {
			$id = $post->id;
		}
	} else {
		$id = $post;
	}
	$postObj = \get_post($id);
	if ($postObj && $postObj->post_type === 'page') {
		return true;
	}
	return false;
}

/**
 * Test for existance of a POST value.
 * Optionally test if it is empty.
 * Optionally test if it is equal to a value.
 * @param  string  $key        POST key
 * @param  boolean $test_empty If true, test that key value is not an empty value
 * @param  mixed   $is_value   If set, test that key value is equal to given value
 * @return boolean
 */
function testPostValue($key, $test_empty = false, $is_value = -8675309) {
	if (isset($_POST[$key])) {
		return true;
	}
	if ($test_empty && ! empty($_POST[$key])) {
		return true;
	}
	if ($is_value !== -8675309 && $_POST[$key] === $is_value) {
		return true;
	}
	return false;
}

CustomMetas::init();