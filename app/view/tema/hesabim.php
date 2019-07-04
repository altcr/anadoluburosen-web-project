  <?php require_once "inc/header.php";?>
    <section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="mt-1">Hesabım <span>Aşağıdaki bilgileri doldurarak sitemize üye olabilirsiniz.</span></h1>
          </div>
          <div class="col-lg-6">
            <ul class="breadcrumb">
              <li><a href="<?=url?>">Ana Sayfa</a></li>
              <li>HESABIM</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-md-pull-9">
          <aside class="sidebar">
            <ul class="nav nav-list">
              <li class="col-md-12 active"><a id="hesabim-list-a" data-id="kisisel-change">Kişisel Bilgilerim</a></li>
              <li class="col-md-12"><a id="hesabim-list-a" data-id="sifre-change">Şifre Değiştir</a></li>
              <li class="col-md-12"><a href="<?=url?>/hesabim?islem=cikis">Çıkış</a></li>
            </ul>

          </aside>
        </div>
        <div class="col-md-9 col-md-push-3 my-account form-section">
          <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-0 hesabim-div" id="kisisel-change">
            <div class="box-content">
              <form action="" method="post">
								<h4 class="heading-primary text-uppercase mb-lg">ÜYE BİLGİLERİ</h4>
								<div class="row">
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Ad <font color="red">*</font></label>
											<input type="text" class="form-control" value='<?=!empty(kb("ad")) ? kb("ad") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Soyad <font color="red">*</font></label>
											<input type="text" class="form-control" value='<?=!empty(kb("soyad")) ? kb("soyad") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Email <font color="red">*</font></label>
											<input type="email" class="form-control" value='<?=!empty(kb("email")) ? kb("email") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Tel </label>
											<input type="tel" class="form-control" value='<?=!empty(kb("tel")) ? kb("tel") : null ?>' required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">İl <font color="red">*</font></label>
											<div class="form-group">
												<div class="form-group">
											    <select class="form-control" id="select-iller" data-ajax-request-url="<?=ajax_encode("ilceler");?>" required>
											      <option value="">Seçiniz</option>
											      <?php
															foreach ($iller as $val) {
																echo '<option value="'.$val["id"].'" '.(kb("il_id")==$val["id"] ? "selected" : null).'>'.$val["il"].'</option>';
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
										    <select class="form-control" name="ilce" id="ilceler" required>
													<option value="">Seçiniz</option>
													<option value="1">asd</option>
										    </select>
										  </div>
										</div>
									</div>
									<div class="col-md-12">
										<p class="float-right mt-lg mb-none"><font color="red">*</font> Zorunlu Alanlar</p>
									</div>
									<div class="col-md-12">
										<input type="submit" name="btnBilgiDegistir" class="btn btn-success float-right" value="Kaydet">
									</div>
								</div>
							</form>
            </div>
          </div>

          <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-0 hesabim-div" id="sifre-change">
            <div class="box-content">
              <form action="" method="post">
								<h4 class="heading-primary text-uppercase mb-lg">ŞİFRE DEĞİŞTİR</h4>
								<div class="row">
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Şifre <font color="red">*</font></label>
											<input type="password" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6 col-xs-12">
										<div class="form-group">
											<label class="font-weight-normal">Şifre Tekrar <font color="red">*</font></label>
											<input type="password" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12">
										<p class="float-right mt-lg mb-none"><font color="red">*</font> Zorunlu Alanlar</p>
									</div>
									<div class="col-md-12">
										<input type="submit" name="btnSifreDegistir" class="btn btn-success float-right" value="Kaydet">
									</div>
								</div>
							</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php require_once "inc/footer.php";?>
