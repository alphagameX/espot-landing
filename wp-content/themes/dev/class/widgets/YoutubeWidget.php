<?php 

class YoutubeWidget extends WP_Widget {
    
    public function __construct () {
        parent::__construct('youtube_widget', 'Youtube Widget');
    }

    // get the widget instance with his property
    public function widget ($args, $instance) {
        echo $args['before_widget'];
        if(isset($instance['title'])) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $youtube . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo $args['after_widget'];
    }

    public function form ($instance) {
           $title = $instance['title'] ?? ''; 
           $youtube = $instance['youtube'] ?? ''; 
        ?>
        <p>
            <label for="<?= $this->get_field_id('title') ?>">Titre</label>
            <input 
            type="text"
            class="widefat"
            value="<?= $title ?>"
            name="<?= $this->get_field_name('title') ?>" 
            id="<?= $this->get_field_name('title') ?>">
        </p>
        <p>
            <label for="<?= $this->get_field_id('youtube') ?>">ID vidéo youtube</label>
            <input 
            type="text"
            class="widefat"
            value="<?= $youtube ?>"
            name="<?= $this->get_field_name('youtube') ?>" 
            id="<?= $this->get_field_name('youtube') ?>">
        </p>
        <?php
    }

    public function update ($new_instance, $old_instance) {
        return $new_instance;
    }
}