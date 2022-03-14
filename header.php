<!DOCTYPE html>

<html>

	<head>
		<title>
			<?php
				if(is_home()): echo bloginfo();
				else: wp_title('',true) ?> | <?php bloginfo('name');
				endif;?>
			</title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url')?>/img/mandt_icon.png" />
		<link rel="apple-touch-icon" href="<?php bloginfo('template_url')?>/img/iphone-icon.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url')?>/img/ipad-icon.png" />
		<meta name="verify-v1" content="6d75eGz8VNZ2GOQQxWvDYcunHcVEhW9oqDUiupoNFf4=" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8">
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			  wp_head();
		?>
	</head>

	<body <?php if(is_user_logged_in()): echo('class="logged-in"'); endif;?> >
		<div class="header clearfix">
			<h1><a href="<?php bloginfo('url');?>">Martha<span class="plus">+</span>Tom</a></h1>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
