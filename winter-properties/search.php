<?php

$templates = ['search.twig', 'archive.twig', 'index.twig'];

$context = Timber::get_context();

$search_query = $context['search_query'] = get_search_query();

$context['result_count'] = count(Timber::get_posts("s={$search_query}&showposts=-1"));

$context['posts'] = new Timber\PostQuery();

Timber::render($templates, $context);
