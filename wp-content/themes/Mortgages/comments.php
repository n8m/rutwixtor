<div class="com">



<?php	 	 // Do not delete these lines

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die ('Please do not load это page directly. Thanks!');



	if (!empty($post->post_password)) { // if there's a password

		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // и it doesn't match the cookie

			?>



			<p class="nocomments">Эта публикация защищена паролем. Пожалуйста, введите его для просмотра комментариев.</p>



			<?php	 	

			return;

		}

	}



	/* This variable is for alternating comment background */

	$oddcomment = 'class="alt" ';

?>



<!-- You can start editing here. -->



<?php	 	 if ($comments) : ?>

	<div class="clr">&nbsp;</div>

	<h3 id="comments" class="block"><?php	 	 comments_number('Нет ответов', '1 комментарий', '% комментариев' );?> to &#8220;<?php	 	 the_title(); ?>&#8221;</h3>

	<ol class="list-4">



	<?php	 	 foreach ($comments as $comment) : ?>



		<li <?php	 	 echo $oddcomment; ?>id="comment-<?php	 	 comment_ID() ?>">

        	<div class="com-header">

				<?php	 	 echo get_avatar( $comment, 48); ?>



                <p class="tp">

                    <span><?php	 	 comment_author_link() ?></span>

                    <?php	 	 if ($comment->comment_approved == '0') : ?>

                    <em>Спасибо! Ваш комментарий ожидает проверки..</em>

                    <?php	 	 endif; ?>

                    

        

                    <small class="commentmetadata"><a href="#comment-<?php	 	 comment_ID() ?>" title=""><?php	 	 comment_date('F jS, Y') ?> at <?php	 	 comment_time() ?></a> <?php	 	 edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

				</p>

                <div class="clear"></div>

            </div>

	

			<?php	 	 comment_text() ?>

		</li>



	<?php	 	

		/* Changes every other comment to a different class */

		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';

	?>



	<?php	 	 endforeach; /* end for each comment */ ?>



	</ol>



 <?php	 	 else : // это is displayed if there are нет комментариев so far ?>



	<?php	 	 if ('open' == $post->comment_status) : ?>

		<!-- If comments are open, but there are нет комментариев. -->



	 <?php	 	 else : // comments закрыты ?>

		<!-- If comments закрыты. -->

		<p class="nocomments">Комментарии закрыты.</p>



	<?php	 	 endif; ?>

<?php	 	 endif; ?>

</div>



<div class="reply">



<?php	 	 if ('open' == $post->comment_status) : ?>



<h3 id="respond" class="title-2 block">Leave a Reply</h3>



<?php	 	 if ( get_option('comment_registration') && !$user_ID ) : ?>

<p>You must be <a href="<?php	 	 echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php	 	 echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php	 	 else : ?>



<form action="<?php	 	 echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">



<?php	 	 if ( $user_ID ) : ?>



<p>Вы вошли как <a href="<?php	 	 echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php	 	 echo $user_identity; ?></a>. <a href="<?php	 	 echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Выйти с этого аккаунта">Log out &raquo;</a></p>



<?php	 	 else : ?>



<p><input type="text" name="author" id="author" value="<?php	 	 echo $comment_author; ?>" size="22" tabindex="1" />

<label for="author" class="author">Имя<?php	 	 if ($req) echo "*"; ?></label></p>



<p><input type="text" name="email" id="email" value="<?php	 	 echo $comment_author_email; ?>" size="22" tabindex="2" />

<label for="email" class="email">Почта<?php	 	 if ($req) echo "*"; ?> (никто не увидит)</label></p>



<p><input type="text" name="url" id="url" value="<?php	 	 echo $comment_author_url; ?>" size="22" tabindex="3" />

<label for="url" class="website">Сайт</label></p>



<?php	 	 endif; ?>



<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php	 	 echo allowed_tags(); ?></code></small></p>-->



<p><textarea name="comment" id="comment" rows="10" tabindex="4" cols="<?php	 	 if (get_option('tn_column_number') == '3 columns') { echo '70'; } else { echo '92'; }?>"></textarea></p>



<p><input name="submit" type="submit" id="submit" tabindex="5" value="Добавить" />

<input type="hidden" name="comment_post_ID" value="<?php	 	 echo $id; ?>" />

</p>

<?php	 	 do_action('comment_form', $post->ID); ?>



</form>



<?php	 	 endif; // If registration required и not logged in ?>



<?php	 	 endif; // if you delete это the sky will fall on your head ?>



</div>
