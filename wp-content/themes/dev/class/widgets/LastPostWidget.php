<?php 

class LastPostWidget extends WP_Widget {
    public function __construct () {
        parent::__construct('lastpost_widget', 'Les derniers post'); 
    }

    // on front
    public function widget ($args, $instance) {
        $query = new WP_Query(array(
            'post_type' => $instance['post_type'] ?? '',
            'tax_query' => array(
                'relation' => 'IN',
                array(
                    'taxonomy' => 'category',
                    'terms' => array($instance['tax'] ?? ''),
                ),
            ),
            'posts_per_page' => $instance['number_post'] ?? '',
            'nopaging' => false
        ));

        
        ?>
        <div class="container-fluid">
           <div class="row justify-content-end">
                <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-12">
                        <div class="card">
                            <img class="card-img-top" src="<?= get_the_post_thumbnail_url() ?>" alt="Card image cap" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php the_title() ?></h5>
                                <p class="card-text"><?php the_excerpt() ?></p>
                                <a href="<?= the_permalink() ?>" class="btn btn-primary">Show me more</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
           </div>
        </div>
        <?php
    }

    public function form ($instance) {
        $post_type = $instance['post_type'] ?? 'null';
        $number_post = $instance['number_post'] ?? '0';
        $taxonomies = $instance['tax'] ?? 'null' ;
        ?>
        <p>
            <label for="<?= $this->get_field_name('post_type') ?>">Quel type de post ?</label>
            <select 
            class="widefat"
            onchange="submit"
            name="<?= $this->get_field_name('post_type') ?>" 
            id="<?= $this->get_field_name('post_type') ?>">
            <option value="<?= $post_type ?>" selected hidden><?= $post_type ?></option>
            <option value="">Aucune</option>    
                <?php foreach($this->post_type() as $post) : ?>
                    <option value="<?= $post ?>"><?= $post ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
        <label for="<?= $this->get_field_name('tax') ?>">Quel taxionomie ?</label>
        <select 
            class="widefat" 
            name="<?= $this->get_field_name('tax') ?>" 
            id="<?= $this->get_field_name('tax') ?>">
                <option value="<?= $taxonomies ?>" selected hidden><?= $taxonomies ?></option>
                <option value="">Aucune</option>
                <?php foreach($this->get_tax($post_type) as $tax) : ?>
                    <option value="<?= $tax->name ?>"><?= $tax->name ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="<?= $this->get_field_name('number_post') ?>">Combien de post afficher ?</label>
            <input 
            class="widefat" 
            type="number" 
            name="<?= $this->get_field_name('number_post') ?>" 
            id="<?= $this->get_field_name('number_post') ?>" 
            value="<?= $number_post ?>">
        </p>
        <?php
    }

    public function update ($new_instance, $old_instance) {
        return $new_instance;
    }

    // utils 
    public function post_type() : array {
        $posttype = get_post_types(array('public' => true));
        unset($posttype['page']);
        unset($posttype['attachment']);
        return $posttype;
    }
    public function get_tax($post_type) : array {
        if($post_type === 'null') {
            $taxo = get_terms(array('hide_empty' => false));
            return $taxo;
        }
        $taxonomies = get_object_taxonomies($post_type);
        $result = [];
        foreach($taxonomies as $tax) {
           foreach(get_terms(array('taxonomy' => $tax, 'hide_empty' => false)) as $terms) {
               array_push($result, $terms);
           }
        }
        return $result;
    }
}