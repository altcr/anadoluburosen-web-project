<?php require_once "inc/header.php";?>

	<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<h1 class="mt-1">İletişim <span>Aşağıdaki formdan bizimle iletişime geçebilirsiniz.</span></h1>
				</div>
				<div class="col-lg-6">
					<ul class="breadcrumb">
						<li><a href="<?=url?>">Ana Sayfa</a></li>
						<li class="active">İLETİŞİM</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

		<div class="row mt-5">
			<div class="col-lg-4">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon pt-0">
						<i class="icon-location-pin icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="mb-2">Adres</h4>
						<p class="text-4">
							<?=$adres?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon pt-0">
						<i class="icon-phone icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="mb-2">Tel</h4>
						<p class="text-4">
							<?=$tel?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="feature-box feature-box-style-2">
					<div class="feature-box-icon pt-0">
						<i class="icon-envelope icons"></i>
					</div>
					<div class="feature-box-info">
						<h4 class="mb-2">Email</h4>
						<p class="text-4">
							<?=$email?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<hr class="solid">
		<div class="row pt-4 mb-4">
			<?=$mesaj?>
			<div class="col-lg-6">
				<div id="googlemaps" class="google-map m-0 mb-5"></div>
			</div>
			<div class="col-lg-6">
				<h4 class="font-weight-semibold mb-4">Bize Ulaşın</h4>
				<form action="" method="POST">
					<div class="form-row">
						<div class="form-group col">
							<input type="text" placeholder="Adınız" maxlength="100" class="form-control" name="adsoyad" id="name" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="email" placeholder="Email Adresiniz" data-msg-email="Lütfen geçerli bir Email adresi giriniz." maxlength="100" class="form-control" name="email" id="email" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="text" placeholder="Telefon No" maxlength="100" class="form-control" name="tel" id="tel" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<textarea maxlength="5000" placeholder="Mesaj" rows="5" class="form-control" name="mesaj" id="message" required></textarea>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col">
							<input type="submit" value="Gönder" class="btn btn-primary btn-lg mb-5">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
	<?php 
		$koordinats = explode(",",$site_ayar_cek["koordinat"])
	?>
		function initMap() {
		var uluru = {lat: <?=$koordinats[0]?>, lng: <?=$koordinats[1]?>};

		var map = new google.maps.Map(document.getElementById('googlemaps'), {
			scrollwheel: false,
			zoom: 16,
			center: uluru
		});

		var marker = new google.maps.Marker({
			position: uluru,
			map: map,
		});

		var infowindow = new google.maps.InfoWindow({
			title: "<?=$SendikaIsim?> Adres Bilgileri",
			content: "<center><h5><?=$SendikaIsim?></h5><center><?=$SendikaIsim?> Harita Konumu"
		});


		 infowindow.open(map, marker);

		}
	</script>

<?php require_once "inc/footer.php";?>
