<?php
$title = $args['title'] ?? get_the_archive_title();
$subtitle = $args['subtitle'] ?? get_the_archive_description();
$description = $args['description'] ?? get_the_archive_description();
$cover_url = $args['cover_url'] ?? KAGAMI_FALLBACK_ARCHIVE_COVER_URL;
$has_button = $args['has_button'] ?? false;
$button_text = $args['button_text'] ?? '';
$button_link = $args['button_link'] ?? '/';
$button_attributions = $args['button_attributions'] ?? '';
?>

<div class="hero">
    <div class="hero-box">
        <div class="container">
            <header class="post-cover" style="background-image: url(<?php echo $cover_url ?>)">
                <div class="post-overlay"></div>
                <div class="content">
                    <div class="post-title-group">
                        <a class="post-title-link" href="javascript:;"><h2 class="post-title"><?php echo $title ?></h2></a>
                        <div class="post-meta"><?php echo $subtitle ?></div>
                    </div>
                </div>
            </header>
            <div class="hero-box-summary">
                <?php echo $description ?>
                <?php
                if ( $has_button ) {
                    printf( '<a class="btn" href="%1$s" %2$s>%3$s</a>', $button_link, $button_attributions, $button_text );
                }
                ?>
            </div>
        </div>
    </div><!-- kagami:archive:hero-box -->
    <div class="hero-background-wrapper">
        <div class="hero-background" style="background-image: url(<?php echo $cover_url ?>)"></div>;
    </div>
</div><!-- kagami:archive:hero-->