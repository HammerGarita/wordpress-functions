<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Customize your admin login page: change the default logo and add your own or your client's logo.
 */
 
/*------------------------------------*\
	Change the Login Logo
\*------------------------------------*/

function custom_logo() { ?>
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/site-logo.png);
padding-bottom: 30px;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_logo' );
