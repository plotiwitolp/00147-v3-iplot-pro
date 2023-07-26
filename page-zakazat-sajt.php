<?php get_header(); ?>
<div class="page">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="page__body">

            <!--noindex-->
            <div class="page_header">
                <section>
                    <?php the_content(); ?>
                </section>
            </div>
            <!--/noindex-->


            <!-- START CALC -->
            <!--noindex-->
            <h2>Калькулятор</h2>
            <div class="calculator">


                <!-- START LEVEL 1 -->
                <div class="calculator__inner answers-lvl-1">
                    <?php if (have_rows('kalkulyator')) { ?>
                        <?php while (have_rows('kalkulyator')) { ?>
                            <?php the_row(); ?>
                            <div class="calculator-item item-1 answer">
                                <div class="answer-label"><?php echo get_sub_field('vopros_1'); ?></div>


                                <!-- START LEVEL 2 -->
                                <div class="answers answers-lvl-2">
                                    <?php if (have_rows('otvety_1')) { ?>
                                        <?php while (have_rows('otvety_1')) { ?>
                                            <?php the_row(); ?>
                                            <div class="answer answer-1">
                                                <div class="answer-label"><?php echo get_sub_field('vopros_2'); ?></div>
                                                <?php if (get_sub_field('cena')) { ?>
                                                    <div class="answer-price"><?php echo get_sub_field('cena'); ?></div>
                                                <?php } ?>


                                                <!-- START LEVEL 3 -->
                                                <div class="answers answers-lvl-3">
                                                    <?php if (have_rows('otvety_2')) { ?>
                                                        <?php while (have_rows('otvety_2')) { ?>
                                                            <?php the_row(); ?>
                                                            <div class="answer answer-1">
                                                                <div class="answer-label"><?php echo get_sub_field('vopros_3'); ?></div>
                                                                <?php if (get_sub_field('cena')) { ?>
                                                                    <div class="answer-price"><?php echo get_sub_field('cena'); ?></div>
                                                                <?php } ?>


                                                                <!-- START LEVEL 4 -->
                                                                <div class="answers answers-lvl-4">
                                                                    <?php if (have_rows('otvety_3')) { ?>
                                                                        <?php while (have_rows('otvety_3')) { ?>
                                                                            <?php the_row(); ?>
                                                                            <div class="answer answer-1">
                                                                                <div class="answer-label"><?php echo get_sub_field('vopros_4'); ?></div>
                                                                                <?php if (get_sub_field('cena')) { ?>
                                                                                    <div class="answer-price"><?php echo get_sub_field('cena'); ?></div>
                                                                                <?php } ?>


                                                                                <!-- START LEVEL 5 -->
                                                                                <div class="answers answers-lvl-5">
                                                                                    <?php if (have_rows('otvety_4')) { ?>
                                                                                        <?php while (have_rows('otvety_4')) { ?>
                                                                                            <?php the_row(); ?>
                                                                                            <div class="answer answer-1">
                                                                                                <div class="answer-label"><?php echo get_sub_field('vopros_5'); ?></div>
                                                                                                <?php if (get_sub_field('cena')) { ?>
                                                                                                    <div class="answer-price"><?php echo get_sub_field('cena'); ?></div>
                                                                                                <?php } ?>


                                                                                                <!-- START LEVEL 6 -->
                                                                                                <div class="answers answers-lvl-6">
                                                                                                    <?php if (have_rows('otvety_5')) { ?>
                                                                                                        <?php while (have_rows('otvety_5')) { ?>
                                                                                                            <?php the_row(); ?>
                                                                                                            <div class="answer answer-1">
                                                                                                                <div class="answer-label"><?php echo get_sub_field('vopros_6'); ?></div>
                                                                                                                <?php if (get_sub_field('cena')) { ?>
                                                                                                                    <div class="answer-price"><?php echo get_sub_field('cena'); ?></div>
                                                                                                                <?php } ?>


                                                                                                            </div>
                                                                                                        <?php } ?>
                                                                                                    <?php } ?>
                                                                                                </div>
                                                                                                <!-- END LEVEL 6 -->


                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <!-- END LEVEL 5 -->


                                                                            </div>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </div>
                                                                <!-- END LEVEL 4 -->


                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                                <!-- END LEVEL 3 -->


                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <!-- END LEVEL 2 -->


                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <!-- END LEVEL 1 -->

            </div>
            <!--/noindex-->
            <!-- END CALC -->


            <!-- SEO TEXT-->
            <div class="block-seotext" id="seotext">
                <section>
                    <div class="seotext-body">
                        <?php the_content(); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>