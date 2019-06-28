<div class="hero">
  <?php
    if (has_post_thumbnail()) : 
    the_post_thumbnail('post-thumbnail', array('class' => 'card-img-top'));
    endif;
  ?>
</div>

<div class="container">
  <div class="py-3 d-flex justify-content-center align-items-center">
    <h1 class="mb-0 text-w-3 text-1">
      <b><?php the_title(); ?></b>
    </h1>
  </div>
  <section class="card border-0">
    <div class="card-body p-0">
      <?php the_content(); ?>
    </div>
    <div class="card-footer bg-white border-0 pt-0">
      <?php echo clandestino_display_categories(clandestino_get_categories()) ?>
    </div>
  </section>
</div>

  