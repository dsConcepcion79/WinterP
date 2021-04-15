<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Big Links', 'big-links', 'page_modules', [
    array(
        'key' => 'field_5ca67514f7828',
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
        'key' => 'field_5ca6753cf7829',
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
        'key' => 'field_5ca674300ff32',
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
        'min' => 1,
        'max' => 0,
        'layout' => 'table',
        'button_label' => 'Add Item',
        'sub_fields' => array(
            array(
                'key' => 'field_5ca674c30ff33',
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
