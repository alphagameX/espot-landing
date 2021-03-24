<?php 

class OptionsEspot {

    /**
     * contain the page name
     * 
     * @var string
     */
    const ESPOT_SETTINGS = 'espot_settings_options';

    public static function register () {
        // required
        require_once('registerField.php');
        // hook
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'register_settings']); 
        add_action('admin_enqueue_scripts', function ($page) {
            if($page === 'settings_page_espot_settings_options') {
                wp_enqueue_media();
                wp_register_script('options', get_template_directory_uri() . '/class/options/js/options.js', [], false, true);
                wp_enqueue_script('options');
            }
        });
        add_action('wp', function ($wp) {
            if(get_option('is_landing_page') === 'on' && ( !is_admin() &&(isset($wp->query_vars)) && (count($wp->query_vars) > 0))) {
                wp_redirect(home_url());
                exit;
            } else {
                return $wp;
            }
        });
    } 

    public static function addMenu () {
        add_options_page('Parametre Espot paris', 'Espot settings', 'manage_options', self::ESPOT_SETTINGS, [self::class, 'render']);
    } 

    public static function register_settings () {
        register_setting(self::ESPOT_SETTINGS, 'is_landing_page');
        register_setting(self::ESPOT_SETTINGS, 'meta_title_landing');
        register_setting(self::ESPOT_SETTINGS, 'meta_desc_landing');
        register_setting(self::ESPOT_SETTINGS, 'meta_og_image_landing');
        register_setting(self::ESPOT_SETTINGS, 'meta_og_url_landing');
        register_setting(self::ESPOT_SETTINGS, 'background_landing');

        add_settings_section('visual_settings', 'Parametre visuel', function () {
            echo 'Ici ce trouve certain nombre de parametre neccesaire à la configuration de la page';
        }, self::ESPOT_SETTINGS);
        add_settings_section('meta_property_landing', 'Meta property Landing page', function () {
            echo 'Ici ce trouve les differentes balises neccesaires au seo';
        }, self::ESPOT_SETTINGS);
        add_settings_section('design_settings', 'Design settings for landing page', function () {
            echo 'Ici ce trouve les differentes options de customisation de la landing page';
        }, self::ESPOT_SETTINGS);

        

        add_settings_field('landing', 'Activer le mode landing page ?', function () {
            ?>
            <input type="checkbox" name="is_landing_page" <?= (get_option('is_landing_page') === 'on') ? 'checked' : '' ?>>
            <?php
        }, self::ESPOT_SETTINGS, 'visual_settings');

        $meta_title = new RegisterTextField('title', 'Meta title:', 'meta_title_landing', self::ESPOT_SETTINGS, 'meta_property_landing');
        $meta_desc = new RegisterTextField('desc', 'Meta desc :', 'meta_desc_landing', self::ESPOT_SETTINGS, 'meta_property_landing');
        $meta_og_image = new RegisterTextField('og_image', 'Meta og image (url) :', 'meta_og_image_landing', self::ESPOT_SETTINGS, 'meta_property_landing');
        $meta_og_url = new RegisterTextField('og_url', 'Meta og url :', 'meta_og_url_landing', self::ESPOT_SETTINGS, 'meta_property_landing');
        
        $meta_title->add();
        $meta_desc->add();
        $meta_og_image->add();
        $meta_og_url->add();

        add_settings_field('bg_image', 'Background image landing page', function () {
            ?>
                <div>
                    <input id="upload_image" type="text" size="36" name="background_landing" value=<?=  get_option('background_landing'); ?> /> 
                    <input id="upload_image_button" class="button" type="button" value="Upload Menu" />
                </div>
                <img src="<?= get_option('background_landing') ?>" alt="" width="200" height="100">
            <?php
        }, self::ESPOT_SETTINGS, 'design_settings');
      
    }
    
    public static function render () {
        ?>

        <h1>Espot settings</h1>

        <form action="options.php" method="post">
            <?php
                settings_fields(self::ESPOT_SETTINGS);
                do_settings_sections(self::ESPOT_SETTINGS);
                submit_button();
            ?>
        </form>

        <?php
    }
}