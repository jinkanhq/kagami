<?php
get_header();
?>

<main id="site-content" role="main">
    <div class="hero">
        <div class="hero-box">
            <div class="container">
                <header class="post-cover" style="background-image: url(<?php echo KAGAMI_FALLBACK_PAGE_NOT_FOUND_COVER_URL ?>)">
                <div class="content">
                    <div class="post-title-group">
                        <a class="post-title-link" href="#"><h2 class="post-title"><?php _e( '404: Page not found', 'kagami' ) ?></h2></a>
                        <div class="post-meta">
                            What a pity !
                        </div>
                    </div>
                </div>
                </header>
                <div class="hero-box-summary">
                    <p>Try to search for find life, the universe and everything ?</p>
                    <a class="hero-btn btn" href="/"><?php _e( 'Back to Home', 'kagami' ) ?></a>
                </div>
            </div>
        </div>
        <div class="hero-background-wrapper">
            <div class="hero-background" style="background-image: url(<?php echo KAGAMI_FALLBACK_PAGE_NOT_FOUND_COVER_URL ?>)"></div>;
        </div>
    </div>
    <div class="fill">
    </div>
</main>

<?php
get_footer();
?>