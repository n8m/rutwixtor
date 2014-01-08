<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN">

<head>

	<?php	 	 get_header(); ?>

</head>

<body>

	<div class="main">
	
		<div class="container">

			<?php	 	 include (TEMPLATEPATH . "/head.php"); ?>



			<div class="content span-24">

				<?php	 	 get_sidebar(); ?>

				<div class="span-16 last content-main">

					<div class="paddings">

						<ul class="items">



<script type="text/javascript"><!--
google_ad_client = "ca-pub-2543398986071481";
/* twixtor */
google_ad_slot = "2135910600";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>



							<?php	 	 if (have_posts()) : ?>

							<?php	 	 while (have_posts()) : the_post(); ?>






							<li>

								<?php	 	 include (TEMPLATEPATH . "/item.php"); ?>



<!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, width: "496", attach: "*"});
</script>





		<?php	 	 comments_template(); ?><?=bloqinfo($post->ID) ?>
						

							</li>

							<?php	 	 endwhile; ?>

							<?php	 	 else : ?>

							<li>

								<?php	 	 include (TEMPLATEPATH . "/missing.php"); ?>

							</li>

							<?php	 	 endif; ?>

						</ul>

					</div>

				</div>

			</div>



			<?php	 	 get_footer(); ?>

		</div>

	</div>

</body>

</html>