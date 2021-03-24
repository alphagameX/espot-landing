<?php get_header() ?>

<?php $games = get_terms(array(
    'taxonomy' => 'games',
    'hide_empty' => false,
)) ?>

<ul class="nav nav-pills">
    <?php foreach($games as $game) : ?>
        <li class="nav-item">
           <a href="<?= get_term_link($game) ?>" class="nav-link"><?= $game->name ?></a>
        </li>
    <?php endforeach; ?>
</ul>



<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <h1><?php the_title() ?></h1>

<?php endwhile; endif; ?>

<?php get_footer() ?>