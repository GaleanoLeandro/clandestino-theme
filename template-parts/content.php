<div class="container my-4">
    <div class="pb-3 px-3 d-flex justify-content-center align-items-center">
        <h1 class="text-2 text-w-1 text-center">
            <?php bloginfo('description'); ?>
        </h1>
    </div>
    <div class="masonry">
        <?php 
            if (have_posts()) : while (have_posts()) : the_post();
                get_template_part( './components/card', 'home' ); 
            endwhile;
            else:
                //Si no encuentra ningun post
                // get_template_part( 'content', '404' );
            endif;
            // rewind_posts();
        ?>
    </div>
</div>