<?php
require 'inc/constants.php';

add_action( 'after_setup_theme', 'kagami_setup' );
function kagami_setup() {
    load_theme_textdomain( 'kagami', get_template_directory() . '/languages' );
    register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'kagami' ),
			'social' => __( 'Social Links Menu', 'kagami' ),
		)
    );
    add_theme_support(
		'custom-logo',
		array(
            'height'     => 50,
            'width'      => 300,
			'flex-width' => true,
		)
    );
    // add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
    );
    load_theme_textdomain( 'kagami' );
}

//
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/class-kagami-walker-comment.php';


function kagami_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'kagami', array(
        'title' => __( 'Kagami Settings', 'kagami' ),
        'description' => __( 'Kagami Settings', 'kagami'  ),
        'panel' => '', // Not typically needed.
        'priority' => 160,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    $wp_customize->add_section( 'footer', array(
        'title' => __( 'Footer', 'kagami' ),
        'description' => __( 'Footer', 'kagami'  ),
        'panel' => '', // Not typically needed.
        'priority' => 161,
        'capability' => 'edit_theme_options',
        'theme_supports' => '', // Rarely needed.
    ));
    $wp_customize->add_setting( 'primary_color', array(
        'default' => '#6b7dd6',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting( 'text_color', array(
        'default' => '#333',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting( 'footer_gradient_start_color', array(
        'default' => '#6b7dd6',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting( 'footer_gradient_end_color', array(
        'default' => '#001689',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_setting( 'footer_slogan', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting( 'icp_number', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting( 'footer_extra', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label' => __( 'Primary Color', 'kagami' ),
        'section' => 'colors',
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'label' => __( 'Text Color', 'kagami' ),
        'section' => 'colors',
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_gradient_start_color', array(
        'label' => __( 'Footer Color Start', 'kagami' ),
        'section' => 'footer',
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_gradient_end_color', array(
        'label' => __( 'Footer Color End', 'kagami' ),
        'section' => 'footer',
    )));
    $wp_customize->add_control( 'footer_slogan', array(
        'label' => __( 'Footer Slogan', 'kagami' ),
        'type' => 'text',
        'section' => 'footer',
    ));
    $wp_customize->add_control( 'icp_number', array(
        'label' => __( 'ICP Number', 'kagami' ),
        'type' => 'text',
        'section' => 'footer',
    ));
    $wp_customize->add_control( 'footer_extra', array(
        'label' => __( 'Extra Content', 'kagami' ),
        'type' => 'text',
        'section' => 'footer',
    ));
}
add_action('customize_register', 'kagami_customize_register');



add_action( 'wp_enqueue_scripts', 'kagami_scripts' );
function kagami_scripts() {
    $variables_version = md5_file( get_theme_file_path( '/assets/css/variables.css.php' ) );
    wp_enqueue_style( 'kagami-variables', admin_url( 'admin-ajax.php' ).'?action=dynamic_css', array(), $variables_version );
    wp_enqueue_style( 'kagami-style', get_theme_file_uri( '/assets/css/style.css' ));
    wp_enqueue_style( 'font-awesome', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css' );
}


add_filter( 'excerpt_length', 'kagami_excerpt_length' );
function kagami_excerpt_length( $length ) {
    return 70;
}


add_filter( 'excerpt_more', 'kagami_excerpt_more' );
function kagami_excerpt_more( $more ) {
    return "...";
}

add_filter( 'comment_excerpt_length', 'kagami_comment_excerpt_length' );
function kagami_comment_excerpt_length( $length ) {
    return 70;
}


add_action( 'wp_ajax_dynamic_css', 'kagami_dynamic_css' );
add_action( 'wp_ajax_nopriv_dynamic_css', 'kagami_dynamic_css' );
function kagami_dynamic_css() {
    require get_theme_file_path( '/assets/css/variables.css.php' );
    exit;
}

add_filter( 'get_the_archive_title', 'kagami_archive_title' );
function kagami_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
    return $title;
}
?>