<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_field_group([
    'key' => 'group_' . md5('post_settings'),
    'title' => 'Post Settings',
    'fields' => array(
        array(
            'key' => 'field_5cc9b2e2aa5dc',
            'label' => 'Related Articles',
            'name' => 'related_articles',
            'type' => 'group',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_5cc9b33daa5de',
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
                    'key' => 'field_5cc9b348aa5df',
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
                    'min' => 0,
                    'max' => 3,
                    'layout' => 'table',
                    'button_label' => 'Add Item',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5cc9b37caa5e0',
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
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
]);
