<?php

$context = Timber::get_context();

$context['posts'] = new Timber\PostQuery();

$context['foo'] = 'bar';

$templates = ['index.twig'];

if (is_home()) {
    array_unshift($templates, 'front-page.twig', 'home.twig');
}

Timber::render($templates, $context);
