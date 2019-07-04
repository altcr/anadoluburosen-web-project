<?php

  if(is_numeric($_GET["id"])){
    $yazi=$db->select("haber")->where("id",$_GET["id"])->run(true);
    if(empty($yazi)) exit(header("location:".aurl."/index.php?s=haber"));
  }else exit(header("location:".aurl."/index.php?s=haber"));

	if(isset($_POST) and post("btn_kaydet"))
	{
		$_FILES["files"]=0;
		$hatasayfaul = "";
		if(!post("kategori") and !is_numeric(post("kategori")))
		{
			$hatasayfaul .= "<li>Kategori Seçilmedi.</li>";
		}
		if(!post("durum"))
		{
			$hatasayfaul .= "<li>Yazı Durumu belirtilmedi.</li>";
		}
		if(!post("baslik"))
		{
			$hatasayfaul .= "<li>Yazı Başlığı Girilmedi.</li>";
		}
		if(!post("icerik"))
		{
			$hatasayfaul .= "<li>Yazı İçeriği Girilmedi.</li>";
		}
		if(!post("keywords"))
		{
			$hatasayfaul .= "<li>Anahtar kelime girilmedi.</li>";
		}
		if(!post("description"))
		{
			$hatasayfaul .= "<li>Açıklama girilmedi.</li>";
		}

		if($hatasayfaul != ""){

			$hatailk ='<div class="alert alert-danger">
					<strong><i class="fa fa-warning"></i> Hata!</strong> Aşağıdaki Nedenlerden dolayı yazınız eklenmedi. Lütfen Tekrar Deneyiniz.
					<ul>';
			$hatason = '</ul>
				</div>';
			$sayfahata = $hatailk.$hatasayfaul.$hatason;
		}
		else
		{
			$hatasayfaul = "";
      $kapakimgname="";
      $eski_kapakimgname="";
      $icerikimgname="";
      $eski_icerikimgname="";

      if(!empty($_FILES['kapakimg']["name"]))
      {
  			$image = new Upload($_FILES['kapakimg']);
  			if ($image->uploaded)
  			{
  				$kapakimgname = permalink(post("baslik"))."-kapak-".md5(uniqid());
  				$uploadyolu = realpath("..").'/uploads/haber/';

  				$image->file_new_name_body = $kapakimgname;
  				$image->image_resize = true;
  				$image->image_convert = "gif";
  				$image->image_ratio_crop = true;
  				$image->image_x = 326;
  				$image->image_y = 179;
  				$image->allowed = $dosyayuklemuzantiimg;
  				$image->Process( $uploadyolu );
  				if(!$image->processed)
  				{
  					$hatasayfaul .= "<li>Kapak Resmi Yüklenirken bilinmeyen bir hata oluştu.</li>";
            $eski_kapakimgname=$yazi["kapak_img"];
  				}
          else{
            $kapakimgname .=".gif";
            unlink(realpath("..").'/uploads/'.$yazi["kapak_img"]);
          }
  			}
      }
      else{
				$eski_kapakimgname=$yazi["kapak_img"];
      }

      if(!empty($_FILES['icerikimg']["name"]))
      {
  			$image ="";
  			$image = new Upload($_FILES['icerikimg']);
  			if ($image->uploaded)
  			{
  				$icerikimgname = permalink(post("baslik"))."-icerik-".md5(uniqid());
  				$uploadyolu = realpath("..").'/uploads/haber/';

  				$image->file_new_name_body = $icerikimgname;
  				$image->image_resize = true;
  				$image->image_convert = "gif";
  				$image->image_ratio_crop = true;
  				$image->image_x = 848;
  				$image->image_y = 412;
  				$image->allowed = $dosyayuklemuzantiimg;
  				$image->Process( $uploadyolu );
  				if(!$image->processed)
  				{
  					$hatasayfaul .= "<li>İçerik Resmi Yüklenirken bilinmeyen bir hata oluştu.</li>";
            $eski_icerikimgname=$yazi["icerik_img"];
  				}
          else{
            $icerikimgname .=".gif";
            unlink(realpath("..").'/uploads/'.$yazi["icerik_img"]);
          }
  			}
      }
      else{
				$eski_icerikimgname=$yazi["icerik_img"];
      }

			if($hatasayfaul != ""){

				$hatailk ='<div class="alert alert-danger">
						<strong><i class="fa fa-warning"></i> Hata!</strong> Aşağıdaki Nedenlerden dolayı yazınız güncellenemedi. Lütfen Tekrar Deneyiniz.
						<ul>';
				$hatason = '</ul>
					</div>';
				$sayfahata = $hatailk.$hatasayfaul.$hatason;
			}
			else
			{
				$ekle = $db->update('haber')->where("id",$yazi["id"])
							->set(array(
								"selflink" => permalink(post("baslik"))."-".mt_rand(10000,99999),
								"katid" => post("kategori"),
								"baslik" => post("baslik"),
								"icerik" => strip_tags(post("icerik",2),$kabulhtmltags),
								"kapak_img" => !empty($kapakimgname) ? "haber/".$kapakimgname : $eski_kapakimgname,
								"icerik_img" => !empty($icerikimgname) ? "haber/".$icerikimgname : $eski_icerikimgname,
								"keywords" => post("keywords"),
								"keylink" => implode(",",array_map(function($a){return permalink($a);},explode(",",post("keywords")))),
								"description" => post("description"),
								"slider" => post("slider") ? 1 : 0,
								"durum" => post("durum") ? 1 : 0,
							));
				if($ekle)
				{
					$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-thumbs-o-up"></i> Yazınız başarıyla güncellendi.</strong></div>';
					header("refresh:2; url=".aurl."/index.php?s=haber");
				}
				else $sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-thumbs-o-down"></i> Yazınız güncellenirken bir hata oluştu.</strong></div>';

			}
		}
	}
?>
											<div class="row">
												<div class="col-md-12">
													<?=$sayfahata?>
													<section class="panel">
														<header class="panel-heading">
															<h2 class="panel-title">Haber Yazısı Düzenle</h2>
														</header>
														<div class="panel-body">
															<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label class="col-md-2 control-label" for="kategori">Kategori</label>
																	<div class="col-md-9">
																		<div class="row">
																			<div class="col-md-8">
																				<select class="form-control" name="kategori">
																					<option>Seçiniz...</option>
																					<?php
																						$katcek=$db->select("haber_kategori")->where("durum",1)->run();
																						foreach($katcek as $val){
																							echo '<option value='.$val["id"].' '.($yazi["katid"]==$val["id"] ? "selected" : null).'>'.$val["ad"].'</option>';
																						}
																					?>
																				</select>
																			</div>
																			<div class="col-md-2">
																				<label class="control-label" for="durum">Durum:</label>
																				<div class="switch switch-sm switch-success">
																					<input type="checkbox" name="durum" id="durum" data-plugin-ios-switch <?=$yazi["durum"]==1 ? "checked" : null ?> />
																				</div>
																			</div>
																			<div class="col-md-2">
																				<label class="control-label" for="slider">Slider:</label>
																				<div class="switch switch-sm switch-success">
																					<input type="checkbox" name="slider" id="slider" data-plugin-ios-switch <?=$yazi["durum"]==1 ? "checked" : null ?> />
																				</div>
																			</div>
																		</div>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="baslik">Başlık:</label>
																	<div class="col-md-9">
																		<input type="text" name="baslik" class="form-control" id="baslik" value="<?=!empty($yazi["baslik"]) ? $yazi["baslik"] : null ?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="inputDefault">İçerik:</label>
																	<div class="col-md-9">
																		<div class="metinduzenle" data-text-name="icerik"><?=!empty($yazi["icerik"]) ? $yazi["icerik"] : null ?></div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="inputDefault">Kapak Resmi:</label>
																	<div class="col-md-8">
																		<div class="row">
																			<div class="col-md-3 center">
																				<div class="fileupload fileupload-new" data-provides="fileupload">
																					<div class="input-append">
																						<span class="btn btn-default btn-file">
																							<span class="fileupload-exists">Değiştir</span>
																							<span class="fileupload-new">Resim Seç</span>
																							<input type="file" name="kapakimg" accept="<?=implode(",",$dosyayuklemuzantiimg)?>">
																						</span>
																						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Temizle</a>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-9">
																				<label class="col-md-4 control-label" for="inputDefault">İçerik Resmi:</label>
																				<div class="col-md-5 center fileupload fileupload-new" data-provides="fileupload">
																					<div class="input-append">
																						<span class="btn btn-default btn-file">
																							<span class="fileupload-exists">Değiştir</span>
																							<span class="fileupload-new">Resim Seç</span>
																							<input type="file" name="icerikimg" accept="<?=implode(",",$dosyayuklemuzantiimg)?>">
																						</span>
																						<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Temizle</a>
																					</div>
																				</div>
																			</div>
																		</div>

																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="keywords">Keywords:</label>
																	<div class="col-md-9">
																		<input name="keywords" id="keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?=!empty($yazi["keywords"]) ? $yazi["keywords"] : null ?>" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="description">Description:</label>
																	<div class="col-md-9">
																		<textarea class="form-control" name="description" rows="3" id="description"><?=!empty($yazi["description"]) ? $yazi["description"] : null ?></textarea>
																	</div>
																</div>
																<div class="form-group">
																	<div class="col-md-12" style="text-align:right !important">
																		<input type="submit" class="btn btn-success" value="Kaydet" name="btn_kaydet">
																		<button type="reset" class="btn btn-default">Temizle</button>
																	</div>
																</div>
															</form>
														</div>
													</section>

												</div>
											</div>
