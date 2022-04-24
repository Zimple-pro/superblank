<?php
add_action("after_setup_theme","superblank_theme_supports");
function superblank_theme_supports(){
    add_theme_support('title-tag');
    add_theme_support( 'automatic-feed-links' );
    load_theme_textdomain( 'superblank', get_template_directory() . '/languages' );
}

add_action("after_setup_theme", "superblank_add_menus");
function superblank_add_menus(){
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'superblank' ),
        'secondary'  => __( 'Secondary Menu', 'superblank' ),
        'footer'  => __( 'Footer Menu', 'superblank' ),
    ) );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}

function superblank_customizer( $wp_customize ) {
    // $wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section( 'static_front_page' );
    // $wp_customize->remove_panel( 'nav_menus');
    $wp_customize->remove_panel( 'widgets' );
    $wp_customize->remove_section( 'themes' );
    // $wp_customize->remove_control( 'custom_css' );
    // $wp_customize->remove_panel( 'woocommerce' );
}
add_action( 'customize_register', 'superblank_customizer', 10);


add_action("wp_enqueue_scripts","superblank_assets");
function superblank_assets() {
    wp_enqueue_style( 'superblank-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}