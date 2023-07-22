<?php get_header(); ?>
<div class="page">
    <div class="container">
        <h1><?php the_title(); ?></h1>

        <div class="archive">
            <div class="container">
                <section>
                    <div class="archive__inner">
                        <div class="archive-list">
                            <?php
                            $args = array(
                                'post_type' => 'portfolio',
                                'posts_per_page' => 4,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            );

                            $portfolio_query = new WP_Query($args);

                            if ($portfolio_query->have_posts()) :
                                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                            ?>

                                    <div class="archive-list__item">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="archive-list__item-inner">
                                                <h2><?php the_title(); ?></h2>
                                                <div class="archive-list__item-body">
                                                    <div class="archive-list__item-body-text">
                                                        <?php the_field('brief_description'); ?>
                                                    </div>
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <div class="post-thumbnail">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo 'К сожалению, здесь пока ничего нет.';
                            endif;
                            ?>
                        </div>
                        <div class="pagination">
                            <div class="pagination__inner">
                                <?php echo paginate_links(array('total' => $portfolio_query->max_num_pages)); ?>
                            </div>
                        </div>
                    </div>
                </section>

                <section>
                    <?php the_content(); ?>
                </section>
            </div>
        </div>


    </div>
</div>
<?php get_footer(); ?>