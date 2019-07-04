		<?php require_once "inc/header.php";?>
			<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<h1 class="mt-1">Üye Ol <span>Aşağıdaki bilgileri doldurarak sitemize üye olabilirsiniz.</span></h1>
						</div>
						<div class="col-lg-6">
							<ul class="breadcrumb">
								<li><a href="<?=url?>">Ana Sayfa</a></li>
								<li>ÜYE OL</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<section class="form-section register-form">
				<div class="container">
					<?=$sayfaHata?>
					<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
						<div class="box-content">
							<form action="" method="post">
								<h4 class="heading-primary text-uppercase mb-lg">ÜYE BİLGİLERİ</h4>
								<div class="row">
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Ad <font color="red">*</font></label>
											<input type="text" name="ad" class="form-control" value='<?=!empty(post("ad")) ? post("ad") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Soyad <font color="red">*</font></label>
											<input type="text" name="soyad" class="form-control" value='<?=!empty(post("soyad")) ? post("soyad") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Email <font color="red">*</font></label>
											<input type="email" name="email" class="form-control" value='<?=!empty(post("email")) ? post("email") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Tel </label>
											<input type="tel" name="tel" class="form-control" value='<?=!empty(post("tel")) ? post("tel") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">İl <font color="red">*</font></label>
											<div class="form-group">
												<div class="form-group">
											    <select class="form-control" name="il" id="select-iller" data-ajax-request-url="<?=ajax_encode("ilceler");?>" required>
											      <option value="">Seçiniz</option>
											      <?php
															foreach ($iller as $val) {
																$selected="";
																if($_POST and post("il")!=1 and post("il")==$val["id"])
																	$selected="selected";
																echo '<option value="'.$val["id"].'" '.$selected.'>'.$val["il"].'</option>';
															}
														?>
											    </select>
											  </div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">İlçe <font color="red">*</font></label>
											<div class="form-group">
										    <select class="form-control" name="ilce" id="ilceler" disabled required>
													<option value="">Seçiniz</option>
										    </select>
										  </div>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Şifre <font color="red">*</font></label>
											<input type="password" name="sifre" class="form-control" value='<?=!empty(post("sifre")) ? post("sifre") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Şifre Tekrar <font color="red">*</font></label>
											<input type="password" name="sifre_tekrar" class="form-control" value='<?=!empty(post("sifre_tekrar")) ? post("sifre_tekrar") : null ?>' required>
										</div>
									</div>
									<div class="col-md-12">
										<p class="float-right mt-lg mb-none"><font color="red">*</font> Zorunlu Alanlar</p>
										<div class="form-action clearfix mt-none">
											<a href="<?=url?>/giris-yap" class="pull-left"><i class="fa fa-angle-double-left"></i> Geri</a>
										</div>
									</div>
									<div class="col-md-12">
										<input type="submit" class="btn btn-success float-right" value="Kayıt Ol">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		<?php require_once "inc/footer.php";?>
