<?php
$theme = wp_get_theme();

define( 'KAGAMI_VERSION', $theme->Version );
define( 'KAGAMI_REPO', 'https://github.com/jinkanhq/kagami' );
define( 'KAGAMI_FALLBACK_COVER_URL', get_theme_file_uri( '/assets/images/fallback_cover.jpg' ) );
define( 'KAGAMI_FALLBACK_PAGE_NOT_FOUND_COVER_URL', get_theme_file_uri( '/assets/images/fallback_archive_cover.jpg' ) );
define( 'KAGAMI_FALLBACK_AUTHOR_COVER_URL', get_theme_file_uri( '/assets/images/fallback_author_cover.jpg' ) );
define( 'KAGAMI_FALLBACK_CATEGORY_COVER_URL', get_theme_file_uri( '/assets/images/fallback_archive_cover.jpg' ) );
define( 'KAGAMI_FALLBACK_TAG_COVER_URL', get_theme_file_uri( '/assets/images/fallback_archive_cover.jpg' ) );
?>