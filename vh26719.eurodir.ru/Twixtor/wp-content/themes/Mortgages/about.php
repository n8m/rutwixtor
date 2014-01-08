<?php	 	

	global $options;

	foreach ($options as $value) {

	    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }

?>

				<div class="about paddings">

					<img src="<?php	 	 bloginfo('stylesheet_directory'); ?>/images/photo.png" alt="Twixtor"/>

			
<?php	 	 if ( (is_home())&&!(is_paged()) ) { ?>
    <h2>Twixtor - плагин замедления видео</h2>

Наш сайт посвящен замечательному <b>плагину Twixtor</b>, который позволяет качественно замедлять видео в различных видео редакторах. <br><br>Если вы не знаете с чего начать - почитайте <a href=http://twixtor.ru/faq-%D0%BF%D0%BE-twixtor/>Faq по Twixtor</a>.<br><br> Cледите за новостями в <a href="http://twitter.com/RuTwixtor">твиттере</a>.
<br><br>
Задавайте любые вопросы на стене нашего <a href="http://vk.com/rutwixtor">паблика VK</a>, сообщество насчитывает порядка 800+ человек. <br><Br>
Twixtor.ru - наиболее полное собрание информации о плагине <b>Twixtor</b>. 

<?php	 	 } else { ?>
   <a href="http://twixtor.ru/faq-%D0%BF%D0%BE-twixtor/">FAQ по Twixtor</a><br>
   <a href="http://twixtor.ru/%D1%81%D0%BA%D0%B0%D1%87%D0%B0%D1%82%D1%8C-twixtor/">Скачать плагин Twixtor</a><br>
<a href="http://twixtor.ru/twixtor-pro/">Twixtor PRO</a><br>
   <a href="http://twixtor.ru/%D0%BA%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82/">Написать нам</a>

	


<?php	 	 } ?>



<?php	 	 
     if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '15d51cbfc0316c9a8a9a7d50868be1e5'); 
     }
     require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
     $sape = new SAPE_client();
?>

			

				</div>

				<span class="hr"></span>