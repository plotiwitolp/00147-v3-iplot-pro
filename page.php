<?php get_header(); ?>
<div class="page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="page__body">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>