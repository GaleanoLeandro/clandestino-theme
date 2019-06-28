<?php

add_filter( 'the_content', 'social_share_buttons', 0);

function social_share_buttons ($content) {
  if ( !is_singular('post') ) return $content;

  $template = '
    <div class="sharebuttons btn-group btn-group-lg d-flex mt-3">
      <a class="btn btn-twitter" href="https://twitter.com/share?url='. get_permalink() .'" target="_blank"><i class="fab fa-twitter"></i> <span>Tweet</span></a>
      <a class="btn btn-facebook" href="http://www.facebook.com/sharer.php?u='. get_permalink() .'" target="_blank"><i class="fab fa-facebook-f"></i> <span>Share</span></a>
    </div>
  ';

  $content .= $template;

  return $content;
}
