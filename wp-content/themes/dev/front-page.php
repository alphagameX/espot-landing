<?php get_header() ?>

<?php if(get_option('is_landing_page') === 'on') : ?>

    <?php require('theme/landing/index.php'); ?>

<?php else: ?>

<div class="main">
    <div class="content">
        <h1>hello</h1>
    </div>
    <div class="sidebar">
        <?= get_sidebar('frontpage') ?>
    </div>
</div>

<?php endif; ?>

<?php get_footer() ?>