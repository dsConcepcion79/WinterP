<?php

global $paged;

// Set pagination if it doesn't yet exist
if (!isset($paged) || !$paged){
    $paged = 1;
}

$context = Timber::get_context();

$post = new TimberPost();

// Generate the news lists from their categories
$modules = get_field('content_modules', $post->ID);
if ($modules) {
    $post_lists = array_keys(array_column($modules, 'acf_fc_layout'), 'news-list');
    if (count($post_lists) >= 1) {
        $posts = [];
        foreach ($post_lists as $post_list) {
            $category = $modules[$post_list]['category'];
            if ($category) {
                $args = [
                    'post_type' => 'post',
                    'cat' => $category,
                    'posts_per_page' => 12,
                    'paged' => $paged
                ];
                $posts[$category] = new Timber\PostQuery($args);
            }
        }
    }
}

$context['items'] = isset($posts) ? $posts : null;

$context['post'] = $post;

Timber::render(['page-' . $post->post_name . '.twig', 'page.twig'], $context);
