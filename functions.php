<?php

if(!isset($content_width)) {
  $content_width = 800;
}

add_action( 'wp_enqueue_scripts', 'clandestino_scripts');
add_action( 'after_setup_theme', 'clandestino_setup' );
add_action( 'init', 'clandestino_menus' );
add_action( 'widgets_init', 'clandestino_sidebars' );

if (!function_exists('clandestino_scripts')):
  function clandestino_scripts () {
    wp_register_style('style', get_stylesheet_uri(), null, '1.0.0', 'all');

    wp_register_script( 'font-awesome', 'https://kit.fontawesome.com/1fdb5f9262.js', null, '1.0.0', true);
    wp_register_script( 'libraries', get_template_directory_uri() . '/libraries.js', array('jquery'), '1.0.0', true);
    wp_register_script( 'script', get_template_directory_uri() . '/script.js', array('jquery', 'libraries'), '1.0.0', true);

    wp_enqueue_script('jquery');
    wp_enqueue_script('font-awesome');
    wp_enqueue_script('libraries');
    wp_enqueue_script('script');
    wp_enqueue_style('style');
  }
endif;


if (!function_exists('clandestino_setup')):
  function clandestino_setup() {
    // BACKGROUND PERSONALIZADO
    // add_theme_support( 'custom-background' );
    // LOGO PERSONALIZADO 
    add_theme_support( 'custom-logo', array(
      'height' => 100,
      'width' => 100,
      'flex-height' => true,
      'flex-width' => true
    ));
    // IMAGEN DESTACADA
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'html5', array(
      'search-form',
      'gallery',
      'caption'
    ));

    // Permite que los themes y plugins administren el titulo de la pagina
    add_theme_support( 'title-tag' );

    // Ocultar tags innecesarios del head
    remove_action('wp_head', 'wp_generator');
  }
endif;

if (!function_exists('clandestino_menus')):
  function clandestino_menus() {
    $locations = array(
      'main_menu' => 'Menu Principal',
      'social_menu' => 'Social Links Menú'
      );
    register_nav_menus( $locations );
  }
endif;

if (!function_exists('clandestino_sidebars')):
  function clandestino_sidebars() {
    $main_sidebar_config = array(
      'name' => 'Sidebar Principal',
      'id' => 'main_sidebar',
      'Description' => 'Sidebar ubicado en columna derecha de la pantalla home',
      'before_widget' => '<article class="mb-3">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    );

    $banner_sidebar_config = array(
      'name' => 'Banner ad 1',
      'id' => 'banner_sidebar',
      'Description' => 'Banner publicitario',
      'before_widget' => '<section class="col-12 mb-4 d-flex justify-content-center">',
      'after_widget' => '</section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    );

    register_sidebar($main_sidebar_config);
    register_sidebar($banner_sidebar_config);
  }
endif;

/**
 * Walker for bootstrap nav classes
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Walker for footer nav classes
 */
require_once get_template_directory() . '/inc/class-wp-footer-navwalker.php';

/**
 * Custom login
 */
require_once get_template_directory() . '/inc/custom-login.php';

/**
 * Custom admin
 */
require_once get_template_directory() . '/inc/custom-admin.php';

/**
 * Agrega los botones para compartir en redes sociales al final de cada post.
 */
// require_once get_template_directory() . '/inc/social-share-buttons.php';

/**
 * Funciones de utilidad para el tema, "helpers"
 */
require_once get_template_directory() . '/inc/utils.php';

/**
 * etiqueta meta description diferente segun sección de la pagina
 */
require_once get_template_directory() . '/inc/custom-meta-descriptions.php';

require_once get_template_directory() . '/inc/custom-read-more.php';

// require_once get_template_directory() . '/inc/custom-posts-types.php';

/**
 * Funcion para notificar actualizaciones del tema
 */
require_once get_template_directory() . '/inc/theme-update.php';

/**
 * Google analytics
 */
require_once get_template_directory() . '/inc/analytics.php';


/**
 * Remove Jquery migrate
 */
require_once get_template_directory() . '/inc/remove-jquery-migrate.php';