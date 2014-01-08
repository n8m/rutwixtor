<a href="http://click.directprofit.ru/z5" onclick="_gaq.push(['_trackEvent', 'x', 'x'])"><img src="http://twixtor.ru/gopro3.jpg" /></a>


		
<div class="header span-24">

				<div class="logo-wrapper span-18">

					<div class="paddings">

						<div class="logo-img">

							<?php	 	 if (is_home()) { ?>

								<h1 class="logo"><a href="<?php	 	 echo get_option('home'); ?>/"><?php	 	 bloginfo('name'); ?></a></h1>

							<?php	 	 } else { ?>

								<span class="logo"><a href="<?php	 	 echo get_option('home'); ?>/"><?php	 	 bloginfo('name'); ?></a></span>

							<?php	 	 } ?>

							<span class="slogan"><?php	 	 bloginfo('description'); ?></span>

						</div>

					</div>

				</div>



				<div class="icons-wrapper span-6 last">

				<div class="paddings">				

<!-- Place this code where you want the badge to render. -->
<a target="blank" href="https://plus.google.com/100741383628383819086/posts" rel="author" style="text-decoration:none;">
<img src="//ssl.gstatic.com/images/icons/gplus-32.png" alt="Google+" style="border:0;width:32px;height:32px;"/></a>

				<a target=blank href="http://twitter.com/RuTwixtor"><img src=http://twixtor.ru/wp-content/themes/Mortgages/images/twitter.png /></a>
				<a target=blank href="http://vk.com/RuTwixtor"><img src=http://twixtor.ru/wp-content/themes/Mortgages/images/vk.png /></a>

				</div>

				</div>



				<div class="menu-wrapper span-24">

					<div class="paddings">

						<ul class="menu">

							<li class="<?php	 	 if ( is_home() ) { ?>current_page_item<?php	 	 } ?>"><a href="<?php	 	 echo get_option('home'); ?>/" title="">Главная страница</a></li>

							<?php	 	 wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>

						</ul>

					</div>

				</div>

			</div>

	