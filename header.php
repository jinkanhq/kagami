<?php
$keywords = get_theme_mod('seo_keywords', get_bloginfo('name')) ;
$description = get_theme_mod('seo_description', get_bloginfo('description'));
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<meta name="format-detection" content="telphone=no, email=no">
		<meta name="keywords" content="<?php echo $keywords ?>">
		<meta name="description" itemprop="description" content="<?php echo $description ?>">
		<?php wp_head(); ?>
	</head>
    <body>
	<header class="topbar">
		<div class="container">
			<?php printf('<a href="%1$s" title="%2$s" class="logo-link">', get_bloginfo('wpurl'), get_bloginfo('name')) ?>
				<h1 class="logo"><?php echo get_bloginfo('name') ?></h1>
			</a>
			<nav class="topnav">
				<ul>
				<?php if ( has_nav_menu( 'top' ) ) {
					wp_nav_menu(
						array(
							'container'  => '',
							'items_wrap' => '%3$s',
							'theme_location' => 'top',
						)
					);
				} ?>
				</ul>
			</nav>
		</div>
	</header><!-- kagami:topbar -->