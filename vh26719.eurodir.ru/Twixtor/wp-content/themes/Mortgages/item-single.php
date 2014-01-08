
	<h2>

									<a href="<?php	 	 the_permalink() ?>" title=" Ссылка на<?php	 	 the_title_attribute(); ?>"><?php	 	 the_title(); ?></a>

								</h2>

								<div class="info">

									<span class="date">Опубликовано <?php	 	 the_time('jS F, Y') ?></span>

									

									<span class="comment"><?php	 	 comments_number('нет комментариев', '1 comment', '% comments', 'comments'); ?></span>

								</div>





								<?php	 	 the_content('Читать далее &raquo;'); ?>

								<div class="clear"></div>



								<div class="info">

									<span class="cat bl"><?php	 	 the_category(', ') ?></span>

									<?php	 	 the_tags('<span class="tag bl">', ', ', '</span>'); ?>

									<?php	 	 edit_post_link('Править', '<span class="edit bl">', '</span>'); ?>

								</div>
