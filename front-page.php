<?php get_header(); ?>

<!-- TOP -->
<div class="block-top">
	<div class="container">
		<section>
			<div class="block-top__inner">
				<div class="about">
					<div class="about__greet">
						<h1>
							<?php the_field("title_h1"); ?>
						</h1>
					</div>
				</div>
				<div class="mypic">
					<img src="<?php echo get_template_directory_uri() ?>/assets/img/img-05.png" alt="Частный веб-мастер Иван Плотников">
				</div>
				<div class="btns">
					<div class="btns__order-site btn">
						<a href="<?php echo home_url('/zakazat-sajt'); ?>">Заказать сайт</a>
					</div>
					<div class="btns__order-rework btn">
						<a href="<?php echo home_url('/dorabotka-sajta'); ?>">Заказать доработку сайта</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- PORTFOLIO -->

<!--noindex-->
<div class="block-portfolio">
	<div class="container">
		<section>
			<div class="block-portfolio__inner">
				<div class="section__title">
					<h2>
						<a href="<?php echo home_url('/portfolio'); ?>">
							Портфолио
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</a>
					</h2>
				</div>
				<div class="portfolio-gallery">
					<?php
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => 4
					);
					$query = new WP_Query($args);
					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
					?>
							<div class="portfolio-gallery-item">
								<a href="<?php echo get_permalink(); ?>">
									<div class="portfolio-gallery-item__title">
										<h3>
											<?php echo get_the_title() ?>
										</h3>
									</div>
									<?php if (has_post_thumbnail()) : ?>
										<div class="portfolio-gallery-item__pic">
											<div class="portfolio-gallery-item__pic-inner">
												<?php the_post_thumbnail(); ?>
											</div>
										</div>
									<?php endif; ?>
								</a>
							</div>
					<?php
						}
						wp_reset_postdata();
					} else {
						echo 'К сожалению, в портфолио пока ничего нет.';
					}
					?>
				</div>
				<div class="portfolio-more">
					<div class="portfolio-more-btn ">
						<a class="btn btn_medium" href="<?php echo home_url('/portfolio'); ?>">смотреть ещё</a>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!--/noindex-->


<!-- REVIEWS -->
<!--noindex-->
<div id="reviews" class="block-reviews">
	<div class="container">
		<section>
			<div class="section__title">
				<h2>
					Отзывы
				</h2>
			</div>
			<div class="reviews-slider">
				<div class="reviews-slider__inner">
					<?php
					$args = array(
						'post_type' => 'reviews',
						'posts_per_page' => 4
					);
					$query = new WP_Query($args);


					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();

							$project_link = get_field('project_link');
					?>

							<div class="reviews-slider-item">
								<div class="reviews-slider-item-inner">

									<h3><?php the_title() ?></h3>

									<div class="reviews-slider-item-inner__body">
										<div class="review-owner">
											<div class="review-owner__top">
												<cite><?php the_field('review_owner'); ?></cite>
												<?php if (has_post_thumbnail()) : ?>
													<div class="reviews-slider-item__pic">
														<?php the_post_thumbnail(); ?>
													</div>
												<?php endif; ?>
											</div>
											<time datetime="<?php the_field('publication_date'); ?>"><?php the_field('publication_date'); ?></time>
										</div>

										<div class="reviews-slider-item__desc__wrap">


											<div class="reviews-slider-item__desc">
												<blockquote>
													<?php the_field('callback_text') ?>
												</blockquote>
											</div>

											<div class="reviews-slider-item-btns">
												<div class="reviews-slider-item-btns__item">
													<a href="<?php echo get_field('src_link') ?>" rel="nofollow" target="_blank" class="btn btn_min">
														источник
													</a>
												</div>

												<?php if ($project_link) { ?>
													<div class="reviews-slider-item-btns__item">
														<a href="<?php echo $project_link->guid ?>" rel="nofollow" class="btn btn_min">
															проект
														</a>
													</div>
												<?php } ?>
											</div>
										</div>

									</div>


								</div>
							</div>

					<?php
						}
						wp_reset_postdata();
					} else {
						echo 'К сожалению, отзывов пока нет.';
					}
					?>
				</div>
			</div>
			<div class="reviews-more">
				<div class="reviews-more-btn" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
					<a class="btn btn_medium" href="#" rel="nofollow">показать ещё</a>
				</div>
			</div>
		</section>
	</div>
</div>
<!--/noindex-->

<!-- SEO TEXT-->
<div class="block-seotext" id="seotext">
	<div class="container">
		<section>
			<div class="seotext-body">
				<?php the_content(); ?>
			</div>
		</section>
	</div>
</div>

<!-- Tariffs -->
<div class="block-rates">
	<div class="container">
		<section>
			<div class="section__title" id="prices">
				<h2>Цены</h2>
			</div>
			<div class="rates__wrapper">
				<div class="rates">
					<!-- Эконом -->
					<div class="rates__item">
						<!--noindex-->
						<div class="rates-title">Эконом</div>
						<!--/noindex-->
						<div class="rates-description">
							<p>Небольшие лендинги, визитки, сайты с количеством шаблонных страниц до 4. С уже имеющимся готовым макетом (желательно в Figma). Без какого-либо сложного функционала.</p>

							<ul>
								<li>Консультация по макету и ТЗ</li>
								<li>Валидная верстка</li>
								<li>Адаптация под популярные разрешения экранов</li>
								<li>Посадка на CMS (WordPress)</li>
								<li>Настройка административной панели под контент</li>
								<li>Установка на хостинг</li>
								<li>Тех. поддержка и консультация в течении недели</li>
							</ul>

						</div>
						<div class="rates-price">
							<div class="rates-price__new">от 9 000<span>₽</span></div>
							<div class="rates-price__old">от 12 000<span>₽</span></div>
						</div>
						<div class="rates-order">
							<!--noindex-->
							<div class="rates-btn btn btn_medium"><a href="#feddbackform" rel="nofollow">заказать</a></div>
							<!--/noindex-->
						</div>
					</div>
					<!-- Комфорт -->
					<div class="rates__item">
						<!--noindex-->
						<div class="rates-title">Комфорт</div>
						<!--/noindex-->
						<div class="rates-description">
							<p>Многостраничные сайты с количеством шаблонных страниц до 10. Небольшие интернет-магазины без сложного функционала. Корпоративные сайты или относительно сложные лендинги.</p>
							<!--noindex-->
							<ul>
								<li>Консультация по макету и ТЗ</li>
								<li>Валидная верстка</li>
								<li>Адаптация под популярные разрешения экранов</li>
								<li>Посадка на CMS (WordPress)</li>
								<li>Настройка административной панели под контент</li>
								<li>Программирование функциональных частей</li>
								<li>Установка на хостинг</li>
								<li>Тех. поддержка и консультация в течении 2 недель</li>
							</ul>
							<!--/noindex-->
						</div>
						<div class="rates-price">
							<div class="rates-price__new">от 15 000<span>₽</span></div>
							<div class="rates-price__old">от 20 000<span>₽</span></div>
						</div>
						<div class="rates-order">
							<!--noindex-->
							<div class="rates-btn btn btn_medium"><a href="#feddbackform" rel="nofollow">заказать</a></div>
							<!--/noindex-->
						</div>
					</div>
					<!-- Премиум -->
					<div class="rates__item">
						<!--noindex-->
						<div class="rates-title">Премиум</div>
						<!--/noindex-->
						<div class="rates-description">
							<p>Многостраничные сайты с количеством шаблонных страниц до 20. Интернет-магазины с относительно сложным функционалом. Корпоративные сайты или относительно сложные лендинги.</p>
							<!--noindex-->
							<ul>
								<li>Консультация по макету и ТЗ</li>
								<li>Валидная верстка</li>
								<li>Адаптация под популярные разрешения экранов</li>
								<li>Посадка на CMS (WordPress)</li>
								<li>Настройка административной панели под контент</li>
								<li>Программирование функциональных частей</li>
								<li>Установка на хостинг</li>
								<li>Тех. поддержка и консультация в течении месяца</li>
							</ul>
							<!--/noindex-->
						</div>
						<div class="rates-price">
							<div class="rates-price__new">от 25 000<span>₽</span></div>
							<div class="rates-price__old">от 30 000<span>₽</span></div>
						</div>
						<div class="rates-order">
							<!--noindex-->
							<div class="rates-btn btn btn_medium"><a href="#feddbackform" rel="nofollow">заказать</a></div>
							<!--/noindex-->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>


<!-- TECHNOLOGY -->
<!--noindex-->
<div class="block-technology">
	<div class="container">
		<section>
			<div class="section__title">
				<h2>
					Технологии
				</h2>
			</div>
			<div class="technology">
				<?php
				$args = [
					'post_type' => 'technology',
					'order' => 'ASC',
					'posts_per_page' => 20,
				];
				$query = new WP_Query($args);
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$level_of_technology_proficiency = get_field('level_of_technology_proficiency');
				?>
						<div class="technology-item">
							<div class="technology-item__title">
								<?php if (has_post_thumbnail()) : ?>
									<div class="technology-item__title-img">
										<?php the_post_thumbnail(); ?>
									</div>
								<?php endif; ?>
								<h3>
									<?php the_title(); ?>
								</h3>
							</div>
							<div class="technology-item__progress">
								<div class="technology-item-notice-line-wrapper">
									<span data-level="<?php echo $level_of_technology_proficiency ?>" class="technology-item-notice-line html wow animate__animated animate__fadeInLeft animate__slow"></span>
								</div>
								<span class="technology-item-notice">Владение технологией: <?php echo $level_of_technology_proficiency ?>%</span>
							</div>
						</div>
				<?php
					}
					wp_reset_postdata();
				} else {
					echo 'К сожалени, в ни одной технологии пока ещё нет.';
				}
				?>
			</div>
		</section>
	</div>
</div>
<!--/noindex-->


<!-- FEEDBACK FORM -->
<!--noindex-->
<div class="block-feddbackform" id="feddbackform">
	<div class="container">
		<section>
			<div class="section__title">
				<h2>
					Форма обратной связи
				</h2>
			</div>
			<?php echo do_shortcode('[contact-form-7 id="49" title="Форма обратной связи"]') ?>
		</section>
	</div>
</div>
<!--/noindex-->


<!-- freelancesites -->
<!--noindex-->
<div class="block-freelancesites" id="freelancesites">
	<div class="freelancesites">
		<div class="freelancesites__item freelancesites__item_kwork">
			<a href="https://kwork.ru/user/ivanplotnikovpro" rel="nofollow" target="_blank">Я на KWORK</a>
		</div>
		<div class="freelancesites__item freelancesites__item_weblancer">
			<a href="https://www.weblancer.net/users/ivan_plotnikov/" rel="nofollow" target="_blank">Я на Weblancer</a>
		</div>
	</div>
</div>
<!--/noindex-->

<!-- telegram -->
<!--noindex-->
<div class="block-telegram" id="telegram">
	<div class="telegram">
		<a href="https://web.telegram.org/k/#@iplotpro" rel="nofollow" target="_blank">
			<i class="fa fa-telegram" aria-hidden="true"></i>
			Написать
		</a>
	</div>
</div>
<!--/noindex-->


<?php get_footer(); ?>