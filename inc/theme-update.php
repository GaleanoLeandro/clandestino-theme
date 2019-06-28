<?php
set_site_transient('update_themes', null);
function clandestino_check_update( $transient ) {
  if ( empty( $transient->checked ) ) {
      return $transient;
  }
  $git_user = "GaleanoLeandro";
  $branch_name = "production";
  $theme_data = wp_get_theme(wp_get_theme()->template);
  $theme_slug = $theme_data->get_template();
  $theme_uri_slug = "clandestino-theme";
  
  $remote_version = '0.0.0';
  $style_css = wp_remote_get("https://raw.githubusercontent.com/".$git_user."/".$theme_uri_slug."/".$branch_name."/style.css")['body'];

  if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] )
      $remote_version = _cleanup_header_comment( $match[1] );

  if (version_compare($theme_data->version, $remote_version, '<')) {
      $transient->response[$theme_slug] = array(
          'theme'       => $theme_slug,
          'new_version' => $remote_version,
          'url'         => 'https://github.com/'.$git_user.'/'.$theme_uri_slug,
          'package'     => 'https://github.com/'.$git_user.'/'.$theme_uri_slug.'/raw//'.$branch_name.'/clandestino.zip'
      );
  }
        
  return $transient;
}
add_filter( 'pre_set_site_transient_update_themes', 'clandestino_check_update' );