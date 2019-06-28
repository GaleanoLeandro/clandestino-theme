<?php

function clandestino_custom_meta_description() {
  if (is_home() || is_front_page()) {
    $description = get_bloginfo('description');
  } else if (is_category() || is_tag()) {
    $description = strip_tags(term_description());
  } else if (is_single()) {
    /**
     * ANDA MAL, ARREGLAR
     */
    global $post;
    // Obtengo el excerpt, si no existe obtengo el contenido
    $excerpt = has_excerpt($post->ID) ? get_the_excerpt() : wp_trim_excerpt($post->post_content);
    // Formateo espacios en blanco al inicio y al final
    $description = trim(strip_tags($excerpt));
    // Elimino los espacios dobles
    $description = preg_replace('/\s+/', ' ', $description);
    // Limito la cantidad de caracteres a mostrar
    $description = substr($description, 0, 200);
  } else if (is_page()) {
    /**
     * ANDA MAL, ARREGLAR
     */
    $description = get_the_excerpt();
  } else if (is_author()) {
    $description = get_the_author_meta();
  } else if (is_search()) {
    $description = 'Resultados de busqueda para:' . get_search_query();
  } else if (is_404()) {
    $description = 'Error 404: no encontrado.' . get_bloginfo('description');
  } else {
    $description = get_bloginfo('description');
  }

  // Convierte caracteres especiales en entidades HTML, ej : Comillas dobles en &quot;
  $description = htmlspecialchars($description);
  echo $description;
}
