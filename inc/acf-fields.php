<?php
/**
 * ACF Field Groups Configuration
 * Register all custom fields for the Positively landing page
 */

if( function_exists('acf_add_local_field_group') ):

    // Hero Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title',
                'label' => 'Title',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => 'Enter main heading',
            ),
            array(
                'key' => 'field_hero_subtitle',
                'label' => 'Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => 'Enter subtitle text',
            ),
            array(
                'key' => 'field_hero_cta_text',
                'label' => 'CTA Button Text',
                'name' => 'cta_text',
                'type' => 'text',
                'default_value' => 'Get Started',
            ),
            array(
                'key' => 'field_hero_cta_link',
                'label' => 'CTA Link',
                'name' => 'cta_link',
                'type' => 'link',
            ),
            array(
                'key' => 'field_hero_background',
                'label' => 'Background Image',
                'name' => 'hero_background',
                'type' => 'image',
                'instructions' => 'Upload hero section background image',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Features Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_features_section',
        'title' => 'Features Section',
        'fields' => array(
            array(
                'key' => 'field_features_title',
                'label' => 'Section Title',
                'name' => 'features_title',
                'type' => 'text',
                'default_value' => 'Key Features',
            ),
            array(
                'key' => 'field_features_items',
                'label' => 'Features',
                'name' => 'features',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_icon',
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'text',
                        'default_value' => '✓',
                    ),
                    array(
                        'key' => 'field_feature_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_feature_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Services Section Field Group
    acf_add_local_field_group(array(
        'key' => 'group_services_section',
        'title' => 'Services Section',
        'fields' => array(
            array(
                'key' => 'field_services_title',
                'label' => 'Section Title',
                'name' => 'services_title',
                'type' => 'text',
                'default_value' => 'Our Services',
            ),
            array(
                'key' => 'field_services',
                'label' => 'Services',
                'name' => 'services',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_icon',
                        'label' => 'Icon Class',
                        'name' => 'icon',
                        'type' => 'text',
                        'default_value' => 'fas fa-cogs',
                    ),
                    array(
                        'key' => 'field_service_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Testimonials Section
    acf_add_local_field_group(array(
        'key' => 'group_testimonials',
        'title' => 'Testimonials Section',
        'fields' => array(
            array(
                'key' => 'field_testimonials',
                'label' => 'Testimonials',
                'name' => 'testimonials',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'key' => 'field_testimonial_name',
                        'label' => 'Name',
                        'name' => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_role',
                        'label' => 'Role',
                        'name' => 'role',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_testimonial_quote',
                        'label' => 'Quote',
                        'name' => 'quote',
                        'type' => 'textarea',
                    ),
                    array(
                        'key' => 'field_testimonial_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Contact Form Settings
    acf_add_local_field_group(array(
        'key' => 'group_contact_settings',
        'title' => 'Contact Settings',
        'fields' => array(
            array(
                'key' => 'field_contact_email',
                'label' => 'Recipient Email',
                'name' => 'contact_email',
                'type' => 'email',
                'default_value' => get_option('admin_email'),
            ),
            array(
                'key' => 'field_contact_subject',
                'label' => 'Email Subject',
                'name' => 'contact_subject',
                'type' => 'text',
                'default_value' => 'New Contact Form Submission',
            ),
            array(
                'key' => 'field_contact_success_message',
                'label' => 'Success Message',
                'name' => 'success_message',
                'type' => 'text',
                'default_value' => 'Thank you! Your message has been sent.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
    ));

endif;