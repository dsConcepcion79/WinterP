<?php

use RA\Modules;

$modules = Modules::singleton();

$modules->add_module('Hover Transition', 'hover-transition', 'page_modules', [
	array(
            'key' => 'field_5er459255f482',
            'label' => 'Section Title',
            'name' => 'sec_title',
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
        'key' => 'field_5cddb7b681erf',
        'label' => 'Hover Transition Items',
        'name' => 'transition_items',
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
        'button_label' => 'Add New Item',
        'sub_fields' => array(
			 array(
				'key' => 'field_5c927e6134rf',
				'label' => 'Heading',
				'name' => 'hover_heading',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
			array(
				'key' => 'field_5cf6b4ererttf',
				'label' => 'Hover Description',
				'name' => 'hover_description',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '30',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			),
			array(
				'key' => 'field_5c91501a523o3',
				'label' => 'Image',
				'name' => 'hover_image',
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
			array(
                'key' => 'fielder4fa6c746ffrt',
                'label' => 'Type',
                'name' => 'img_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'img_normal' => 'Normal',
                    'img_logo_light' => 'Logo Light',
                    'img_logo_dark' => 'Logo Dark',
                ),
                'default_value' => array(
                    0 => 'Normal',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
			array(
				'key' => 'field_5ee56f6ddeec4',
				'label' => 'Link Targeted Page or Post',
				'name' => 'link_post',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'post',
					1 => 'page',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array(
				'key' => 'field_5c927e3334rf',
				'label' => 'Web Link',
				'name' => 'web_link',
				'type' => 'text',
				'instructions' => 'This field will override post/page URL',
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
				'key' => 'field_5c927345345tfr',
				'label' => 'Link Target',
				'name' => 'link_target',
				'type' => 'select',
				'instructions' => 'Option for opening link in a new tab or in the same tab',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
                    '_self' => 'Self',
                    '_blank' => 'Blank',
                ),
                'default_value' => array(
                    0 => '_self',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
			),
		),
	),
]);