<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Wysiwyg Script', 'wysiwyg-script', 'page_modules', [
    array(
        'key' => 'field_5ceed6fd209dd',
        'label' => 'Body',
        'name' => 'body',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 1,
        'delay' => 0,
    ),
]);