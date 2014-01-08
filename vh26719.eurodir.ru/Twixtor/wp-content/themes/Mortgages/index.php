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

							<?php	 	 if (have_posts()) : ?>

							<?php	 	 while (have_posts()) : the_post(); ?>

							<li>

								<?php	 	 include (TEMPLATEPATH . "/item.php"); ?>

							</li>

							<?php	 	 endwhile; ?>

							<?php	 	 else : ?>

							<li>

								<?php	 	 include (TEMPLATEPATH . "/missing.php"); ?>

							</li>

							<?php	 	 endif; ?>

							<?php	 	 if (next_posts_link() || previous_posts_link()) { ?>

							<li>

								<div class="navigation">

									<div class="fl"><?php	 	 next_posts_link('Раньше') ?></div>

			                        <div class="fr"><?php	 	 previous_posts_link('Позже') ?></div>

		                        </div>

		                    </li>

		                    <?php	 	 } ?>

						</ul>

					</div>

				</div>

			</div>

			<?php	 	 get_footer(); ?>

		</div>

	</div>

</body>

</html>