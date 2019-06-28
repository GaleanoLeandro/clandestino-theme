<div class="container my-4">
  <div class="pb-3 d-flex justify-content-between align-items-center">
    <h1 class="mb-0">
      <b><?php the_title(); ?></b>
    </h1>
  </div>

  <div class="row">
    <div class="col-md-12 mb-5">
      <?php
        if (has_post_thumbnail()) : 
        the_post_thumbnail('post-thumbnail', array('class' => 'img-cover img-hero card-img-top'));
        endif;
      ?>
    </div>
    <div class="col-md-10 offset-md-1">
      <section>
          <?php the_content(); ?>
      </section>
    </div>
  </div>

</div>