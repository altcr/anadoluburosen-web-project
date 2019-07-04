			<footer id="footer" class="m-0">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div id="googlemaps2" class="google-map m-0" style="height: 250px;"></div>
						</div>
						<div class="col-lg-3">
							<h4 class="mb-4">Adres</h4>
							<p>
								<?=$adres?>
							</p>
							<div class="contact-details">
								<h4 class="mb-4">İletişim</h4>
								<a class="text-decoration-none" href="tel:1234567890">
									<strong class="font-weight-light"><?=$tel?></strong>
								</a>
							</div>
						</div>
						<?php
							if(is_array($sosyal_meyda) and !empty($sosyal_meyda))
							{
								echo '<div class="col-lg-2 ml-lg-auto">
												<h4 class="mb-4">Sosyal Medya</h4>
												<ul class="social-icons">';
													foreach ($sosyal_meyda as $val) {
														echo '<li class="social-icons-'.$val["icon"].'">
																		<a href="'.$val["url"].'" target="_blank" title="'.$val["baslik"].'">
																			<i class="fa fa-'.$val["icon"].'"></i>
																		</a>
																	</li>';
													}
									echo '</ul>
										</div>';
							}
						 ?>
					</div>
				</div>
				<div class="footer-copyright pt-3 pb-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 text-center m-0">
								<p>© Copyright 2018. Tüm Hakları Saklıdır.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="<?=assurl?>/js/jquery.min.js"></script>
		<script src="<?=assurl?>/js/jquery.appear.min.js"></script>
		<script src="<?=assurl?>/js/jquery.easing.min.js"></script>
		<script src="<?=assurl?>/js/jquery-cookie.min.js"></script>
		<script src="<?=assurl?>/js/popper.min.js"></script>
		<script src="<?=assurl?>/js/bootstrap.min.js"></script>
		<script src="<?=assurl?>/js/common.min.js"></script>
		<script src="<?=assurl?>/js/jquery.validation.min.js"></script>
		<script src="<?=assurl?>/js/jquery.easy-pie-chart.min.js"></script>
		
		<script src="<?=assurl?>/js/jquery.lazyload.min.js"></script>
		<script src="<?=assurl?>/js/jquery.isotope.min.js"></script>
		<script src="<?=assurl?>/js/owl.carousel.min.js"></script>
		<script src="<?=assurl?>/js/jquery.magnific-popup.min.js"></script>
		<script src="<?=assurl?>/js/vide.min.js"></script>
		<script src="<?=assurl?>/js/modernizr.min.js"></script>
		<script src="<?=assurl?>/player/build/mediaelement-and-player.min.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9xxs4CVeKuPZu9MYHzbBTPCzbJNHL46g&callback=initMap"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="<?=assurl?>/js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?=assurl?>/js/jquery.themepunch.tools.min.js"></script>

		<script src="<?=assurl?>/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?=assurl?>/js/view.contact.js"></script>

		<!-- Demo -->
		<script src="<?=assurl?>/js/demo-medical.js"></script>

		<!-- Theme Custom -->
		<script src="<?=assurl?>/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="<?=assurl?>/js/theme.init.js"></script>
		<?php 
			$koordinats = explode(",",$site_ayar_cek["koordinat"])
		?>
		<script>
			function initMap() {
			var uluru = {lat: <?=$koordinats[0]?>, lng: <?=$koordinats[1]?>};

			var map = new google.maps.Map(document.getElementById('googlemaps2'), {
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

	</body>
</html>
