</main>
<footer class="footer">
	<div class="container">
		<div class="section">
			<div class="footer__inner">
				<div class="footer__top">
					<div class="footer__item">
						<noindex>
							<dl>

								<dt>
									Работаю удаленно:
								</dt>
								<dd>
									по всему миру.
								</dd>
							</dl>
							<dl>
								<dt>
									Территориально нахожусь здесь:
								</dt>
								<dd>
									<address>
										Грузия, Кутаиси (GMT+4)
									</address>
								</dd>
							</dl>
							<dl>
								<dt>
									Мое местное время:
								</dt>
								<dd>
									<?php
									$offset = 4 * 60 * 60;
									$dateFormat = "H:i" . " (d.m.Y)";
									$timeNdate = gmdate($dateFormat, time() + $offset);

									echo $timeNdate;
									?>
								</dd>
							</dl>
						</noindex>
					</div>
					<div class="footer__item">
						<!-- 									обратиться через Telegram,  Whatsapp или можете -->
						<dl>
							<dt>
								<a href="https://telegram.me/IPlotPro" target="_blank">
									Telegram: @IPlotPro
								</a>
							</dt>
							<dd>
								<a href="https://telegram.me/IPlotPro" target="_blank">
									<i class="fa fa-telegram" aria-hidden="true"></i>
								</a>
							</dd>
						</dl> 
						<dl>
							<dt>
								<a href="https://wa.me/+995555287861" target="_blank">
									Whatsapp: +995 555 287 861
								</a>
							</dt>
							<dd>
								<a href="https://wa.me/+995555287861" target="_blank">
									<i class="fa fa-whatsapp" aria-hidden="true"></i>
								</a>
							</dd>
						</dl> 
						<dl>
							<dt>
								<a href="mailto:">
									Email:
								</a>
							</dt>
							<dd>
								<a href="mailto:webmaster@iplot.pro">
									webmaster@iplot.pro
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</a>
							</dd>
						</dl>
					</div>
				</div>
				<div class="footer_bottom">
					<noindex>
						©️ 2022 - <?php echo date("Y"); ?> Все права защищены. Информация на сайте, не является публичной офертой. Копирование материалов сайта запрещено.
					</noindex>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>