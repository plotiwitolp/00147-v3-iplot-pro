<?php get_header(); ?>
<div class="archive">
	<div class="container">
		<section>
			<div class="archive__inner">
				<div class="archive-list">
					<?php
					if (have_posts()) {
					?>
					<?php
						while (have_posts()) {
							the_post();
					?>
					<div class="archive-list__item">
						<a href="<?php the_permalink() ?>">
							<div class="archive-list__item-inner">
								<h2><?= get_the_title() ?></h2>
								<div class="archive-list__item-body">
									<div class="archive-list__item-body-text">
										<?php the_field('brief_description') ?>
									</div>
									<?php
						if (has_post_thumbnail()) { ?>
									<div class="post-thumbnail">
										<?php the_post_thumbnail(); ?>
									</div>
									<?php  } ?>
								</div>
							</div>
						</a>
					</div>
					<?php
						}
						wp_reset_postdata();
					?>
				</div>
				<div class="pagination">
					<?php echo the_posts_pagination(); ?>
				</div>
				<?php
					} else {
						echo 'К сожалению, в здесь пока ничего нет.';
					}
				?>
			</div>
		</section>
	</div>
</div>


<?php get_footer(); ?>