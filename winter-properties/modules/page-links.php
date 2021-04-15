<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Page Links', 'page-links', 'page_modules', [
    array(
        'key' => 'field_5cb8ecc1b9041',
        'label' => 'Eyebrow',
        'name' => 'eyebrow',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
    ),
    array(
        'key' => 'field_5cb8eb4a1a3a4',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
    ),
    array(
        'key' => 'field_5cb8eb541a3a5',
        'label' => 'Items',
        'name' => 'items',
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
        'min' => 2,
        'max' => 2,
        'layout' => 'table',
        'button_label' => 'Add Item',
        'sub_fields' => array(
            array(
                'key' => 'field_5cb8eb601a3a6',
                'label' => 'Post',
                'name' => 'post',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
    ),
]);
