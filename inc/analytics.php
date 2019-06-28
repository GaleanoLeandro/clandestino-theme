<?php
function clandestino_google_analytics() { 
    if (!is_user_logged_in()) {
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107184298-4"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-107184298-4');
    </script>
<?php
    }
}
    
add_action( 'wp_head', 'clandestino_google_analytics', 10 );