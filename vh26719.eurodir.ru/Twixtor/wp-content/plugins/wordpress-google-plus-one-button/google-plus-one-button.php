<?php	 	 
/*
	Plugin Name: Wordpress Google Plus One Button
	Plugin URI: http://andreapernici.com/wordpress/google-plus-one-button/
	Description: Add Google Plus One Button to Wordpress Posts.
	Version: 1.0.2
	Author: Andrea Pernici
	Author URI: http://www.andreapernici.com/
	
	Copyright 2009 Andrea Pernici (andreapernici@gmail.com)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

	*/

define( 'GPO_VERSION', '1.0.2' );

$pluginurl = plugin_dir_url(__FILE__);
if ( preg_match( '/^https/', $pluginurl ) && !preg_match( '/^https/', get_bloginfo('url') ) )
	$pluginurl = preg_replace( '/^https/', 'http', $pluginurl );
define( 'GPO_FRONT_URL', $pluginurl );

define( 'GPO_URL', plugin_dir_url(__FILE__) );
define( 'GPO_PATH', plugin_dir_path(__FILE__) );
define( 'GPO_BASENAME', plugin_basename( __FILE__ ) );

if (!class_exists("AndreaGooglePlusOne")) {

	class AndreaGooglePlusOne {
		/**
		 * Class Constructor
		 */
		function AndreaGooglePlusOne(){
		
		}
		
		/**
		 * Enabled the AndreaGooglePlusOne plugin with registering all required hooks
		 */
		function Enable() {

			add_action('admin_menu', array("AndreaGooglePlusOne",'GooglePlusOneMenu'));
			//add_action("wp_insert_post",array("AndreaFacebookSend","SetFacebookSendCode"));
			add_action('wp_head', array("AndreaGooglePlusOne",'GooglePlusOneInit'));
			$options_after = get_option( 'google_plus_after_content' );
			$options_before = get_option( 'google_plus_before_title' );
			if ($options_after) {
				add_filter("the_content", array("AndreaGooglePlusOne","SetGooglePlusOneCodeFilter"));
			}
			if ($options_before) {
				add_action("loop_start",array("AndreaGooglePlusOne","SetGooglePlusOneCode"));
			}	
			
		}
		
		/**
		 * Set the Admin editor to set options
		 */
		 
		function SetAdminConfiguration() {
			add_action('admin_menu', array("AndreaGooglePlusOne",'GooglePlusOneMenu'));
			return true;			
		}
		
		function GooglePlusOneInit() {
			if (is_single()){
			echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js">{lang: \'it\'}</script>';
			}
		}
		
		function GooglePlusOneMenu() {
			add_options_page('Google Plus One Options', 'Google Plus One Button', 'manage_options', 'google-plus-options', array("AndreaGooglePlusOne",'GooglePlusOneOptions'));
		}
		
		function GooglePlusOneOptions() {
			if (!current_user_can('manage_options'))  {
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			
		    // variables for the field and option names 
		    $google_plus_before_title = 'google_plus_before_title';
		    $google_plus_after_content = 'google_plus_after_content';
		    $google_plus_twitter_name = 'google_plus_twitter_name';
		    
		    $hidden_field_name = 'mt_submit_hidden';
		    $data_field_name_before = 'google_plus_before_title';
		    $data_field_name_after = 'google_plus_after_content';
		    $data_field_twitter_name = 'google_plus_twitter_name';
		
		    // Read in existing option value from database
		    $opt_val_before = get_option( $google_plus_before_title );
		    $opt_val_after = get_option( $google_plus_after_content );
		    $opt_val_twitter_name = get_option( $google_plus_twitter_name );
		    
		    // See if the user has posted us some information
		    // If they did, this hidden field will be set to 'Y'
		    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
		        // Read their posted value
		        $opt_val_before = $_POST[ $data_field_name_before ];
		    	$opt_val_after = $_POST[ $data_field_name_after ];
		    	$opt_val_google_size = $_POST[ $data_field_google_size ];
		
		        // Save the posted value in the database
		        update_option( $google_plus_before_title, $opt_val_before );
		        update_option( $google_plus_after_content, $opt_val_after );
		        update_option( $google_plus_size, $opt_val_google_size );
		
		        // Put an settings updated message on the screen
		
		?>
		<div class="updated"><p><strong><?php	 	 _e('settings saved.', 'menu-google-plus' ); ?></strong></p></div>
		<?php	 	
		
		    }
		    // Now display the settings editing screen
		    echo '<div class="wrap">';
		    // header
		    echo "<h2>" . __( 'Google Plus One Button Options', 'menu-google-plus' ) . "</h2>";
		    // settings form
		    
		    ?>
		
		<form name="form1" method="post" action="">
		<input type="hidden" name="<?php	 	 echo $hidden_field_name; ?>" value="Y">
		
		<?php	 	 $options_after = get_option( 'google_plus_before_title' ); ?>
		<p><?php	 	 _e("Show Before Title:", 'menu-google-plus' ); ?> 
		<input type="checkbox" name="google_plus_before_title" value="1"<?php	 	 checked( 1 == $options_after ); ?> />
		
		<?php	 	 $options_before = get_option( 'google_plus_after_content' ); ?>
		<p><?php	 	 _e("Show After Content:", 'menu-google-plus' ); ?> 
		<input type="checkbox" name="google_plus_after_content" value="1"<?php	 	 checked( 1 == $options_before ); ?> />
		
		<?php	 	 $google_size = get_option( 'google_plus_size' ); ?>
		<p><?php	 	 _e("Button Size:", 'menu-google-plus' ); ?> 
		<input type="text" name="google_plus_size" value="<?php	 	 echo $google_size; ?>" /> (small, medium, tall or empty for standard)</p>

		<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="<?php	 	 esc_attr_e('Save Changes') ?>" />
		</p>
		
		</form>
		<?php	 	 echo "<h2>" . __( 'Put Function in Your Theme', 'menu-google-plus' ) . "</h2>"; ?>
		<p>If you want to put the box anywhere in your theme or you have problem showing the box simply use this function:</p>
		<p>if (function_exists('andrea_google_plus')) { andrea_google_plus(); }</p>
		</div>
		
		<?php	 	

		}
		
		/**
		 * Setup Iframe Buttons for actions
		 */
		
		function SetGooglePlusOneCode() {
			
			$google_size = get_option( 'google_plus_size' );
			if ($google_size != 'medium' || $google_size != 'small' || $google_size != 'tall') $sizer = '';
			else $sizer = ' size="'.$google_size.'"';
			
			$button = '<div id="google_plus_one">';
			$button.= '<g:plusone'.$sizer.'></g:plusone>';
			$button.= '</div>';
			
			echo $button;
		}		
		
		/**
		 * Setup Iframe Buttons for Filter
		 */
		
		function SetGooglePlusOneCodeFilter($content) {
			
			$google_size = get_option( 'google_plus_size' );
			if ($google_size != 'medium' || $google_size != 'small' || $google_size != 'tall') $sizer = '';
			else $sizer = ' size="'.$google_size.'"';
			
			$button = '<div id="google_plus_one">';
			$button.= '<g:plusone'.$sizer.'></g:plusone>';
			$button.= '</div>';
			
			return $content.$button;
		}	
		
		/**
		 * Returns the plugin version
		 *
		 * Uses the WP API to get the meta data from the top of this file (comment)
		 *
		 * @return string The version like 1.0.0
		 */
		function GetVersion() {
			if(!function_exists('get_plugin_data')) {
				if(file_exists(ABSPATH . 'wp-admin/includes/plugin.php')) require_once(ABSPATH . 'wp-admin/includes/plugin.php'); //2.3+
				else if(file_exists(ABSPATH . 'wp-admin/admin-functions.php')) require_once(ABSPATH . 'wp-admin/admin-functions.php'); //2.1
				else return "0.ERROR";
			}
			$data = get_plugin_data(__FILE__);
			return $data['Version'];
		}
	
	}
}

/*
 * Plugin activation
 */
 
if (class_exists("AndreaGooglePlusOne")) {
	$afs = new AndreaGooglePlusOne();
}


if (isset($afs)) {
	add_action("init",array("AndreaGooglePlusOne","Enable"),1000,0);
	//add_action("wp_insert_post",array("AndreaFacebookSend","SetFacebookSendCode"));
}

if (!function_exists('andrea_google_plus')) {
	function andrea_google_plus() {
		$google_plus = new AndreaGooglePlusOne();
		return $google_plus->SetGooglePlusOneCode();
	}	
}
