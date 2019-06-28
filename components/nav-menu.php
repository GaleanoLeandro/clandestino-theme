<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <div class="container">
        <?php
            if (has_custom_logo()) :
                the_custom_logo();
            else:
                echo '<a class="navbar-brand text-w-2" href="'.esc_url(home_url('/')).'">'.get_bloginfo('name').'</a>';
            endif;
        ?>

        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php
            if (has_nav_menu('main_menu')):
                wp_nav_menu(array(
                    'theme_location'  => 'main_menu',
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'container_id'    => 'navbarSupportedContent',
                    'menu_class'      => 'navbar-nav',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ));
            endif;
        ?>

    </div>
</nav>