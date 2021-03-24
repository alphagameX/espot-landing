<?php 

class optionsFrontPage {

    const FRONT = 'espot_front_settings';

    public static function register () {
        // required
        require_once('registerField.php');
        // hook
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
    }

    public static function addMenu () {
        add_menu_page('Front page', 'Front page', 'manage_options', self::FRONT, [self::class, 'render'], 'dashicons-admin-home', '20');
    }
    public static function registerSettings () {
        register_setting(self::FRONT, 'text');

        add_settings_section('text', 'Text', function () {
            echo 'salut';
        }, self::FRONT);

        $text = new RegisterTextField('demo-text', 'Text demo', 'text', self::FRONT, 'text');
        $text->add();

    }
    public static function render() {
       ?>
        <form action="options.php" method="POST">
            <?php 
                settings_fields(self::FRONT);
                do_settings_sections(self::FRONT);
                submit_button();
            ?>
        </form>
       <?php
    }
}