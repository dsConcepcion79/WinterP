<?php

/**
 * Template Name: Redirect
 */

// Get the page's children
$children = get_pages('child_of=' . $post->ID . '&sort_column=menu_order');

// Redirect to first child, if it exists, otherwise home
if ($children) {
    $first_child = $children[0];
    wp_redirect(get_permalink($first_child->ID));
} else {
    wp_redirect('/');
}
