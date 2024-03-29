<?php	 	
/**
 * Privacy Options Settings Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** Load WordPress Administration Bootstrap */
require_once('./admin.php');

if ( ! current_user_can( 'manage_options' ) )
	wp_die( __( 'You do not have sufficient permissions to manage options for this site.' ) );

$title = __('Privacy Settings');
$parent_file = 'options-general.php';

get_current_screen()->add_help_tab( array(
	'id'      => 'overview',
	'title'   => __('Overview'),
	'content' => '<p>' . __('You can choose whether or not your site will be crawled by robots, ping services, and spiders. If you want those services to ignore your site, click the radio button next to &#8220;Ask search engines not to index this site&#8221; and click the Save Changes button at the bottom of the screen. Note that your privacy is not complete; your site is still visible on the web.') . '</p>' .
		'<p>' . __('When this setting is in effect a reminder is shown in the Right Now box of the Dashboard that says, &#8220;Search Engines Blocked,&#8221; to remind you that your site is not being crawled.') . '</p>',
) );

get_current_screen()->set_help_sidebar(
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="http://codex.wordpress.org/Settings_Privacy_Screen" target="_blank">Documentation on Privacy Settings</a>') . '</p>' .
	'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
);

include('./admin-header.php');
?>

<div class="wrap">
<?php	 	 screen_icon(); ?>
<h2><?php	 	 echo esc_html( $title ); ?></h2>

<form method="post" action="options.php">
<?php	 	 settings_fields('privacy'); ?>

<table class="form-table">
<tr valign="top">
<th scope="row"><?php	 	 _e( 'Site Visibility' ); ?> </th>
<td><fieldset><legend class="screen-reader-text"><span><?php	 	 _e( 'Site Visibility' ); ?> </span></legend>
<input id="blog-public" type="radio" name="blog_public" value="1" <?php	 	 checked('1', get_option('blog_public')); ?> />
<label for="blog-public"><?php	 	 _e( 'Allow search engines to index this site.' );?></label><br/>
<input id="blog-norobots" type="radio" name="blog_public" value="0" <?php	 	 checked('0', get_option('blog_public')); ?> />
<label for="blog-norobots"><?php	 	 _e( 'Ask search engines not to index this site.' ); ?></label>
<p class="description"><?php	 	 _e( 'Note: Neither of these options blocks access to your site &mdash; it is up to search engines to honor your request.' ); ?></p>
<?php	 	 do_action('blog_privacy_selector'); ?>
</fieldset></td>
</tr>
<?php	 	 do_settings_fields('privacy', 'default'); ?>
</table>

<?php	 	 do_settings_sections('privacy'); ?>

<?php	 	 submit_button(); ?>
</form>

</div>

<?php	 	 include('./admin-footer.php') ?>
