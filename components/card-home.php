<div class="card">
  <a class="text-body" href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('medium_large') ?>
    <div class="card-with-img text-white d-flex align-items-center justify-content-center">
        <div class="card-with-img-content text-center">
          <h2 class="card-title m-0 text-w-1">
              <?php the_title() ?>
          </h2>
        </div>
    </div>
  </a>
</div>
