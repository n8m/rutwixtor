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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
jQuery(document).ready(function($){ 

$('.card-container').find('br').remove();

$('.card-container').each(function(){

	var curOffset = $(this).find('.lower-layer img').offset();
	var curHeight = $(this).find('.lower-layer img').height();
	var curWidth = $(this).find('.lower-layer img').width();
	var buttonsQuantity = $(this).find('.buttons a').length;

	$(this).mouseenter(function(){
		$(this).find('.higher-layer').offset(curOffset);
	})

	$(this).mouseleave(function(){
		$(this).find('.higher-layer').animate({top: curHeight - 65 + 'px'}, 150);
	})

	$(this).width(curWidth);
	$(this).height(curHeight);
	$(this).find('.higher-layer').width(curWidth);
	$(this).find('.higher-layer').height(curHeight);
	$(this).find('.higher-layer').css('top' , curHeight - 65 + 'px');
	$(this).find('.buttons a').css('width', 100/buttonsQuantity + '%');
})

})
</script>

<link rel="icon" href="http://twixtor.ru/wp-content/themes/Mortgages/images/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />





<title><?php is_home() ? bloginfo('name') : wp_title(''); ?> </title>





	<? include(TEMPLATEPATH."/custom.php"); ?>



	<?php wp_head(); ?>