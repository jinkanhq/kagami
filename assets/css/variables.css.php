<?php 
header( 'Content-Type: text/css');
header( 'Etag: ' . md5( filemtime( __FILE__ ) ) );
$use_jsdelivr = get_theme_mod('use_jsdelivr', false);
$jsdelivr_font_base_path = 'https://cdn.jsdelivr.net/gh/jinkanhq/kagami@v' . KAGAMI_VERSION . '/assets/fonts/';
$font_base_path = $use_jsdelivr ? $jsdelivr_font_base_path : get_template_directory_uri() . '/assets/fonts/';
?>

:root {
    --primary-color: <?php echo get_theme_mod('primary_color', '#6b7dd6'); ?>;
    --primary-hover-color: <?php echo get_theme_mod('primary_hover_color', '#525c8c'); ?>;
    --text-color: <?php echo get_theme_mod('text_color', '#333'); ?>;
    --link-color: <?php echo get_theme_mod('link_color', '#4160ff'); ?>;
    --white-color: <?php echo get_theme_mod('white_color', '#f7f7f7'); ?>;
    --sans-serif-font-family: <?php echo get_theme_mod('sans_serif_font_family', '"Source Han Sans CN", sans-serif'); ?>;
    --serif-font-family: <?php echo get_theme_mod('serif_font_family', '"Source Han Serif CN", serif;'); ?>;
    --logo-image: url(<?php echo kagami_get_theme_mod_image_url('logo_image', '../images/lab_logo_hori_white.png') ?>);
    --footer-gradient-start-color: <?php echo get_theme_mod('footer_gradient_start_color', '#6b7dd6'); ?>;
    --footer-gradient-end-color: <?php echo get_theme_mod('footer_gradient_end_color', '#001689'); ?>;
    --fill-background-image: url(<?php echo kagami_get_theme_mod_image_url('fill_background_image', '../images/light_toast.png'); ?>);
}

@font-face {
    font-family: 'Source Han Sans CN';
    font-weight: 300;
    src: url('<?php echo $font_base_path . 'SourceHanSansCN-Light.woff2'?>');
}

@font-face {
    font-family: 'Source Han Sans CN';
    font-weight: 400;
    src: url('<?php echo $font_base_path . 'SourceHanSansCN-Regular.woff2'?>');
}

@font-face {
    font-family: 'Source Han Serif CN';
    font-weight: 300;
    src: url('<?php echo $font_base_path . 'SourceHanSerifCN-Light.woff2'?>');
}

@font-face {
    font-family: 'Source Han Serif CN';
    font-weight: 500;
    src: url('<?php echo $font_base_path . 'SourceHanSerifCN-Medium.woff2'?>');
}
