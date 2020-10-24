<?php wp_footer(); ?>
<div class="footer-holder"></div>
<footer class="bottom">
    <div class="footer-logo"></div>
    <?php 
    $footer_slogan = get_theme_mod( 'footer_slogan', false );
    $icp_number = get_theme_mod( 'icp_number', false );
    $footer_extra = get_theme_mod( 'footer_extra', false );
    ?>
    <?php if ( $footer_slogan ) { ?>
    <p class="footer-slogan"><?php echo $footer_slogan ?></p>
    <?php } ?>
    <p>&copy; <?php echo date('Y') ?> <a href="<?php bloginfo('wpurl') ?>"><?php bloginfo('name') ?></a>. Some rights reserved. <?php if( $icp_number ) { ?><a href="http://www.beian.miit.gov.cn/"><?php echo $icp_number ?></a><?php } ?></p>
    <?php if ( $footer_extra ) { ?>
    <p><?php echo $footer_extra ?></p>
    <?php } ?>
    <p>Powered by <?php printf('<a href="%1$s">Kagami Theme</a> v%2$s.', KAGAMI_REPO, KAGAMI_VERSION)?></p>
</footer><!-- kagami:footer -->
</body>
</html>