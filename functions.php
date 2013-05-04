<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'before_widget' => '<li>',
	'after_widget' => '</li>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
	));
	
if (function_exists('register_nav_menus'))
 register_nav_menu( 'main', 'main menu' );
 
add_theme_support( 'post-thumbnails' ); 

//Default avatars 
add_filter( 'avatar_defaults', 'newgravatar' );  
  
function newgravatar ($avatar_defaults) {  
    $myavatar = 'http://www.marthaandtom.com/images/defaultgravatar.png';  
    $avatar_defaults[$myavatar] = "Martha and Tom Default";  
    return $avatar_defaults;  
}   

//Twitter card details
add_filter( 'twitter_cards_properties', 'twitter_custom' );

function twitter_custom( $twitter_card ) {
	if ( is_array( $twitter_card ) ) {
		$twitter_card['creator'] = '@marthaandtom';
		$twitter_card['creator:id'] = '47331980';
	}
	return $twitter_card;
}


function marthom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
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
			<?php if($args['max_depth']!=$depth) { ?>
				<div class="reply">
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			<?php } ?>
		</div>

	</li>
	<?php
}

?>
