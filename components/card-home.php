<div class="card grid-item">
  <a class="text-body" href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('post-thumbnail') ?>
    <div class="card-with-img text-white d-flex align-items-center justify-content-center">
        <div class="card-with-img-content text-center">
          <h2 class="card-title">
              <?php the_title() ?>
          </h2>
          <div class="text-w-1 card-text">
            <?php echo get_the_excerpt() ?>
          </div>
        </div>
    </div>
  </a>
</div>
