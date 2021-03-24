<?php 

class RegisterTextField {

    /**
     * Name of field, Description of field, Property is name field
     *
     * @var string
     */
    public $name, $desc, $property;

    /**
     * Page name, Section name
     *
     * @var string
     */
    public $page, $section;
    

    public function __construct($name, $desc, $property, $page, $section) {
        $this->name = $name; 
        $this->property = $property;
        $this->desc = $desc; 
        $this->page = $page;
        $this->section = $section;
        add_action('admin_init', [self::class, 'add']);
    }

    public function add () {
        add_settings_field($this->name, $this->desc, function () {
            ?>
            <input type="text" name="<?= $this->property ?>" value="<?= get_option($this->property) ?>">
            <?php
        }, $this->page, $this->section);
    }
}