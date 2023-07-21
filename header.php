<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="https://iplot.pro/favicon.ico">
	<?php wp_head(); ?>
</head>
<!-- Google tag (gtag.js) -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-WC70CMG6JW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-WC70CMG6JW');
	</script> -->

<body>
	<header class="header">
		<div class="container">
			<div class="header__inner">
				<div class="header__logo ">
					<a href="<?php echo home_url(); ?>">IPlotPro</a>
				</div>

				<!--noindex-->
				<div class="workload">
					<div class="workload_label">Моя текущая загруженность</div>
					<div class="workload_loading">
						<div class="workload_loading-line"></div>
					</div>
				</div>
				<!--/noindex-->

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