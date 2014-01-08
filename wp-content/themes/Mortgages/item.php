								<h2>

									<?php	 	 if (is_home()) { ?>

										<a href="<?php	 	 the_permalink() ?>" title="<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a>

									<?php	 	 } else { ?>

										<?php	 	 the_title(); ?>

									<?php	 	 } ?>

								</h2>

								<div class="info">

									<?php	 	 if (is_home() || is_single()) { ?>

				<em>

					<?php	 	 the_time('jS F, Y') ?> |

							
									<?php	 	 comments_number('нет комментариев', '1 comment', '% comments', 'comments'); ?> | 
<?php	 	 if(function_exists('the_views')) { the_views(); } ?>   </em>
									<?php	 	 } ?>

								</div>

																<!-- Put this div tag to the place, where the Like block will be -->


								<?php	 	 the_content('Читать далее &raquo;'); ?>

								<div class="clear"></div>



								

								<div class="info" style="background-color:#99ff99;">

									<?php	 	 if (is_home() || is_single()) { ?>

									
									Рубрика: <?php	 	 the_category(', ') ?><br>
									

									Тэги: <?php	 	 the_tags(' ') ?>

									<?php	 	 } ?>

									

									<?php	 	 edit_post_link('Править', '<span class="edit bl">', '</span>'); ?>

								</div>

								
