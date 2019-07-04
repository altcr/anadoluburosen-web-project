<?php

	$bilgi="";
	$uye="";
	$hata="";

	$uyeler=$db->select("kullanicilar")->run();
	if(count($uyeler) == 0){
		$bilgi .= '<div class="col-md-12 m-none p-none">
						<div class="alert alert-warning">
							<strong><i class="fa fa-newspaper-o"></i> Üye Bulunmamaktadır!</strong>
						</div>
				   </div>';
	}
	else{
		foreach($uyeler as $val){
			$uye .= '<tr>
						<td style="vertical-align: middle;">'.$val["ad"].' '.$val["soyad"].'</td>
						<td style="vertical-align: middle;">'.$val["tel"].'</td>
						<td style="vertical-align: middle;">'.$val["email"].'</td>
						<td style="vertical-align: middle;" class="center">
							<a href="'.aurl.'/index.php?s=uyeler&i=duzenle&id='.$val["id"].'" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Kaydı Düzenle"><i class="fa fa-pencil"></i></a>
							<a href="'.aurl.'/index.php?s=uyeler&i=sil&id='.$val["id"].'" onclick="return confirm(\'Üyeyi Silmek İstediğinize Emin Misiniz?\')" class="btn btn-danger"  data-toggle="tooltip" data-placement="top" data-original-title="Kaydı Sil"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>';
		}
	}

	$uyeupdate="";
	if(get("i") and get("id") and is_numeric(get("id")) and get("i")=="duzenle"){
		$uyeupdate=$db->select("kullanicilar")
						->where("id",get("id"))
						->limit(1)
						->run(true);
	}

	$hatasayfaul="";
	if(post("btn_guncelle")){
		if(!post("ad") or !post("soyad") or !post("tel") or !post("email"))
		{
			$hatasayfaul .= "<li>Lütfen Boş Alan Bırakmayınız!</li>";
		}

		if($hatasayfaul != ""){

			$hata ='<div class="alert alert-danger">
        				<strong><i class="fa fa-warning"></i> Hata!</strong> Aşağıdaki Nedenlerden Dolayı Üye Güncellenemedi. Lütfen Tekrar Deneyiniz.
        			</div>';
		}
		else
		{
      $update=$db->update("kullanicilar")
                 ->where("id",get("id"))
                 ->set(array(
                   "email" => post("email"),
                   "ad" => post("ad"),
                   "soyad" => post("soyad"),
                   "tel" => post("tel")
                 ));
      if ($update) {
        $hata='<div class="alert alert-success">
        					<strong><i class="fa fa-check"></i> Başarılı!</strong> Üye Başarıyla güncellendi.
        				</div>';
        header("refresh:2; url=".aurl."/index.php?s=uyeler");
      }
      else {
        $hata='<div class="alert alert-danger">
        					<strong><i class="fa fa-warning"></i> Hata!</strong> Üye Güncellenemedi. Lütfen Tekrar Deneyiniz.
        				</div>';
        header("refresh:2; url=".aurl."/index.php?s=uyeler");
      }
		}
	}

	if(get("i") and get("id") and is_numeric(get("id")) and get("i")=="sil"){
    $kontrol=$db->select("kullanicilar")->where("id", get("id"))->limit(1)->run(true);
    if($kontrol){
      $delete=$db->delete("kullanicilar")->where("id",$kontrol["id"])->done();
      if($delete){
        $hata='<div class="alert alert-success">
                  <strong><i class="fa fa-check"></i> Başarılı!</strong> Üye Başarıyla Silindi.
                </div>';
        header("refresh:2; url=".aurl."/index.php?s=uyeler");
      }
      else {
        $hata='<div class="alert alert-danger">
                  <strong><i class="fa fa-warning"></i> Hata!</strong> Üye Silinemedi. Lütfen Tekrar Deneyiniz.
                </div>';
        header("refresh:2; url=".aurl."/index.php?s=uyeler");
      }
    }
	}

?>
			<?php if(!$bilgi){
					if(!$uyeupdate){
			?>
			<?=$hata?>
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title">Üyeler</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="col-md-4">Ad/Soyad</th>
								<th class="col-md-2">Telefon</th>
								<th class="col-md-4">Email</th>
								<th class="col-md-2">İşlem</th>
							</tr>
						</thead>
						<tbody>
							<?=$uye?>
						</tbody>
					</table>
				</div>
			</section>
			<?php 	}
				  }
				  else{
					echo $bilgi;
				  }
			?>

			<?php if($uyeupdate){ ?>
			<div class="row">
				<div class="col-md-12">
					<?=$hata?>
					<section class="panel">
						<header class="panel-heading">
							<h2 class="panel-title">Üye Güncelle</h2>
              <div class="panel-actions">
                <a href="<?=aurl?>/index.php?s=uyeler" style="color:#33353F" data-toggle="tooltip" data-placement="top" data-original-title="Üyeler Sayfasına Git"><i class="fa fa-arrow-circle-o-left fa-2x" aria-hidden="true"></i></a>
							</div>
						</header>
						<div class="panel-body">
							<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Ad:</label>
									<div class="col-md-9">
										<input type="text" name="ad" class="form-control" value="<?=$uyeupdate["ad"]?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Soyad:</label>
									<div class="col-md-9">
										<input type="text" name="soyad" class="form-control" value="<?=$uyeupdate["soyad"]?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Tel:</label>
									<div class="col-md-9">
										<input type="text" name="tel" class="form-control" value="<?=$uyeupdate["tel"]?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Email:</label>
									<div class="col-md-9">
										<input type="text" name="email" class="form-control" value="<?=$uyeupdate["email"]?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12" style="text-align:right !important">
										<input type="submit" class="btn btn-success" value="Kaydet" name="btn_guncelle">
										<button type="reset" class="btn btn-default">Temizle</button>
									</div>
								</div>
							</form>
						</div>
					</section>

				</div>
			</div>
			<?php } ?>
