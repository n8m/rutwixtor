			<div class="span-8 sidebar">

				<?php	 	 include (TEMPLATEPATH . "/about.php"); ?>

				
<div id="vk_groups" class="widget_search paddings"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "200", height: "290"}, 36974540);
</script>

<div class="hr" ></div>

<div class="paddings">

<h3>Спонсоры</h3>

    <?php	 	
 if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '15d51cbfc0316c9a8a9a7d50868be1e5');
     }
     require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php');
    $o['charset'] = 'UTF-8';
    $sape = new SAPE_client($o);
    unset($o);
     echo $sape->return_links();

?>
</div>
<div class='hr'></div>
				<?php	 	 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>

				<!-- VK Widget -->

				
			



				<?php	 	 endif; ?>

			</div>




