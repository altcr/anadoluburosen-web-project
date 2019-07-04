<?php

	$bilgi="";
	$uye="";
	$hata="";

	$uyeler=$db->select("kullanici_yorumlar")->run();
	if(count($uyeler) == 0){
		$bilgi .= '<div class="col-md-12 m-none p-none">
						<div class="alert alert-warning">
							<strong><i class="fa fa-newspaper-o"></i> Kullanıcı Yorumu Bulunmamaktadır!</strong>
						</div>
				   </div>';
	}
	else{
		foreach($uyeler as $val){
			$uye .= '<tr>
						<td style="vertical-align: middle;">'.$val["adSoyad"].' '.$val["soyad"].'</td>
						<td style="vertical-align: middle;">'.$val["yorum"].'</td>
						<td style="vertical-align: middle;" class="center">
							<a href="'.aurl.'/index.php?s=kullanici-yorumlar&i=duzenle&id='.$val["id"].'" class="btn btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Kaydı Düzenle"><i class="fa fa-pencil"></i></a>
							<a href="'.aurl.'/index.php?s=kullanici-yorumlar&i=sil&id='.$val["id"].'" onclick="return confirm(\'Üyeyi Silmek İstediğinize Emin Misiniz?\')" class="btn btn-danger"  data-toggle="tooltip" data-placement="top" data-original-title="Kaydı Sil"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>';
		}
	}

	$uyeupdate="";
	if(get("i") and get("id") and is_numeric(get("id")) and get("i")=="duzenle"){
		$uyeupdate=$db->select("kullanici_yorumlar")
						->where("id",get("id"))
						->limit(1)
						->run(true);
	}

	if(post("btn_guncelle")){
		if(!post("adSoyad") or !post("yorum"))
		{
			$hata .= '<div class="alert alert-danger">
                <strong><i class="fa fa-warning"></i> Hata!</strong> Lütfen boş alan bırakmayınız!
              </div>';
		}
		else
		{
      $update=$db->update("kullanici_yorumlar")
                 ->where("id",get("id"))
                 ->set(array(
                   "adSoyad" => post("adSoyad"),
   								 "yorum" => post("yorum", 1),
                 ));
      if ($update) {
        $hata='<div class="alert alert-success">
        					<strong><i class="fa fa-check"></i> Başarılı!</strong> Yorum Başarıyla güncellendi.
        				</div>';
        header("refresh:2; url=".aurl."/index.php?s=kullanici-yorumlar");
      }
      else {
        $hata='<div class="alert alert-danger">
        					<strong><i class="fa fa-warning"></i> Hata!</strong> Yorum Güncellenemedi. Lütfen Tekrar Deneyiniz.
        				</div>';
        header("refresh:2; url=".aurl."/index.php?s=kullanici-yorumlar");
      }
		}
	}

	if(get("i") and get("id") and is_numeric(get("id")) and get("i")=="sil"){
    $kontrol=$db->select("kullanici_yorumlar")->where("id", get("id"))->limit(1)->run(true);
    if($kontrol){
      $delete=$db->delete("kullanici_yorumlar")->where("id",$kontrol["id"])->done();
      if($delete){
        $hata='<div class="alert alert-success">
                  <strong><i class="fa fa-check"></i> Başarılı!</strong> Yorum Başarıyla Silindi.
                </div>';
        header("refresh:2; url=".aurl."/index.php?s=kullanici-yorumlar");
      }
      else {
        $hata='<div class="alert alert-danger">
                  <strong><i class="fa fa-warning"></i> Hata!</strong> Yorum Silinemedi. Lütfen Tekrar Deneyiniz.
                </div>';
        header("refresh:2; url=".aurl."/index.php?s=kullanici-yorumlar");
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
					<h2 class="panel-title">Kullanıcı Yorumları</h2>
				</header>
				<div class="panel-body">
					<table class="table table-bordered table-striped mb-none" id="datatable-default">
						<thead>
							<tr>
								<th class="col-md-3">Ad/Soyad</th>
								<th class="col-md-7">Yorum</th>
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
							<h2 class="panel-title">Kullanıcı Yorum Güncelle</h2>
              <div class="panel-actions">
                <a href="<?=aurl?>/index.php?s=kullanici-yorumlar" style="color:#33353F" data-toggle="tooltip" data-placement="top" data-original-title="Yorumlar Sayfasına Git"><i class="fa fa-arrow-circle-o-left fa-2x" aria-hidden="true"></i></a>
							</div>
						</header>
						<div class="panel-body">
							<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-md-2 control-label" for="baslik">Ad Soyad:</label>
									<div class="col-md-9">
										<input type="text" name="adSoyad" class="form-control" value="<?=$uyeupdate["adSoyad"]?>" required>
									</div>
								</div>
                <div class="form-group">
                  <label class="col-md-2 control-label" for="inputDefault">Yorum:</label>
                  <div class="col-md-9">
                    <div class="metinduzenle" data-text-name="yorum" required><?=$uyeupdate["yorum"]?></div>
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
