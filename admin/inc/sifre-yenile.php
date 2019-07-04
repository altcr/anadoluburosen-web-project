<?php

	if($_POST){
		if(post("btn_kaydet")){
			if(post("sifre") and post("sifre-tekrar")){
				if(post("sifre") == post("sifre-tekrar")){
					$yenile=$db->update("adminler")->where("id",akb("id"))
										->set(array(
											"sifre" => post("sifre")
										));

					if($yenile){
						$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-check"></i> Başarılı!</strong> Şifreniz başarıyla güncellendi!</div>';
					}
					else{
						$sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Hata!</strong> Bir hata oluştu. Lütfen tekrar deneyin!</div>';
					}
				}
				else{
					$sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Hata!</strong> Şifreler eşleşmiyor!</div>';
				}
			}
			else{
				$sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Hata!</strong> Lütfen alanları boş bırakmayın!</div>';
			}
		}
	}

?>
			<div class="row">
				<div class="col-md-12">
					<?=$sayfahata?>
					<section class="panel">
						<header class="panel-heading">
							<h2 class="panel-title">Şifre Yenile</h2>
						</header>
						<div class="panel-body">
							<form action="" class="form-horizontal form-bordered" method="post">
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Yeni Şifre:</label>
									<div class="col-md-9">
										<input type="password" name="sifre" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="Link">Yeni Şifre Tekrar:</label>
									<div class="col-md-9">
										<input type="password" name="sifre-tekrar" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12" style="text-align:right !important">
										<input type="submit" class="btn btn-success" value="Kaydet" name="btn_kaydet">
									</div>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>
