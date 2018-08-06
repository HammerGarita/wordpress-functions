<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/get_post_field
 */

/*------------------------------------*\
	Get Post Meta 
\*------------------------------------*/

//Example: Pull all metadata for a post
$all_meta = get_post_meta( get_the_ID() );
var_dump( $all_meta );
