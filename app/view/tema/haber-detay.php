<?php require_once "inc/header.php";?>

<div class="container mt-4">
	<div class="row">
		<div class="col-md-9">
			<div class="blog-posts single-post">
				<article class="post post-large blog-single-post">
					<div class="post-image single">
						<img class="img-thumbnail" src="<?=upurl?>/<?=$blog["icerik_img"]?>" alt="<?=$blog["baslik"]?>" title="<?=$blog["baslik"]?>">
					</div>

					<div class="post-date">
						<span class="day"><?=turkcetarih("d",$blog["tarih"])?></span>
						<span class="month"><?=turkcetarih("M",$blog["tarih"])?></span>
					</div>

					<div class="post-content">
						<h2><a href="<?=$blogitemurl?>"><?=$blog["baslik"]?></a></h2>
						<div class="post-meta">
							<span><i class="icon-tag icons"></i> Etiketler: <?=$konuetiketler?></span>
							<span><i class="icon-bubbles icons"></i> <a href="#comments"><?=$konuyorumsay?></a></span>
						</div>
						<p><?=$blog["icerik"]?></p>

						<div class="post-block post-share">
							<h3 class="heading-primary"><i class="icon-action-redo icons"></i>Bu Yazıyı Paylaş</h3>
								<div class="featured-boxes featured-boxes-style-6">
						<div class="row">
							<div class="col-md-2">
								<a href="<?=$paylasfacebook?>" class="sosyalpaylaspencere">
									<span class="featured-boxes featured-boxes-style-6 p-none m-none">
										<span class="featured-box featured-box-effect-6 p-none m-none">
											<span class="box-content p-none m-none">
												<i class="icon-featured icons icon-social-facebook" style="background:#47639E;color:#fff"></i>
												<p>Facebook</p>
											</span>
										</span>
									</span>
								</a>
							</div>
							<div class="col-md-2">
								<a href="<?=$paylastwitter?>" class="sosyalpaylaspencere">
									<span class="featured-boxes featured-boxes-style-6 p-none m-none">
										<span class="featured-box featured-box-effect-6 p-none m-none">
											<span class="box-content p-none m-none">
												<i class="icon-featured icons icon-social-twitter" style="background:#55ACEE;color:#fff"></i>
												<p>Twitter</p>
											</span>
										</span>
									</span>
								</a>
							</div>
							<div class="col-md-2">
								<a href="<?=$paylasgplus?>" class="sosyalpaylaspencere">
									<span class="featured-boxes featured-boxes-style-6 p-none m-none">
										<span class="featured-box featured-box-effect-6 p-none m-none">
											<span class="box-content p-none m-none">
												<i class="icon-featured fa fa-google-plus" style="background:#dc4e41;color:#fff"></i>
												<p>Google+</p>
											</span>
										</span>
									</span>
								</a>
							</div>
							<div class="col-md-2">
								<a href="<?=$paylaslinkedin?>" class="sosyalpaylaspencere">
									<span class="featured-boxes featured-boxes-style-6 p-none m-none">
										<span class="featured-box featured-box-effect-6 p-none m-none">
											<span class="box-content p-none m-none">
												<i class="icon-featured icons icon-social-linkedin" style="background:#005988;color:#fff"></i>
												<p>Linkedin</p>
											</span>
										</span>
									</span>
								</a>
							</div>
							<div class="col-md-2">
								<a href="<?=$paylasemail?>" class="sosyalpaylaspencere">
									<span class="featured-boxes featured-boxes-style-6 p-none m-none">
										<span class="featured-box featured-box-effect-6 p-none m-none">
											<span class="box-content p-none m-none">
												<i class="icon-featured icons icon-envelope"></i>
												<p>Eposta</p>
											</span>
										</span>
									</span>
								</a>
							</div>
						</div>
					</div>
						</div>
						<div class="post-block post-comments clearfix" id="comments">
							<h3 class="heading-primary"><i class="icon-bubbles icons"></i>Yorumlar</h3>
							<ul class="comments">
								<?=haber_yorumlar(1,$blog["id"])?>
							</ul>
						</div>
						<div class="post-block post-leave-comment" id="yorumyaz">
							<h3 class="heading-primary">Hadi Bir Yorumda Sen Bırak!</h3>
							<?=$sayfamesaj?>
							<form action="<?=url."/".implode("/",$_url)?>/yorumyaz" method="post">
								<input type="hidden" name="altid" id="yorumaltid" value="-1" />
								<div class="alert alert-info" id="altyorumbilgi" style="display:none"><i class="fa fa-info"></i> Şuan da <strong></strong> adlı kullanıcıya cevap veriyorsunuz
								<button type="button" class="btn btn-info right" id="altyorumiptal" aria-label="Close"><span aria-hidden="true">İptal Et</span></button></div>
								<div class="form-group">
									<div class="col-md-6 pl-0">
										<label>Ad Soyad <font color="red">*</font></label>
										<input type="text" value="" maxlength="100" class="form-control" name="adsoyad" id="name" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-6 pl-0">
										<label>E-Mail <font color="red">*</font></label>
										<input type="email" value="" maxlength="100" class="form-control" name="email" id="email" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 pl-0">
										<label>Yorum <font color="red">*</font></label>
										<textarea maxlength="500" rows="10" class="form-control" name="mesaj" id="mesaj" required></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Yorum Yap" class="btn btn-primary btn-lg" data-loading-text="Loading...">
									</div>
								</div>
							</form>
						</div>
					</div>
				</article>
			</div>
		</div>
		<div class="col-md-3">
			<?php include "haber-right.php";?>
		</div>
	</div>
</div>

<?php require_once "inc/footer.php";?>
