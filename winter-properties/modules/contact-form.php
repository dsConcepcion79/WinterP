<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Contact Form', 'contact-form', 'page_modules', [
    array(
        'key' => 'field_5cbf4fd5a3678',
        'label' => 'Form Shortcode',
        'name' => 'form_shortcode',
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
        'tabs' => 'text',
        'media_upload' => 0,
        'toolbar' => 'full',
        'delay' => 0,
    ),
]);
