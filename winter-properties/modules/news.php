<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('News', 'news', 'page_modules', [
    array(
        'key' => 'field_5c9534d826fce',
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
        'key' => 'field_5c9534e426fcf',
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
        'key' => 'field_5c9534f926fd0',
        'label' => 'Button Link',
        'name' => 'button_link',
        'type' => 'link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'return_format' => 'array',
    ),
    array(
        'key' => 'field_5c95356926fd2',
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
        'min' => 3,
        'max' => 3,
        'layout' => 'table',
        'button_label' => 'Add Item',
        'sub_fields' => array(
            array(
                'key' => 'field_5c95363726fd3',
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
                    0 => 'post',
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
