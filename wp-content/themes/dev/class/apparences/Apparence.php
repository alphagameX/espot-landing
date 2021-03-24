<?php 

add_action('customize_register', function (WP_Customize_Manager $manager) {
    $manager->add_section('espot_apparence', [
        'title' => 'Personnalisation de l\'apparence',
    ]);
    $manager->add_setting('header_background', [
        'default' => '#F00000',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);
    $manager->add_control(new WP_Customize_Color_Control($manager, 'header_background', [
        'section' => 'espot_apparence',
        'setting' => 'header_background',
        'label' => 'couleur de t\'entete'
    ]));
});