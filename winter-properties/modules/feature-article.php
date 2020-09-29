<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Feature Article', 'feature-article', 'page_modules', [
    array(
        'key' => 'field_5cb77e5b5e667',
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
    array(
        'key' => 'field_5cb77eb75e668',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'textarea',
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
        'maxlength' => '',
        'rows' => 2,
        'new_lines' => 'br',
    ),
    array(
        'key' => 'field_5cb77ec45e669',
        'label' => 'Link Label',
        'name' => 'link_label',
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
        'key' => 'field_5cb78283f9b20',
        'label' => 'Type',
        'name' => 'type',
        'type' => 'select',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'choices' => array(
            'left-aligned' => 'Left Aligned',
            'centered' => 'Centered',
        ),
        'default_value' => array(
            0 => 'Left Aligned',
        ),
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'return_format' => 'value',
        'ajax' => 0,
        'placeholder' => '',
    ),
]);
