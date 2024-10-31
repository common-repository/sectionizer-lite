<?php
/*
Plugin Name: Sectionizer Lite
Plugin URI: http://wpfruits.com
Description: WP Sectionizer Plugin is a cool concept to reach to the desired sections of the page to read the content of your requirement or interest.
Author: wpfruits, tikendramaitry
Version: 1.0.0
Author URI: http://wpfruits.com
*/

include_once('admin/sczr_admin.php');
include_once('admin/sczr_frontend.php');
add_action('admin_menu','sczr_add_section');
function sczr_add_section(){
   add_menu_page('sectionizer','Sectionizer','administrator','create_sectionizer','sczr_display_sectionizer',plugins_url('images/sczr_icon.png',__FILE__));
   add_submenu_page('sczr_create_sectionizer', 'Edit Sectionizer','', 'administrator','edit-sectionizer','edit_sectionizer');
  }
add_action('admin_init', 'sczr_backend_script');
function sczr_backend_script(){
wp_enqueue_script('jquery');
wp_enqueue_script('farbtastic');
wp_enqueue_style('farbtastic');	
wp_enqueue_script('sczr-front-script',plugins_url('admin/js/sczr_admin.js',__FILE__), array('jquery'));
wp_enqueue_style('sczr_style',plugins_url('admin/css/sczr_admin_style.css',__FILE__));
}
add_action('wp_enqueue_scripts', 'sczr_frontend_scripts');
function sczr_frontend_scripts(){	
	if(!is_admin()){ 
	wp_enqueue_script('jquery');
	wp_enqueue_style('sczr_front_style',plugins_url('front/css/sczr_front_style.css',__FILE__));	}
}
function sczr_defaults_options(){
	    $default = array(
		'sczr_direction'=>'vertical',
		'sczr_position'=>'LeftTop',
		'sczr_width'=>'fullwidth',
		'sczr_customwidth'=>600, 
		'sczr_bg_color'=>'#faa942',
		'sczr_text_color' => '#302c2c',
		'sczr_top_distance' =>'100',
		'sczr_facebookUrl'=> 'http://wpfruits.com',
		'sczr_twitterUrl'=> 'http://wpfruits.com',
		'sczr_linkedinUrl'=> 'http://wpfruits.com',
		'sczr_googleUrl'=> 'http://wpfruits.com',
		'sczr_rssUrl'=> 'http://wpfruits.com',		
		'sczr_scrolltop_btn_chk' =>'1',		
		'sczr_sections'=> array(
								'Section1'	
								),
		'sczr_section_count'=> '1'
		);
	return $default;
}
function create_sczr_table(){
    global $wpdb;
	$table_name = $wpdb->prefix."sectionizer"; 
		$sql = "CREATE TABLE " . $table_name . " (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  option_name VARCHAR(255) NOT NULL DEFAULT  'sczr_options',
		  active tinyint(1) NOT NULL DEFAULT  '0',
		  PRIMARY KEY (`id`),
          UNIQUE (
                    `option_name`
            )
		);";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
function sczr_plugin_install(){
    $sczr_options = get_option('sczr_options');
	if(!$sczr_options){}
	add_option('sczr_options', sczr_defaults_options());	
	global $wpdb;
	$table_name = $wpdb->prefix . "sectionizer"; 
	if($wpdb->get_var("show tables like '$table_name'") == $table_name){}
	else{
		create_sczr_table();
		$table_name = $wpdb->prefix . "sectionizer"; 
		$sql = "INSERT INTO " . $table_name . " values ('','sczr_options','1');";
		$wpdb->query( $sql );
	}
}
register_activation_hook(__FILE__,'sczr_plugin_install');
?>