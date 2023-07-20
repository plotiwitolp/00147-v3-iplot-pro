<?php get_header(); ?>
<div class="single">
    <div class="container">
        <div class="single__inner">
            <div class="breadcrumbs">
                <?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(' » '); ?>
            </div>
            <div class="single__title">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="single__body">
                <div class="single__top">
                    <div class="single__txt">
                        <?php the_field('full_description'); ?>
                    </div>
                    <div class="single__img">
                        <a data-lightbox="post-thumbnail" href="<?php the_post_thumbnail_url(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                </div>
                <div class="single__bottom">
                    <?php the_field('gallery'); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php get_footer(); ?>