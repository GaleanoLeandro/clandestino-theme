</main>
    <footer class="footer">
        <div class="container-fluid pt-3 pb-1 bg-light shadow">
            <div class="container d-flex flex-column justify-content-between align-items-center">
                <span>
                    &copy; <?php echo get_bloginfo('name') ?>
                </span>
                <?php
                    if (has_nav_menu('social_menu')):
                        wp_nav_menu(array(
                            'theme_location'  => 'social_menu',
                            'container'       => 'nav',
                            'menu_class'      => 'nav navbar-light',
                            'walker'          => new Footer_Walker()
                        ));
                    endif;
                ?>
            </div>    
        </div>
    </footer>
    <?php wp_footer() ?>
</body>
</html>