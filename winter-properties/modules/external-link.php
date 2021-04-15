<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('External Link', 'external-link', 'page_modules', [
    array(
        'key' => 'field_5ca77b8e1b517',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'link',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'return_format' => 'array',
    ),
]);
