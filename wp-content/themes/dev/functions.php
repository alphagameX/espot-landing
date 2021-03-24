<?php 
/**
 * Fires after the theme is loaded.
 *
 */

 // action

 add_action('init', function () {
    register_post_type('evenement', array(
        'label' => 'Nos evenements',
        'public' => true,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'has_archive' => true
    ));
    register_taxonomy('games', 'evenement', array(
        'labels' => array(
            'name' => 'games',
            'singular_name' => 'games',
            'plural_name' => 'games',
        ),
        'show_in_rest' => true,
        'hierarchical' => true
    ));
 });

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tete du menu');
    add_image_size('card', 215, 150);
});

add_action('wp_enqueue_scripts', function () {

    wp_deregister_script('jquery');
    wp_register_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', [], false);
    wp_enqueue_style('bootstrap_css');
    
    wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], false, true);

    if(is_front_page() && get_option('is_landing_page')) {
        wp_register_script('land_app', get_template_directory_uri() . '/theme/landing/js/utils/app.js',[], false, true);
        wp_register_script('land_xm', get_template_directory_uri() . '/theme/landing/js/vendor/xm_plugins.min.js', [], false, true);
        wp_register_script('land_util', get_template_directory_uri() . '/theme/landing/js/form/form.utils.js', [], false, true);
        wp_register_script('land_tabs', get_template_directory_uri() . '/theme/landing/js/landing/landing.tabs.js', [], false, true);
        wp_register_script('land_loader', get_template_directory_uri() . '/theme/landing/js/utils/svg-loader.js',  ['land_app','land_xm', 'land_util', 'land_tabs'], false, true);
        
        wp_enqueue_style('espot', get_template_directory_uri() . '/theme/landing/css/styles-espot.min.css');
        wp_enqueue_style('landing', get_template_directory_uri() . '/theme/landing/css/alex/landing.css');
        
        
        wp_enqueue_script('land_loader');
    } else {
        wp_register_script('vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js', [], false, true);
        wp_register_script('app', get_template_directory_uri() . '/assets/js/app.js', ['vuejs'], false, true);

        wp_enqueue_script('app');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], false);
    }
  
});

// require_once('class/cron/cron.php');

require_once('class/apparences/Apparence.php');

require_once('class/widgets/YoutubeWidget.php');
require_once('class/widgets/LastPostWidget.php');

add_action('widgets_init', function () {
    register_widget(LastPostWidget::class);
    register_widget(YoutubeWidget::class);
    register_sidebar([
        'id' => 'frontpage',
        'name' => 'Page d\'accueil',
        'before_widget' => '<div class="salut">',
        'after_widget' => '</div>'
    ]);
});

// filter

add_filter('document_title_separator', function ($title) {
    return '/';
});

add_filter('document_title_parts', function ($part) {
    unset($part['tagline']);
    return $part;
});

// menu filter and require the walker

add_filter('nav_menu_css_class', function (array $class) {
    return ['menu-item'];
});


add_filter('newsletter_enqueue_style', function ($class) {
    return false; 
});

add_filter("newsletter_user_confirmed",function ($user) {
    wp_redirect(home_url());
    session_start();
    set_transient('message', '<strong>Welcome '. $user->name .'</strong>, you succesfully subscribed to Espot\'s newsletter !', 60);
    exit; 
}, 10, 1);


// admin

require_once('class/options/optionsEspot.php');
require_once('class/options/optionsFrontPage.php');
OptionsEspot::register();
optionsFrontPage::register();


// utility

function var_die($content) {
    ?>
    <pre><?php var_dump($content); ?></pre>
    <?php
    die;
}