<?php require_once "inc/header.php";?>
  <section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="mt-1">Giriş Yap <span>Aşağıdaki gerekli alanları doldurarak sitemize giriş yapabilirsiniz.</span></h1>
        </div>
        <div class="col-lg-6">
          <ul class="breadcrumb">
            <li><a href="<?=url?>">Ana Sayfa</a></li>
            <li>GİRİŞ YAP</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="form-section mb-4">
    <div class="container">
      <?=$sayfaHata?>
      <div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
        <div class="box-content">
          <form action="" method="post">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-content">
                  <h3 class="heading-text-color font-weight-normal">HESAP OLUŞTUR</h3>
                  <p>Hala üye olmadıysanız aşağıdaki Üye Ol butonu yardımıyla üyelik sayfasına gidip, formu doldurarak üyeliğinizi gerçekleştirebilirsiniz.</p>
                </div>
                <div class="form-action clearfix">
                  <a href="<?=url?>/uye-ol" class="btn btn-primary">Üye Ol</a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-content">
                  <h3 class="heading-text-color font-weight-normal">GİRİŞ BİLGİLERİ</h3>
                  <div class="form-group">
                    <label class="font-weight-normal">Email <font color="red">*</font></label>
                    <input type="text" name="email" class="form-control" value='<?=!empty(post("email")) ? post("email") : null ?>' required>
                  </div>
                  <div class="form-group">
                    <label class="font-weight-normal">Şifre <font color="red">*</font></label>
                    <input type="password" name="sifre" class="form-control" value='<?=!empty(post("sifre")) ? post("sifre") : null ?>' required>
                  </div>
                </div>
                <div class="col-md-12 pl-0">
                  <p class="float-right mt-lg mb-none"><font color="red">*</font> Zorunlu Alanlar</p>
                  <div class="form-action clearfix mt-none">
                    <a href="#" class="pull-left">Şifremi Unuttum</a>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" name="giris" class="btn btn-primary float-right" value="Giriş">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php require_once "inc/footer.php";?>
