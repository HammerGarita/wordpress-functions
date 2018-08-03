<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Change the admin footer text
 */
/*------------------------------------*\
	Change Admin Footer
\*------------------------------------*/

function change_admin_footer(){
	 echo '<span id="footer-note">Created by <a href="http://www.webname.com/" target="_blank">Your name</a>.</span>';
}
add_filter('admin_footer_text', 'change_admin_footer');
