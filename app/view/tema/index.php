			<?php require_once "inc/header.php";?>
			<div class="container">
							<div class="row"><div class="col-md-12">
							<style type="text/css">
								.slider-container.rev_slider_wrapper{
									width: calc(100% + 30px) !important; left: -15px !important;
								}
							</style>
							<div class="slider-container rev_slider_wrapper" style="height: 650px;">
							
								<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 450, 'disableProgressBar': 'on', 'navigation': {'bullets': {'enable': true, 'direction': 'vertical', 'h_align': 'right', 'v_align': 'center', 'space': 5}, 'arrows': {'enable': false}}}">
									<ul>
										
										<?php if(date("dm") == "0803"){?>
										<li data-transition="random">
											<img src="<?=url?>/uploads/sliders/d4e4c1bfef0a4c9988b82c16dd13ea25.jpg"
												alt="Slider"
												data-bgposition="center center"
												data-bgfit="cover"
												data-bgrepeat="no-repeat"
												class="rev-slidebg">
										</li>	
										<?php } if(date("dm") == "1803"){?>
										<li data-transition="random">
											<img src="<?=url?>/uploads/sliders/3ff5d87acfc434ef19fe64ed18cb835d.jpg"
												alt="Slider"
												data-bgposition="center center"
												data-bgfit="cover"
												data-bgrepeat="no-repeat"
												class="rev-slidebg">
										</li>
										<?php } if(date("dm") == "2203"){?>
										<li data-transition="random-static">
											<img src="<?=url?>/uploads/sliders/17961ce742bf8904849d758c3302095b.jpg"
												alt="Slider"
												data-bgposition="center center"
												data-bgfit="cover"
												data-bgrepeat="no-repeat"
												class="rev-slidebg">
										</li>
										<?php }?>
										<li data-transition="random">
											<img src="<?=url?>/uploads/sliders/b8ff5526b6a1d291fe8357c1930cebb8.jpg"
												alt="Slider"
												data-bgposition="center center"
												data-bgfit="cover"
												data-bgrepeat="no-repeat"
												class="rev-slidebg">
										</li>
										
										<?=$slider?>
									</ul>
								</div>
							</div></div></div>
					</div>
					<section class="section-custom-medical d-none d-sm-block">
						<div class="container">
							<div class="row medical-schedules">
								<div class="col-xl-3 box-one background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
									<div class="feature-box feature-box-style-2 align-items-center p-4">
										<div class="feature-box-icon p-0">
											<img src="<?=assurl?>/img/hand.png" alt="El Sıkışma" class="img-fluid pt-1" />
										</div>
										<div class="feature-box-info">
											<h4 class="m-0 p-0"><?=$SendikaIsim?></h4>
										</div>
									</div>
								</div>
								<div class="col-xl-3 box-two background-color-tertiary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
									<h5 class="m-0">
										<a href="<?=url?>/p/vizyonumuz" title="VİZYONUMUZ">
											VİZYONUMUZ
											<i class="icon-arrow-right-circle icons"></i>
										</a>
									</h5>
								</div>
								<div class="col-xl-3 box-two background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
									<h5 class="m-0">
										<a href="<?=url?>/p/misyonumuz" title="MİSYONUMUZ">
											MİSYONUMUZ
											<i class="icon-arrow-right-circle icons"></i>
										</a>
									</h5>
								</div>
								<div class="col-xl-3 box-four background-color-secondary p-0 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
									<a href="<?=url?>/iletisim" class="text-decoration-none">
										<div class="feature-box feature-box-style-2 m-0">
											<div class="feature-box-icon">
												<i class="icon-call-out icons"></i>
											</div>
											<div class="feature-box-info">
												<label class="font-weight-light">MERKEZ ŞUBE</label>
												<strong class="font-weight-normal">İLETİŞİM</strong>
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</section>
					<section class="section-custom-medical">
						<div class="container">
							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-8">
									<h2 class="font-weight-semibold mb-0">Hakkımızda</h2>
									<p class="lead font-weight-normal">Anadolu Büro çalışanları Sendikası</p>

									<p>EKSEN Büro Çalışanları Sendikası ,  çağdaş sendikacılığın genel normlarını esas almakla birlikte,“sivil, milli, katılımcı ve manevi değerlerimize bağlılığı”  temel ilke kabul eden bir anlayışla yola çıkmıştır.</p>

									<a href="<?=url?>/p/hakkimizda" class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold">Devamı</a>
								</div>
								<div class="col-md-4">
									<video style="height:250px;width:250px" poster="<?=upurl?>/tanitimkapak.png" preload="none">
										<source src="<?=upurl?>/tanitim.mp4?v=1" type="video/mp4">
									</video>
								</div>
							</div>
						</div>
					</section>
					<?php if(count($haber)>0){ ?>
					<section class="section mt-0">
						<div class="container">
							<div class="row pt-3">
								<div class="col">
									<h2 class="font-weight-semibold mb-0">Haber</h2>
									<p class="lead font-weight-normal">En güncel haber yazılarımız ve daha fazlası.</p>
								</div>
							</div>
							<div class="row">
								<?=$haberitem?>
							</div>
							<div class="row pb-4">
								<div class="col-lg-12 text-center">
									<a href="<?=url?>/haberler" class="btn btn-outline btn-quaternary custom-button text-uppercase font-weight-bold">Daha Fazla</a>
								</div>
							</div>
						</div>
					</section>
					<?php } ?>

					<?php if(count($blog)>0){ ?>
					<section>
						<div class="container">
							<div class="row pt-3">
								<div class="col">
									<h2 class="font-weight-semibold mb-0">Blog</h2>
									<p class="lead font-weight-normal">En güncel blog yazılarımız ve daha fazlası.</p>
								</div>
							</div>
							<div class="row">
								<?=$blogitem?>
							</div>
							<div class="row pb-4">
								<div class="col-lg-12 text-center">
									<a href="<?=url?>/blog" class="btn btn-outline btn-quaternary custom-button text-uppercase font-weight-bold">Daha Fazla</a>
								</div>
							</div>
						</div>
					</section>
					<?php } ?>

					<?php if(count($video)>0){ ?>
					<section class="section <?= count($video)>0 ? null : "mb-none" ?>">
						<div class="container">
							<div class="row pt-4">
								<div class="col">
									<h2 class="font-weight-semibold mb-0">Videolarımız</h2>
									<p class="lead font-weight-normal">En güncel videolarımız ve daha fazlası.</p>
								</div>
							</div>
							<div class="row">
								<?=$videoitem?>
							</div>
							<div class="row pb-4">
								<div class="col-lg-12 text-center">
									<a href="<?=url?>/videolar" class="btn btn-outline btn-quaternary custom-button text-uppercase font-weight-bold">Daha Fazla</a>
								</div>
							</div>
						</div>
					</section>
					<?php } ?>
					<section>
						<div class="container">
							<div class="row pt-4">
								<div class="col">
									<h2 class="font-weight-semibold mb-0">Sendikalarımız</h2>
									<p class="lead font-weight-normal">Diğer sendikalarımıza aşağıdaki bağlantılardan ulaşabilirsiniz.</p>
								</div>
							</div>
							<div class="row mb-5 pb-4">
								<div class="col">
									<div class="content-grid">
										<div class="row content-grid-row pl-3 pr-3">
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://www.eksendiyanetvakifsen.org/" target="_blank" title="EKSEN DİYANET VE VAKIF ÇALIŞANLARI SENDİKASI"><img src="<?=upurl?>/sendikalar/1.png" title="EKSEN DİYANET VE VAKIF ÇALIŞANLARI SENDİKASI" alt="EKSEN DİYANET VE VAKIF ÇALIŞANLARI SENDİKASI" class="img-fluid" /></a>
											</div>
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://anadolutapusen.org/" target="_blank" title="TAPU VE KADASTRO İMAR İNŞAA YOL YAPI ÇALIŞANLARI SENDİKASI"><img src="<?=upurl?>/sendikalar/3.png" title="TAPU VE KADASTRO İMAR İNŞAA YOL YAPI ÇALIŞANLARI SENDİKASI" alt="TAPU VE KADASTRO İMAR İNŞAA YOL YAPI ÇALIŞANLARI SENDİKASI" class="img-fluid" /></a>
											</div>
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://www.eksenenerjisen.org/" target="_blank" title="EKSEN ENERJİ, SANAYİ VE MADENCİLİK HİZMETLERİ ÇALIŞANLARI SENDİKASI"><img src="<?=upurl?>/sendikalar/4.png" title="EKSEN ENERJİ, SANAYİ VE MADENCİLİK HİZMETLERİ ÇALIŞANLARI SENDİKASI" alt="EKSEN ENERJİ, SANAYİ VE MADENCİLİK HİZMETLERİ ÇALIŞANLARI SENDİKASI" class="img-fluid" /></a>
											</div>
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://www.eksentarimorman.org/" target="_blank" title="EKSEN TARIM ve ORMAN ÇALIŞANLARI SENDİKASI"><img src="<?=upurl?>/sendikalar/5.png" title="EKSEN TARIM ve ORMAN ÇALIŞANLARI SENDİKASI" alt="EKSEN TARIM ve ORMAN ÇALIŞANLARI SENDİKASI" class="img-fluid" /></a>
											</div>
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://anadolusen.org/" target="_blank" title="EĞİTİM KURUMLARI ÇALIŞANLARI SENDİKASI"><img src="<?=upurl?>/sendikalar/6.png" title="EĞİTİM KURUMLARI ÇALIŞANLARI SENDİKASI" alt="EĞİTİM KURUMLARI ÇALIŞANLARI SENDİKASI" class="img-fluid" /></a>
											</div>
											<div class="content-grid-item col-md-3 col-lg-2 text-center">
												<a href="http://anadolusen.org/" target="_blank" title="ANADOLU EKSEN KAMU ÇALIŞANLARI SENDİKALARI KONFEDERASYONU"><img src="<?=upurl?>/sendikalar/7.png" title="ANADOLU EKSEN KAMU ÇALIŞANLARI SENDİKALARI KONFEDERASYONU" alt="ANADOLU EKSEN KAMU ÇALIŞANLARI SENDİKALARI KONFEDERASYONU" class="img-fluid" /></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section class="section-secondary">
						<div class="container">
							<div class="row pt-5 pb-5">
								<div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false, 'dots': false}">
									<?=$yorum_item?>
								</div>
							</div>
						</div>
					</section>
			<?php require_once "inc/footer.php";?>
