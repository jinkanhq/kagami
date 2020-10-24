<div class="container post-list">
    <?php
    if( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            if ( ! is_archive() && is_sticky() ) {
                continue;
            }
            get_template_part( 'template-parts/post-cover' ); 
        }
    }
    ?>
</div>    