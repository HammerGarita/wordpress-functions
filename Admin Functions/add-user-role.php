<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/add_role
 */
/*------------------------------------*\
	Add new user role
\*------------------------------------*/

$result = add_role(
    'basic_contributor', //Role
    __( 'Basic Contributor' ), //Display Name
    array( //Capabilities, for more: https://codex.wordpress.org/Roles_and_Capabilities#Capabilities
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);

//Check that the user was created (you can delete this part)
if ( null !== $result ) {
    echo 'Yay! New role created!';
}
else {
    echo 'Oh... the basic_contributor role already exists.';
}
