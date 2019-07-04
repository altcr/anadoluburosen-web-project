<!DOCTYPE html>
<html class="header-dark" style="background-image: url('<?=assurl?>/img/patterns/gray_jean.png');">
	<head>
		<!-- Basic -->
		<!-- Basic -->
		<meta charset="utf-8">

		<meta name="content-language" content="tr">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?=$sayfatitle?></title>

		<meta name="keywords" content="<?=$sayfakeywords?>" />
		<meta name="description" content="<?=$sayfadescription?>">
		<meta name="abstract" content="<?=$sayfadescription?>">
		<meta name="author" content="AE Kod Bilişim">
		<meta name="resource-type" content="document">

		<!-- Sosyal Medya Tags -->
		<meta property="og:title" content="<?=$sayfatitle?>" />
		<meta property="og:description" content="<?=$sayfadescription?>" />
		<meta property="og:image" content="<?=$sayfaimage?>" />
		<meta property="og:url" content="<?=url."/".implode("/",$_url)?>" />
		<meta property="og:locale" content="tr_TR">
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@emredokmetas">
		<meta name="twitter:creator" content="emredokmetas">
		<meta name="twitter:title" content="<?=$sayfatitle?>">
		<meta name="twitter:url" content="<?=url."/".implode("/",$_url)?>">
		<meta name="twitter:description" content="<?=$sayfadescription?>">
		<meta name="twitter:image" content="<?=$sayfaimage?>" />

		<meta itemprop="name" content="<?=$sayfatitle?>">
		<meta itemprop="description" content="<?=$sayfadescription?>">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?=upurl?>/<?=$ikon?>" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/animate.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?=assurl?>/css/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/theme.css">
		<link rel="stylesheet" href="<?=assurl?>/css/theme-elements.css">
		<link rel="stylesheet" href="<?=assurl?>/css/theme-blog.css">
		<link rel="stylesheet" href="<?=assurl?>/css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/settings.css">
		<link rel="stylesheet" href="<?=assurl?>/css/layers.css">
		<link rel="stylesheet" href="<?=assurl?>/css/navigation.css">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/demo-medical.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/skin-medical.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=assurl?>/css/custom.css">
		<link rel="stylesheet" href="<?=assurl?>/player/build/mediaelementplayer.min.css">
		<script type="text/javascript">
			var ajax_url = "<?=url?>/ajax";
		</script>
	</head>
	<body>

		<div class="body">
			<header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 218, 'stickySetTop': '-188px', 'stickyChangeLogo': false}">
				<div class="header-body p-0" style="border-top-width: 0px;border-bottom: 1px solid #008fe2;">
					<div class="header-top header-top header-top-style-3 header-top-custom m-0">
						<div class="container">
							<div class="header-row">
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top float-right">
											<ul class="nav nav-pills">
												<li class="d-none d-sm-block">
													<span class="ws-nowrap"><i class="icon-envelope-open icons"></i> <a class="text-decoration-none" href="mailto:<?=$email?>"><?=$email?></a></span>
												</li>
												<li>
													<span class="ws-nowrap"><i class="icon-call-out icons"></i></i> <?=$tel?></span>
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container pt-4 pb-4">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="<?=url?>">
											<img height="100px" src="<?=upurl?>/<?=$logo?>" title="<?=$sayfatitle?>" alt="<?=$sayfatitle?>">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column pt-3 pb-3 d-none d-sm-block">
								<ul class="header-extra-info mb-md pull-right" style="width: 574px;">
									<li>
										<a href="<?=url?>/<?=isset($_SESSION["giris"]) ? "hesabim" : "giris-yap" ?>" style="background: #47a447;border-radius: 33px;-webkit-border-radius: 33px;-o-border-radius: 33px;padding:5px 10px;width:260px;display:block;height: 65px;">
											<div class="feature-box feature-box-style-3">
												<div class="feature-box-icon" style="border-color:#fff">
													<i class="fa fa-<?=isset($_SESSION["giris"]) ? "user" : "sign-in" ?>" style="color:#fff"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="mb-0" style="color:#fff"><?=isset($_SESSION["giris"]) ? "Hesabım" : "Kullanıcı Girişi" ?></h4>
													<p class="m-0" style="color:#fff"><small><?=isset($_SESSION["giris"]) ? "Üye hesap sayfası." : "Sendika üyelik giriş sayfası." ?></small></p>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="<?=url?>/uye-ol" style="background: #e63826;border-radius: 33px;-webkit-border-radius: 33px;-o-border-radius: 33px;width:260px;padding:5px 10px;display: block;height: 65px;">
											<div class="feature-box feature-box-style-3">
												<div class="feature-box-icon" style="border-color:#fff">
													<i class="fa fa-user-plus" style="color:#fff"></i>
												</div>
												<div class="feature-box-info">
													<h4 class="mb-0" style="color:#fff">Yeni Üye Kaydı</h4>
													<p class="m-0" style="color:#fff"><small>Sendika Yeni Bir Üyelik Oluştur</small></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="header-container header-nav header-nav-bar header-nav-bar-primary mr-0 ml-0">
						<div class="container">
							<button class="btn header-btn-collapse-nav btn-block" data-toggle="collapse" data-target=".header-nav-main">
								<i class="fa fa-bars"></i>
							</button>
							<div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse" aria-expanded="false">
								<nav>
									<ul class="nav nav-pills" id="mainNav">
										<li class="">
											<a class="nav-link" href="<?=url?>">
												<i class="fa fa-home m-lg"></i> &nbsp; ANA SAYFA
											</a>
										</li>
										<?php
											ustmenu();
										?>
										<li class="dropdown d-sm-none">
											<a class="nav-link dropdown-toggle" href="#">
												ÜYE İŞLEMLERİ
											<i class="fa fa-caret-down"></i></a>
											<ul class="dropdown-menu">
												<li class="">
													<a class="nav-link" href="<?=url?>/uye-ol">
														SENDİKA KAYIT SAYFASI
													</a>
												</li>
												<li class="">
													<a class="nav-link" href="<?=url?>/<?=isset($_SESSION["giris"]) ? "hesabim" : "giris-yap" ?>">
														<?=isset($_SESSION["giris"]) ? "KULLANICI HESAP SAYFASI" : "SENDİKA KULLANICI GİRİŞİ" ?>
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
