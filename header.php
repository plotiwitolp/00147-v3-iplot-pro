<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title(''); ?></title>
		<?php wp_head(); ?>
		<link rel="shortcut icon" type="image/x-icon" href="https://iplot.pro/favicon.ico">
	</head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WC70CMG6JW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-WC70CMG6JW');
	</script>

	<body>
		<header class="header">
			<div class="container">
				<div class="header__inner">
					<div class="header__logo ">
						<a href="/">IPlotPro</a>
					</div>

					<!--                 <div class="info">
<dl class="info__item">
<dt class="info__label">Статус:</dt>
<?php if (get_field('info__mode', 6)) { ?>
<dd class="info__mode info__mode_on">свободен</dd>
<?php } else { ?>
<dd class="info__mode info__mode_off">занят</dd>
<?php } ?>
</dl>
<?php if (!get_field('info__mode', 6)) { ?>
<dl class="info__item">
<dt class="info__label">Освобожусь через:</dt>
<dd class="info__mode"><?php the_field('will_be_free', 6) ?></dd>
</dl>
<?php } ?>
<dl class="info__item">
<dt class="info__label">График работы:</dt>
<dd class="info__mode">24/7</dd>
</dl>
</div> -->

					<div class="header__nav-wrapper">
						<nav class="header__nav">
							<?php wp_nav_menu([
	'theme_location'  => 'primary'
]); ?>
						</nav>
						<div class="header__nav-mob">
							<div class="header__nav-mob__open nav-mob_active"></div>
							<div class="header__nav-mob__close"></div>
						</div>
					</div>

				</div>
			</div>
		</header>

		<main>