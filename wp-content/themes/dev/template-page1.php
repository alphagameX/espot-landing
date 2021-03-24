<?php
/**
 * Template Name: Type page 1
 * Template Post Type: page, post
 */
?>

<?php get_header() ?>


<?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
        <?php the_title() ?>
        <?php the_content() ?>
        <?php $query = new WP_Query(array('post_type' => 'post', 'post_not_in' => [get_the_ID()])); ?>
        <?php if($query->have_posts()) : ?>
            <div class="section ">
                <?php while($query->have_posts()) : $query->the_post(); ?>
                        <?php the_title() ?>
                <?php endwhile; wp_reset_postdata();  ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer() ?>