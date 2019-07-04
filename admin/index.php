<?php
	try
	{
		error_reporting(E_ALL);
		// ini_set('display_errors', 0);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		date_default_timezone_set('Europe/Istanbul');
		session_start();
		ob_start();

		require_once "../app/init.php";
		$sayfahata = "";

		if(isset($_COOKIE["admingiris"])) $giris = true;
		else $giris = false;

		if(get("s") == "girisyap")
		{

			if(!$giris)
			{
				if($_POST)
				{
					if(mb_strlen(post("kadi")) >= 3 and mb_strlen(post("kadi")) <= 20 and mb_strlen(post("sifre")) >= 3 and mb_strlen(post("sifre")) <= 20)
					{
						$varmi = $db->select("adminler")->where("kadi", post("kadi"))->where("sifre", post("sifre"))->where("durum",1)->limit(1)->run(true);
						print_r($varmi);
						if($varmi)
						{
							setcookie("admingiris", true, $admincookietime, $admincookieurl);
							setcookie("adminsafe1", sifrele(serialize($varmi), md5("1")), $admincookietime, $admincookieurl);
							header("location:".aurl);
						}else{
							$sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Hata!</strong> Kullanıcı adı veya Şifre yanlış</div>';
						}

					}else{
						$sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Hata!</strong> Kullanıcı adı veya Şifre Giriniz</div>';
					}
				}
			}
		}
?>
<!doctype html>
<html class="fixed header-dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin <?=$defaultsayfatitle?></title>
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="shortcut icon" href="<?=assurl?>/img/favicon.ico" type="image/x-icon" />
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=aassurl?>/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<link rel="stylesheet" href="<?=aassurl?>/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/simple-line-icons/css/simple-line-icons.css" />
		<link rel="stylesheet" href="<?=aassurl?>/vendor/owl.carousel/owl.carousel.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=aassurl?>/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=aassurl?>/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=aassurl?>/stylesheets/theme-custom.css">
		<link rel="stylesheet" href="<?=aassurl?>/stylesheets/custom.css">
		<link rel="shortcut icon" href="<?=upurl?>/<?=$ikon?>" type="image/x-icon" />
		<!-- Head Libs -->
		<script src="<?=aassurl?>/vendor/modernizr/modernizr.js"></script>
		<script type="text/javascript">

			var base_url = "<?=aurl?>";
		</script>
	</head>
	<body>
		<?php if($giris){ ?>
		<section class="body body-dark">

			<!-- start: header -->
			<header class="header header-dark">
				<div class="logo-container">
					<a href="<?=aurl?>" class="logo">
						<img alt="Admin <?=$defaultsayfatitle?>" height="40px" src="<?=upurl?>/<?=$logo?>">
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">
					<ul class="notifications">
						<li>
							<a href="<?=url?>" target="_blank" class="notification-icon" title="Siteye Git">
								<i class="fa fa-eye"></i>
							</a>
						</li>
					</ul>
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info">
								<span class="name"><?=akb("adsoyad")?></span>
								<span class="role">administrator</span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?=aurl?>/index.php?s=cikis"><i class="fa fa-power-off"></i> Çıkış</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Menü
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="icons icon-menu" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li>
										<a href="<?=aurl?>">
											<i class="icons icon-home" aria-hidden="true"></i>
											<span>Ana Sayfa</span>
										</a>
									</li>
									<li>
										<a href="<?=aurl?>/index.php?s=slider">
											<i class="icons icon-picture" aria-hidden="true"></i>
											<span>Slider Ayarları</span>
										</a>
									</li>
									<li>
										<a href="<?=aurl?>/index.php?s=uyeler">
											<i class="icons icon-people" aria-hidden="true"></i>
											<span>Üye İşlemleri</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="icons icon-speech" aria-hidden="true"></i>
											<span>Blog İşlemleri</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=aurl?>/index.php?s=blog-ekle">
													<i class="icons icon-plus" aria-hidden="true"></i>
													Yazılar Ekle
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=blog">
													<i class="icons icon-docs" aria-hidden="true"></i>
													Tüm Yazılar
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=blog-kategori">
													<i class="icons icon-list" aria-hidden="true"></i>
													Kategoriler
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=blogyorumislemleri">
													<i class="icon-bubbles icons" aria-hidden="true"></i>
													Yazı Yorumları
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="icons icon-doc" aria-hidden="true"></i>
											<span>Haber İşlemleri</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=aurl?>/index.php?s=haber-ekle">
													<i class="icons icon-plus" aria-hidden="true"></i>
													Haber Ekle
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=haber">
													<i class="icons icon-docs" aria-hidden="true"></i>
													Tüm Haberler
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=haber-kategori">
													<i class="icons icon-list" aria-hidden="true"></i>
													Haber Kategorileri
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=haberyorumislemleri">
													<i class="icon-bubbles icons" aria-hidden="true"></i>
													Haber Yorumları
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="icons icon-social-youtube" aria-hidden="true"></i>
											<span>Video İşlemleri</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=aurl?>/index.php?s=video-ekle">
													<i class="icons icon-plus" aria-hidden="true"></i>
													Video Ekle
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=videolar">
													<i class="icons icon-social-youtube" aria-hidden="true"></i>
														Tüm Videolar
												</a>
											</li>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="icons icon-speech" aria-hidden="true"></i>
											<span>Kullanıcı Yorumları</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=aurl?>/index.php?s=yorum-ekle">
													<i class="icons icon-plus" aria-hidden="true"></i>
													Yorum Ekle
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=kullanici-yorumlar">
													<i class="icons icon-docs" aria-hidden="true"></i>
													Tüm Yorumlar
												</a>
											</li>
										</ul>
									</li>
									<li>
										<a href="<?=aurl?>/index.php?s=iletisim">
											<i class="icons icon-envelope" aria-hidden="true"></i>
											<span>İletişim</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="icons icon-settings" aria-hidden="true"></i>
											<span>Ayarlar</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=aurl?>/index.php?s=site-ayar">
													<i class="icons icon-wrench" aria-hidden="true"></i>
													Site Ayarları
												</a>
											</li>
											<li>
												<a href="<?=aurl?>/index.php?s=sifre-yenile">
													<i class="icons icon-lock" aria-hidden="true"></i>
													Şifre Değiştir
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">


					<!-- start: page -->
					<?php
						$dosyakilitac = true;
						$dosyaad = get("s") ? get("s") : "index";
						$dosya = __DIR__."/inc/".mb_strtolower($dosyaad,"UTF-8").".php";
						if(file_exists($dosya)) require_once $dosya;
						else header("Location:".aurl);
					?>

					<!-- end: page -->
				</section>
			</div>
		</section>
		<?php
			}
			else
			{
				$dosya = realpath(".")."/inc/giris.php";
				if(file_exists($dosya)) require_once $dosya;

			}
		?>


		<!-- Vendor -->
		<script src="<?=aassurl?>/vendor/jquery/jquery.js"></script>
		<script src="<?=aassurl?>/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?=aassurl?>/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?=aassurl?>/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?=aassurl?>/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?=aassurl?>/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?=aassurl?>/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		<script src="<?=aassurl?>/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?=aassurl?>/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="<?=aassurl?>/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?=aassurl?>/vendor/summernote/summernote.js"></script>
		<script src="<?=aassurl?>/vendor/owl.carousel/owl.carousel.min.js"></script>


		<!-- Theme Base, Components and Settings -->
		<script src="<?=aassurl?>/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="<?=aassurl?>/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?=aassurl?>/javascripts/theme.init.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				var sayiuret = Math.floor((Math.random() * 10000) + 1);
				$(".metinduzenle").after('<textarea name="'+$(".metinduzenle").data("text-name")+'" class="editorclass'+sayiuret+' hidden" cols="30" rows="10"></textarea>');
				$(".metinduzenle").summernote
				({
					height: "20em",
					callbacks: {
					onChange: function (contents, $editable) {
					var code = $(this).summernote("code");
					$(".editorclass"+sayiuret).val(code);
					}
					}
				});
			});
		</script>
	</body>
</html>


<?php

		ob_end_flush();
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
		exit;
	}
