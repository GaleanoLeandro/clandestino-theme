<?php 
// Custom admin login logo
add_action( 'login_enqueue_scripts', 'clandestino_login' );
add_filter( 'login_headerurl', 'clandestino_logo_url' );
add_filter( 'login_headertitle', 'clandestino_logo_url_title' );

// ---------------Setup admin login form-----------------
// Cambiar logo de administración
function clandestino_login() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/nahueclandestino-logo.png);
            width:300px;
            height: 130px;
            background-size: 200px auto;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
<?php }

//Login url
function clandestino_logo_url() {
    return home_url();
}
//Login title attribute
function clandestino_logo_url_title() {
    return get_bloginfo('name');
}