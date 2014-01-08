<?php	 	
/**
 * Multisite sites administration panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

/** Load WordPress Administration Bootstrap */
require_once( './admin.php' );

if ( ! is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

if ( ! current_user_can( 'manage_sites' ) )
	wp_die( __( 'You do not have permission to access this page.' ) );

$wp_list_table = _get_list_table('WP_MS_Sites_List_Table');
$pagenum = $wp_list_table->get_pagenum();

$title = __( 'Sites' );
$parent_file = 'sites.php';

add_screen_option( 'per_page', array('label' => _x( 'Sites', 'sites per page (screen options)' )) );

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' =>
		'<p>' . __('Add New takes you to the Add New Site screen. You can search for a site by Name, ID number, or IP address. Screen Options allows you to choose how many sites to display on one page.') . '</p>' .
		'<p>' . __('This is the main table of all sites on this network. Switch between list and excerpt views by using the icons above the right side of the table.') . '</p>' .
		'<p>' . __('Hovering over each site reveals seven options (three for the primary site):') . '</p>' .
		'<ul><li>' . __('An Edit link to a separate Edit Site screen.') . '</li>' .
		'<li>' . __('Dashboard leads to the Dashboard for that site.') . '</li>' .
		'<li>' . __('Deactivate, Archive, and Spam which lead to confirmation screens. These actions can be reversed later.') . '</li>' .
		'<li>' . __('Delete which is a permanent action after the confirmation screens.') . '</li>' .
		'<li>' . __('Visit to go to the frontend site live.') . '</li></ul>' .
		'<p>' . __('The site ID is used internally, and is not shown on the front end of the site or to users/viewers.') . '</p>' .
		'<p>' . __('Clicking on bold headings can re-sort this table.') . '</p>'
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="http://codex.wordpress.org/Network_Admin_Sites_Screens" target="_blank">Documentation on Site Management</a>') . '</p>' .
	'<p>' . __('<a href="http://wordpress.org/support/forum/multisite/" target="_blank">Support Forums</a>') . '</p>'
);

$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;

if ( isset( $_GET['action'] ) ) {
	do_action( 'wpmuadminedit' , '' );

	switch ( $_GET['action'] ) {
		case 'updateblog':
			// No longer used.
		break;

		case 'deleteblog':
			check_admin_referer('deleteblog');
			if ( ! ( current_user_can( 'manage_sites' ) && current_user_can( 'delete_sites' ) ) )
				wp_die( __( 'You do not have permission to access this page.' ) );

			if ( $id != '0' && $id != $current_site->blog_id && current_user_can( 'delete_site', $id ) ) {
				wpmu_delete_blog( $id, true );
				wp_safe_redirect( add_query_arg( array( 'updated' => 'true', 'action' => 'delete' ), wp_get_referer() ) );
			} else {
				wp_safe_redirect( add_query_arg( array( 'updated' => 'true', 'action' => 'not_deleted' ), wp_get_referer() ) );
			}

			exit();
		break;

		case 'allblogs':
			if ( ( isset( $_POST['action'] ) || isset( $_POST['action2'] ) ) && isset( $_POST['allblogs'] ) ) {
				check_admin_referer( 'bulk-sites' );

				if ( ! current_user_can( 'manage_sites' ) )
					wp_die( __( 'You do not have permission to access this page.' ) );

				if ( $_GET['action'] != -1 || $_POST['action2'] != -1 )
					$doaction = $_POST['action'] != -1 ? $_POST['action'] : $_POST['action2'];

				$blogfunction = '';

				foreach ( (array) $_POST['allblogs'] as $key => $val ) {
					if ( $val != '0' && $val != $current_site->blog_id ) {
						switch ( $doaction ) {
							case 'delete':
								if ( ! current_user_can( 'delete_site', $val ) )
									wp_die( __( 'You are not allowed to delete the site.' ) );
								$blogfunction = 'all_delete';
								wpmu_delete_blog( $val, true );
							break;

							case 'spam':
								$blogfunction = 'all_spam';
								update_blog_status( $val, 'spam', '1' );
								set_time_limit( 60 );
							break;

							case 'notspam':
								$blogfunction = 'all_notspam';
								update_blog_status( $val, 'spam', '0' );
								set_time_limit( 60 );
							break;
						}
		