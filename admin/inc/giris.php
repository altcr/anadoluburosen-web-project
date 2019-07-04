		<section class="body-sign">
			<div class="center-sign">
				<?=$sayfahata?>
				<a href="<?=aurl?>">
					<img src="<?=upurl?>/<?=$logo?>" height="" width="100%" alt="Artı Başarı Dijital Eğitim Platformu" />
				</a>

				<div class="panel panel-sign mt-xs">
					<div class="panel-body">
						<form action="<?=aurl?>/index.php?s=girisyap" method="post">
							<div class="form-group mb-lg">
								<label>Kullanıcı Adı</label>
								<div class="input-group input-group-icon">
									<input name="kadi" type="text" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Şifre</label>
								</div>
								<div class="input-group input-group-icon">
									<input type="password" name="sifre" class="form-control input-lg" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 text-center">
									<button type="submit" class="btn btn-primary hidden-xs">Giriş Yap</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Giriş Yap</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">© Copyright 2016. Tüm hakları saklıdır.</p>
			</div>
		</section>
