<?php
/*
Plugin Name: Simple Example Plugin
Description: Welcome to WordPress plugin development.
Plugin URI:  http://thehangar.cr/
Author:      Ronny Freites
Version:     1.0
License:     GPLv2 or later

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version
2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/

//exercise 1

function myplugin_action_hook_example() {

    wp_mail( 'email@example.com', 'Subject', 'Message..' );

}
add_action( 'init', 'myplugin_action_hook_example' );



function myplugin_filter_hook_example( $content ) {

    $content = $content . '<p>Custom content..</p>';

    return $content;

}
add_filter( 'the_content', 'myplugin_filter_hook_example' );

//exercise 2

// do stuff on activation
function myplugin_on_activation() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    add_option( 'myplugin_posts_per_page', 10 );
    add_option( 'myplugin_show_welcome_page', true );

}
register_activation_hook( __FILE__, 'myplugin_on_activation' );





// do stuff on deactivation
function myplugin_on_deactivation() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    flush_rewrite_rules();

}
register_deactivation_hook( __FILE__, 'myplugin_on_deactivation' );





// do stuff on uninstall
function myplugin_on_uninstall() {

    if ( ! current_user_can( 'activate_plugins' ) ) return;

    delete_option( 'myplugin_posts_per_page', 10 );
    delete_option( 'myplugin_show_welcome_page', true );

}
register_uninstall_hook( __FILE__, 'myplugin_on_uninstall' );


