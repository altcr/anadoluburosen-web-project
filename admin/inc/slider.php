<?php
	$islem = get("islem");
	if($islem == "sil")
	{
		if(get("id") and is_numeric(get("id")))
		{
			$varmi = $db->select("slider")->from("resim")->where("id",get("id"))->limit(1)->run(true);
			if($varmi)
			{
				$sil = $db->delete("slider")->where("id",get("id"))->done();
				if($sil)
				{
					unlink(realpath("..")."/uploads/".$varmi["resim"]);
					echo '	<div class="alert alert-success">
										<strong><i class="fa fa-check"></i> Başarılı!</strong> Slider başarıyla silindi.
									</div>';
				}
				else
				{
					echo '	<div class="alert alert-danger">
										<strong><i class="fa fa-remove"></i> Hata!</strong> Bir problem oluştu! Tekrar deneyin.
									</div>';
				}
				exit(header("refresh:2; url=".aurl."/index.php?s=slider"));
			}else exit(header("location:".aurl."/index.php?s=slider"));
		}else exit(header("location:".aurl."/index.php?s=slider"));
	}
	else
	{
		$slider=$db->select("slider")->orderby("sira","asc")->run();
		$foto="";
		$sayfahata1="";
		$dosya = "sliders";
		if($slider)
			foreach($slider as $val){
				$foto.='<div class="item size">
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-bordered mb-mb">
										<thead>
											<tr>
												<th width="20%">Başlık</th>
												<th width="33%">Açıklama</th>
												<th width="15%">Link</th>
												<th width="10%">Stil</th>
												<th width="2%">Durum</th>
												<th width="20%">İşlemler</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>'.$val["baslik"].'</td>
												<td>'.$val["aciklama"].'</td>
												<td>'.$val["link"].'</td>
												<td>'.$val["animate"].'</td>
												<td data-durum="'.$val["durum"].'" data-resim="'.$val["resim"].'">'.($val["durum"] == 1 ? '<span class="label label-success">Açık</span>' : '<span class="label label-danger">Kapalı</span>').'</td>
												<td class="text-center">
													<button id="slider-update" data-id="'.$val["id"].'" data-resim="'.$val["resim"].'" class="btn btn-sm btn-warning">		<i class="fa fa-pencil"></i> Güncelle</button>
													<a href="'.aurl.'/index.php?s=slider&islem=sil&id='.$val["id"].'" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Sil</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<img class="img-thumbnail" src="'.upurl.'/'.$val["resim"].'" alt="">

						</div>';
			}
		else
			$foto='<div class="alert alert-warning"><i class="fa fa-warning"></i> Mevcut Slider Yok. </div>';
		if(post("btn-slider-islem")){
			if(post("islem"))
			{
				if(post("resim") and post("islem") and post("islem") === "1" and post("id") and is_numeric(post("id")))
				{
					$resimurl = "";
					$imgname="";
					if($_FILES["sliderimg"]["size"]>0){
						$image = new Upload($_FILES['sliderimg']);
						if ($image->uploaded)
						{
							$imgname = permalink(post("baslik")).md5(uniqid());
							$uploadyolu = realpath("../")."/uploads/".$dosya.'/';
							$image->file_new_name_body = $imgname;
							$image->image_resize = true;
							$image->image_convert = "jpg";
							$image->image_ratio_crop = true;
							$image->image_x = 1140;
							$image->image_y = 438;
							$image->allowed = $dosyayuklemuzantiimg;
							$image->Process( $uploadyolu );
							if(!$image->processed)
							{
								$sayfahata1 .= "<li>Slider fotoğrafı Yüklenirken bilinmeyen bir hata oluştu.</li>";
								$resimurl = post("resim");
							}
							else{
								$resimurl = $dosya.'/'.$imgname.".jpg";
								unlink(realpath("../")."/uploads/".post("resim"));
							}
						}
					}
					else{
						$resimurl = post("resim");
					}

					$slider = $db->update("slider")->where("id",post("id"))->
						set(array(
							"animate" => post("efekt"),
							"resim" => $resimurl,
							"baslik" => post("baslik"),
							"aciklama" => post("aciklama"),
							"link" => post("link"),
							"durum" => post("durum") ? 1 : 0
						));

						if($slider)
						{
							$sayfahata1 = '	<div class="alert alert-success">
												<strong><i class="fa fa-check"></i> Başarılı!</strong> Slider başarıyla güncellendi.
											</div>';
							header("refresh:2; url=".aurl."/index.php?s=slider");
						}
						else{
							$sayfahata1 = '	<div class="alert alert-danger">
												<strong><i class="fa fa-remove"></i> Hata!</strong> Bir problem oluştu! Tekrar deneyin.
											</div>';
						}
				}
				elseif(post("islem") and post("islem") === "2")
				{
					if($_FILES["sliderimg"]["size"]>0){
						$image = new Upload($_FILES["sliderimg"]);
						if ($image->uploaded)
						{

							$imgname = permalink(post("baslik")).md5(uniqid());
							$uploadyolu = realpath("../")."/uploads/".$dosya.'/';

							$image->file_new_name_body = $imgname;
							$image->image_resize = true;
							$image->image_convert = "jpg";
							$image->image_ratio_crop = true;
							$image->image_x = 1140;
							$image->image_y = 438;
							$image->allowed = $dosyayuklemuzantiimg;
							$image->Process($uploadyolu);
							if(!$image->processed)
							{
								$sayfahata1 .= "<li>Slider fotoğrafı Yüklenirken bilinmeyen bir hata oluştu.</li>";
							}
							else{
								$slider = $db->insert("slider")->
								set(array(
									"animate" => post("efekt"),
									"resim" => $dosya.'/'.$imgname.".jpg",
									"baslik" =>post("baslik"),
									"aciklama" => strip_tags(post("aciklama",2),$kabulhtmltags),
									"link" => post("link"),
									"durum" => post("durum")? 1:0
								));

								if($slider)
								{
									$sayfahata1 = '	<div class="alert alert-success">
														<strong><i class="fa fa-check"></i> Başarılı!</strong> Slider başarıyla eklendi.
													</div>';
									header("refresh:2; url=".aurl."/index.php?s=slider");
								}
								else{
									$sayfahata1 = '	<div class="alert alert-danger">
														<strong><i class="fa fa-remove"></i> Hata!</strong> Bir problem oluştu! Tekrar deneyin.
													</div>';
								}
							}
							$imgname .=".jpg";
						}
					}
					else{
						$sayfahata1 .= "<li>Slider fotoğrafı seçilmedi!</li>";
					}
				}
				else{
					$sayfahata1 = '	<div class="alert alert-danger">
										<strong><i class="fa fa-remove"></i> Hata!</strong> Bir problem oluştu! Tekrar deneyin.
									</div>';
				}


			}
			else
			{
				$sayfahata1 = '	<div class="alert alert-danger">
									<strong><i class="fa fa-remove"></i> Hata!</strong>Lütfen alanları doldurunuz!
								</div>';
			}
		}
?>
		<div class="row">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
						<button id="slider-insert" class="btn btn-sm btn-success pull-right"><i class="fa fa-plus"></i> Ekle</button>

						<h2 class="panel-title">Slider Ayarları</h2>
					</header>
					<div class="panel-body">
						<div class="alert alert-info">
							<strong>BİLGİ!</strong> Slider'lar arasında gezinebilmek için fotoğrafın üstüne tıklayıp sağa/sola sürükleyiniz.
						</div>
						<?=$sayfahata1?>
						<div class="owl-carousel owl-theme" data-plugin-carousel data-plugin-options='{ "dots": true, "items": 1 }'>
							<?=$foto?>
						 </div>
					</div>
				</section>
			</div>
		</div>

		<div class="row" id="slider-islem">
			<div class="col-md-12">
				<section class="panel">
					<header class="panel-heading">
					<h2 class="panel-title">Slider Ayarları</h2>
					</header>
					<div class="panel-body">
						<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
							<input type="hidden" name="islem" value="" id="islem"/>
							<input type="hidden" name="id" value="" id="id"/>
							<input type="hidden" name="resim" value="" id="resim"/>
							<div class="form-group">
								<label class="col-md-2 control-label" for="Geçiş Efekti">Geçiş Efekti</label>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-8">
											<select class="form-control" name="efekt" id="efekt">
												<option value="-1">Seçiniz...</option>
												<option value="fade">Fade</option>
												<option value="boxfade">Fade Boxes</option>
												<option value="slotfade-horizontal">Fade Slots Horizontal</option>
												<option value="slotfade-vertical">Fade Slots Vertical</option>
												<option value="fadefromright">Fade and Slide from Right</option>
												<option value="fadefromleft">Fade and Slide from Left</option>
												<option value="fadefromtop">Fade and Slide from Top</option>
												<option value="fadefrombottom">Fade and Slide from Bottom</option>
												<option value="fadetoleftfadefromright">Fade To Left and Fade From Right</option>
												<option value="fadetorightfadetoleft">Fade To Right and Fade From Left</option>
												<option value="fadetobottomfadefromtop">Fade To Top and Fade From Bottom</option>
												<option value="fadetotopfadefrombottom">Fade To Bottom and Fade From Top</option>
												<option value="scaledownfromright">Zoom Out and Fade From Right</option>
												<option value="scaledownfromleft">Zoom Out and Fade From Left</option>
												<option value="scaledownfromtop">Zoom Out and Fade From Top</option>
												<option value="scaledownfrombottom">Zoom Out and Fade From Bottom</option>
												<option value="zoomout">ZoomOut</option>
												<option value="zoomin">ZoomIn</option>
												<option value="slotzoom-horizontal">Zoom Slots Horizontal</option>
												<option value="slotzoom-vertical">Zoom Slots Vertical</option>
												<option value="parallaxtoright">Parallax to Right</option>
												<option value="parallaxtoleft">Parallax to Left</option>
												<option value="parallaxtotop">Parallax to Top</option>
												<option value="parallaxtobottom">Parallax to Bottom</option>
												<option value="slideup">Slide To Top</option>
												<option value="slidedown">Slide To Bottom</option>
												<option value="slideright">Slide To Right</option>
												<option value="slideleft">Slide To Left</option>
												<option value="slidehorizontal">Slide Horizontal (depending on Next/Previous)</option>
												<option value="slidevertical">Slide Vertical (depending on Next/Previous)</option>
												<option value="boxslide">Slide Boxes</option>
												<option value="slotslide-horizontal">Slide Slots Horizontal</option>
												<option value="slotslide-vertical">Slide Slots Vertical</option>
												<option value="curtain-1">Curtain from Left</option>
												<option value="curtain-2">Curtain from Right</option>
												<option value="curtain-3">Curtain from Middle</option>
												<option value="3dcurtain-horizontal">3D Curtain Horizontal</option>
												<option value="3dcurtain-vertical">3D Curtain Vertical</option>
												<option value="cubic">Cube Vertical</option>
												<option value="cubic-horizontal">Cube Horizontal</option>
												<option value="incube">In Cube Vertical</option>
												<option value="incube-horizontal">In Cube Horizontal</option>
												<option value="turnoff">TurnOff Horizontal</option>
												<option value="turnoff-vertical">TurnOff Vertical</option>
												<option value="papercut">Paper Cut</option>
												<option value="flyin">Fly In</option>
												<option value="random-static">Random Premium</option>
												<option value="random">Random Flat and Premium</option>
											</select>
										</div>
										<div class="col-md-4">
											<label class="control-label" for="durum">Durum:</label>
											<div class="switch switch-sm switch-success">
												<input type="checkbox" name="durum" id="durum" data-plugin-ios-switch checked="checked" />
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="baslik">Başlık:</label>
								<div class="col-md-9">
									<input type="text" name="baslik" class="form-control" id="baslik" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="link">Link:</label>
								<div class="col-md-9">
									<input type="text" name="link" class="form-control" id="link">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="aciklama">Açıklama:</label>
								<div class="col-md-9">
									<textarea name="aciklama" id="aciklama" rows="3" class="col-md-12"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault"> Slider Fotoğrafı:</label>
								<div class="col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Değiştir</span>
												<span class="fileupload-new">Resim Seç</span>
												<input type="file" name="sliderimg" accept="<?=implode(",",$dosyayuklemuzantiimg)?>">
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Temizle</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" style="text-align:right !important">
									<input type="submit" class="btn btn-success" value="Kaydet" name="btn-slider-islem">
									<button type="reset" class="btn btn-default">Temizle</button>
								</div>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	<?php 	}?>
