<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Mosaic One', 'mosaic-one', 'page_modules', [
    
    array(
        'key' => 'field_5cb8a7517fe071',
        'label' => 'Images',
        'name' => 'images',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'collapsed' => '',
        'min' => 4,
        'max' => 4,
        'layout' => 'table',
        'button_label' => 'Add Image',
        'sub_fields' => array(
            array(
                'key' => 'field_5cb8a7717fe081',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
    ),
]);
