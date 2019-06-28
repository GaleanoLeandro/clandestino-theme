<?php 

add_action( 'admin_menu', 'remove_menus' );

add_action( 'wp_before_admin_bar_render', 'remove_menus_admin_bar' );

function remove_menus() {
  if( !current_user_can('administrator') ) {
    // remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    // remove_menu_page( 'edit.php' );                   //Posts
    // remove_menu_page( 'upload.php' );                 //Media
    // remove_menu_page( 'edit.php?post_type=page' );    //Pages
    // remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    // remove_menu_page( 'options-general.php' );        //Settings
  }
  remove_menu_page( 'edit-comments.php' );          //Comments
}

function remove_menus_admin_bar() {
  global $wp_admin_bar;

  /*
  
  */

  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('comments');
}
