<?php
/*
Plugin Name: iw-churchcontentadd
Plugin URI:   https://exior.co.uk
Description:  This plugin filters Church Content Plugin
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
 * Also renames some (but not all) areas int he backend admin. Possibly a translation file would be needed as well.
 * Tactic of replacing the whole of of 'labels' in $args = array('labels' => array('key' => 'value') by writing an separate 
 * array $labels and then re passing as $args['labels' = $labels; works nicely
 * @return array Filtered arguments with new slug
 */
function yourprefix_change_sermon_slug( $args ) {
	$labels = array(
        'name'              	=> esc_html_x( 'Talks', 'post type general name', 'church-theme-content' ),
        'singular_name'     	=> esc_html_x( 'Talk', 'post type singular name', 'church-theme-content' ),
        'add_new'               => esc_html_x( 'Add new', 'church-theme-content' ),
	'add_new_item' 		=> esc_html__( 'Add Talk', 'church-theme-content' ),
	'edit_item' 		=> esc_html__( 'Edit Talk', 'church-theme-content' ),
	'new_item' 		=> esc_html__( 'New Talk', 'church-theme-content' ),
	'all_items' 		=> esc_html__( 'All Talks', 'church-theme-content' ),
	'view_item' 		=> esc_html__( 'View Talk', 'church-theme-content' ),
	'view_items'		=> esc_html__( 'View Talk', 'church-theme-content' ),
	'search_items' 		=> esc_html__( 'Search Talks', 'church-theme-content' ),
	'not_found' 		=> esc_html__( 'No talks found', 'church-theme-content' ),
	'not_found_in_trash' 	=> esc_html__( 'No talks found in Trash', 'church-theme-content' ) 
	);
      	$args['labels'] = $labels;
	
	$args['rewrite']['slug'] = 'messages';
	$args['rewrite']['feeds'] = ctc_feature_supported( 'talks' );
	return $args;
}
add_filter( 'ctc_post_type_sermon_args', 'yourprefix_change_sermon_slug' );
