<?php header( 'Content-Type: text/css')  ?>
<?php header( 'Etag: ' . md5_file( __FILE__ ) )?>

:root {
    --primary-color: <?php echo get_theme_mod('primary_color', '#6b7dd6'); ?>;
    --primary-hover-color: <?php echo get_theme_mod('primary_hover_color', '#525c8c'); ?>;
    --text-color: <?php echo get_theme_mod('text_color', '#333'); ?>;
    --link-color: <?php echo get_theme_mod('link_color', '#4160ff'); ?>;
    --white-color: <?php echo get_theme_mod('white_color', '#f7f7f7'); ?>;
    --sans-serif-font-family: <?php echo get_theme_mod('sans_serif_font_family', '-apple-system,BlinkMacSystemFont,opensans,Optima,"Source Han Sans CN","Noto Sans CJK SC","Microsoft Yahei",sans-serif'); ?>;
    --serif-font-family: <?php echo get_theme_mod('serif_font_family', '"Source Han Serif CN", Cambria, Georgia, Cochin, "Times New Roman", Times, serif;'); ?>;
    --logo-image: url(<?php echo kagami_get_theme_mod_image_url('logo_image', '../images/lab_logo_hori_white.png') ?>);
    --footer-gradient-start-color: <?php echo get_theme_mod('footer_gradient_start_color', '#6b7dd6'); ?>;
    --footer-gradient-end-color: <?php echo get_theme_mod('footer_gradient_end_color', '#001689'); ?>;
    --fill-background-image: url(<?php echo kagami_get_theme_mod_image_url('fill_background_image', '../images/light_toast.png'); ?>);
}