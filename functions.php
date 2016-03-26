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



//a modification of comments popup link to exclude trackbacks/pingbacks from displayed total
function just_comments_popup_link( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
	global $wpcommentspopupfile, $wpcommentsjavascript;

	$id = get_the_ID();

	if ( false === $zero ) $zero = __( 'No Comments' );
	if ( false === $one ) $one = __( '1 Comment' );
	if ( false === $more ) $more = __( '% Comments' );
	if ( false === $none ) $none = __( 'Comments Off' );

	//$number = get_comments_number( $id );
	$ping_count = $number = 0;
	$comments = get_comments( $id );
	foreach ( $comments as $comment )
	get_comment_type($comment) == "comment" ? ++$number : ++$ping_count;

	if ( 0 == $number && !comments_open() && !pings_open() ) {
		echo '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
		return;
	}

	if ( post_password_required() ) {
		echo __('Enter your password to view comments.');
		return;
	}

	echo '<a href="';
	if ( $wpcommentsjavascript ) {
		if ( empty( $wpcommentspopupfile ) )
			$home = home_url();
		else
			$home = get_option('siteurl');
		echo $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
		echo '" onclick="wpopen(this.href); return false"';
	} else { // if comments_popup_script() is not in the template, display simple comment link
		if ( 0 == $number )
			echo get_permalink() . '#respond';
		else
			comments_link();
		echo '"';
	}

	if ( !empty( $css_class ) ) {
		echo ' class="'.$css_class.'" ';
	}
	$title = the_title_attribute( array('echo' => 0 ) );

	echo apply_filters( 'comments_popup_link_attributes', '' );

	echo ' title="' . esc_attr( sprintf( __('Comment on %s'), $title ) ) . '">';
	just_comments_number( $id, $zero, $one, $more );
	echo '</a>';
}

//count just comments, not pingbacks and trackbacks
function just_comments_number( $id, $zero = false, $one = false, $more = false, $deprecated = '' ) {
	if ( !empty( $deprecated ) )
		_deprecated_argument( __FUNCTION__, '1.3' );


	//$number = get_comments_number($id);
	$ping_count = $number = 0;
	$comments = get_comments(array('post_id' => $id));
	foreach ( $comments as $comment )
	get_comment_type($comment) == "comment" ? ++$number : ++$ping_count;

	if ( $number > 1 )
		$output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments') : $more);
	elseif ( $number == 0 )
		$output = ( false === $zero ) ? __('No Comments') : $zero;
	else // must be one
		$output = ( false === $one ) ? __('1 Comment') : $one;

	echo apply_filters('comments_number', $output, $number);
}

//More results for archive and search pages
add_action( 'pre_get_posts', 'my_post_queries' );
function my_post_queries( $query ) {

	// if not a wp-admin page and it is the main query
	if ( !is_admin() && $query->is_main_query() ) {

		// if not the home page
		if ( ! is_home() ) {

			// set posts_per_page to 99 posts
			$query->set( 'posts_per_page', 10 );
		}

	}
}

?>
