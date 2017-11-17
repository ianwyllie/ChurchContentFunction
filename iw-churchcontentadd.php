<?php
/*
Plugin Name: iw-churchcontentadd
Plugin URI:   https://exior.co.uk
Description:  This plugin filters  Church Content Plugin
Version:      20171117
Author:       Ian Wyllie
Author URI:   https://exior.co.uk
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/
// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Change sermon slug in URL
 *
 * REQUIRED: Go to Settings > Permalinks and save after applying this, or it will not take effect
 *
 * More info: https://churchthemes.com/guides/developer/church-content/#modifying-post-types
 *
 * @param array $args Post type registration arguments yourprefix_change_sermon_slug
 * @return array Filtered arguments with new slug
 */
function yourprefix_change_sermon_slug( $args ) {
	$args['rewrite']['slug'] = 'messages';
	return $args;
}
add_filter( 'ctc_post_type_sermon_args', 'yourprefix_change_sermon_slug' );