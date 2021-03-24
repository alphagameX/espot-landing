<?php get_header() ?>

<?php $query = new WP_Query(array('post_type' => 'post')); ?>
<?php if($query->have_posts()) : ?>

<?php while($query->have_posts()) : $query->the_post() ?>

    <h1><?php the_title() ?></h1>
    <?php the_post_thumbnail('thumbnail') ?>
    <a href="<?php the_permalink() ?>">Voir plus</a>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer() ?>