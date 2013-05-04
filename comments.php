<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'marthaandtom'); ?></p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="odd" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php just_comments_number(__($id, 'No comments', 'marthaandtom'), __('One comment', 'marthaandtom'), __('% comments', 'marthaandtom'));?> <?php printf(__('on &#8220;%s&#8221;', 'marthaandtom'), the_title('', '', false)); ?></h3>


	<ol class="commentlist">
		<?php wp_list_comments('callback=marthom_comment&type=comment'); ?>
	</ol>

<!--	<ol class="commentlist">
	<h4>Comments</h4>
	<?php foreach ($comments as $comment) : ?>
	<?php $comment_type = get_comment_type(); ?>
	
	
	<?php if ($comment_type == 'comment') { /*List comments first, then trackbacks and pingbacks*/?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<div class="avatar">
				<?php echo get_avatar( $comment, 64 ); ?>
			</div>
			<div class="commentbody">
				<?php printf(__('<span class="commentauthor orange">%s</span>', 'marthaandtom'), get_comment_author_link()); ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'marthaandtom'); ?></em>
				<?php endif; ?>
				<span class="commentmeta grey"><a href="#comment-<?php comment_ID() ?>" title=""><?php printf(__('%1$s at %2$s', 'marthaandtom'), get_comment_date(__('j F, Y', 'marthaandtom')), get_comment_time()); ?></a> <?php edit_comment_link(__('edit', 'marthaandtom'),'&nbsp;&nbsp;',''); ?></span>
				<br />
	
	
				<?php comment_text() ?>
			</div>
			<?php comment_reply_link(); ?>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="odd" ' : '';
	?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>

	</ol>-->


	<ol class="commentlist">
	<?php foreach ($comments as $comment) : ?>
	<?php $comment_type = get_comment_type(); ?>
	<?php if ($comment_type != 'comment') {
	 $showpings = 1; } ?>
	<?php endforeach; ?>
	<?php if ($showpings == 1) { ?>
		<h4>Posts linking to this post</h4>
	<?php }; ?>
	
	<?php foreach ($comments as $comment) : ?>
	<?php $comment_type = get_comment_type(); ?>
	<?php if ($comment_type != 'comment') { ?>


		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<div class="avatar">
				<?php echo get_avatar( $comment, 64 ); ?>
			</div>
			<div class="commentbody">
				<?php printf(__('<span class="commentauthor orange">%s</span>', 'marthaandtom'), get_comment_author_link()); ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'marthaandtom'); ?></em>
				<?php endif; ?>
				<span class="commentmeta grey"><a href="#comment-<?php comment_ID() ?>" title=""><?php printf(__('%1$s at %2$s', 'marthaandtom'), get_comment_date(__('j F, Y', 'marthaandtom')), get_comment_time()); ?></a> <?php edit_comment_link(__('edit', 'marthaandtom'),'&nbsp;&nbsp;',''); ?></span>
				<br />
	
	
				<?php comment_text() ?>
			</div>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="odd" ' : '';
	?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>

	</ol>
	

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : /*comments are closed*/ ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'marthaandtom'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php 
$commentargs = array(
		'comment_field' => '<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>',
		'comment_notes_before' => '',
        'comment_notes_after' => '<p class="post-info">Don\'t have a little picture next to your comments? Get a <a href="http://www.gravatar.com/">gravatar here</a>.</p>',
		'fields' => apply_filters( 'comment_form_default_fields', array('author' => '<p><input type="text" name="author" id="author" value="'.$comment_author.'" placeholder="name" tabindex="1"'. (($req) ? 'aria-required="true"':'').' />'
																					.'<label for="author">'. (($req) ? '(required)':'').'</label></p>',
																		'email' => '<p><input type="text" name="email" id="email" value="'. $comment_author_email .'" placeholder="email" tabindex="2"'.(($req) ? 'aria-required="true"':''). '/>'.
																				   '<label for="email">'.(($req)? "(required)":'').' <em>will not be published</em></label></p>',
																		'url' => '<p><input type="text" name="url" id="url" value="'.$comment_author_url.'" placeholder="website" tabindex="3" />
																		<label for="url"></label></p>') 
								)
		);
comment_form($commentargs); ?>

<!--old comments form-->

