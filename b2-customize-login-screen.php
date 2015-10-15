<?php 
/*Plugin Name: B2 Creative Group — Login Customizer
Plugin URI: https://www.kevinabarnes.com
Description: This plugin customizes the WordPress login screen.
Version: 1.0
Author: Kevin A. Barnes
Author URI: https://www.kevinabarnes.com
License: GPLv2
*/

// Custom WordPress Login: Add a new logo and styles to the login page
function login_styles() { 
     wp_enqueue_style( 'login-styles', plugins_url( 'media/login-style.css' , __FILE__ ), false ); 
}
add_action( 'login_enqueue_scripts', 'login_styles' );

// Custom WordPress Login: Change the link URL for the logo image
function change_wp_login_url() {
	return get_bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');

// Custom WordPress Login: Change the title for the logo image
function change_wp_login_title() {
	return get_option('blogname');
}
add_filter('login_headertitle', 'change_wp_login_title');

// Custom WordPress Login: Add login box fade-in effect
add_action( 'login_head', 'untame_fadein',300);
	function untame_fadein() {
	echo '<script type="text/javascript">// <![CDATA[
	jQuery(document).ready(function() { jQuery("#loginform,#nav,#backtoblog").css("display", "none");
	jQuery("#loginform,#nav,#backtoblog").fadeIn(3500);     
	});
	// ]]></script>';
}

// Custom WordPress Login: Change error messages displayed (specific error not stated) FOR SECURITY
add_filter('login_errors', create_function('$a', "return '<b>Error:</b> Incorrect login details provided.';"));

?>