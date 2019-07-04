<?php

	$imgname="";
	$imgname2="";
	$imgname3="";
	$eski_img="";
	$eski_img2="";
	$eski_img3="";

	$bilgiler=$db->select("site_ayar")->where("id",1)->limit(1)->run(true);
	$social = unserialize($bilgiler["sosyal_meyda"]);
	if($_POST){
		if(post("btn_kaydet")){
			if(post("title") and post("tel") and post("fax") and post("email") and post("adres") and post("keywords") and post("description")
					 and post("koordinat") and post("slideradet") and post("blogyazilimit") and post("haberyazilimit") and post("videolimit")){
				if(!empty($_FILES['logo_img']["name"]))
				{
					/*-----------LOGO FOTOĞRAFI-----------------*/
					$image = new Upload($_FILES['logo_img']);
					if ($image->uploaded)
					{
						$imgname = permalink($_FILES['logo_img']["name"]).md5(uniqid());
						$uploadyolu = realpath("..").'/uploads/';

						$image->file_new_name_body = $imgname;
						$image->image_resize = true;
						$image->image_convert = "png";
						$image->image_ratio_crop = true;
						$image->image_x = 600;
						$image->image_ratio_y = true;
						$image->allowed = $dosyayuklemuzantiimg;
						$image->Process( $uploadyolu );
						if(!$image->processed)
						{
							$sayfahata .= "<li>Logo Fotoğrafı Yüklenirken bilinmeyen bir hata oluştu.</li>";
							$eski_img=$bilgiler["logo"];
						}
						else {
							$imgname .= ".png";
							unlink(realpath("..").'/uploads/'.$bilgiler["logo"]);
						}
					}
				}
				else{
					$eski_img=$bilgiler["logo"];
				}

				if(!empty($_FILES['icon_img']["name"]))
				{
					/*-----------İCON FOTOĞRAFI-----------------*/
					$image2 = new Upload($_FILES['icon_img']);
					if ($image2->uploaded)
					{
						$imgname2 = permalink($_FILES['icon_img']["name"]).md5(uniqid());
						$uploadyolu = realpath("..").'/uploads/';

						$image2->file_new_name_body = $imgname2;
						$image2->image_resize = true;
						$image2->image_convert = "ico";
						$image2->image_ratio_crop = true;
						$image2->image_x = 32;
						$image2->image_y = 32;
						$image2->allowed = $dosyayuklemuzantiimg;
						$image2->Process( $uploadyolu );
						if(!$image2->processed)
						{
							$sayfahata .= "<li>İcon Fotoğrafı Yüklenirken bilinmeyen bir hata oluştu.</li>";
							$eski_img2=$bilgiler["ikon"];
						}
						else {
							$imgname2 .= ".ico";
							unlink(realpath("..").'/uploads/'.$bilgiler["ikon"]);
						}
					}
 				}
				else{
					$eski_img2=$bilgiler["ikon"];
				}

				$guncelle=$db->update("site_ayar")->where("id",1)
									->set(array(
										"slideradet" => post("slideradet"),
										"blogyazilimit" => post("blogyazilimit"),
										"videolimit" => post("videolimit"),
										"haberyazilimit" => post("haberyazilimit"),
										"title" => post("title"),
										"keywords" => post("keywords"),
										"descriptions" => post("description"),
										"tel" => post("tel"),
										"fax" => post("fax"),
										"email" => post("email"),
										"adres" => post("adres"),
										"koordinat" => post("koordinat"),
										"sosyal_meyda" => isset($_POST["social"]) ? serialize($_POST["social"]) : null ,
										"header" => strip_tags(post("headerekle",2),"<script><meta><link>"),
										"footer" => strip_tags(post("footerekle",2),"<script><meta><link>"),
										"logo" => empty($imgname) ? $eski_img : $imgname,
										"ikon" => empty($imgname2) ? $eski_img2 : $imgname2
									));
				if($guncelle){
					$sayfahata = '<div class="alert alert-success ml-md mr-md"><strong><i class="fa fa-chcek"></i> Başarılı!</strong> Bilgileriniz başarıyla güncellendi!</div>';
					header("refresh:2");
				}
				else{
					$sayfahata = '<div class="alert alert-danger ml-md mr-md"><strong><i class="fa fa-remove"></i> Hata!</strong> Bir hata oluştu. Lütfen tekrar deneyin!</div>';
				}
			}
			else{
				$sayfahata = '<div class="alert alert-danger ml-md mr-md"><strong><i class="fa fa-remove"></i> Hata!</strong> Lütfen alanları boş bırakmayın!</div>';
			}
		}
	}

?>
<div class="row">
	<div class="alert alert-warning ml-md mr-md"><i class="fa fa-exclamation-triangle mr-xs"></i> Lütfen Aşağıdaki Alanları Eksiksiz Doldurarak, En alttaki Kaydet Butonuna Basınız.</div>
	<?=$sayfahata?>
		<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
		<div class="col-md-12">
			<div class="panel-group" id="accordion2">
				<div class="panel panel-accordion panel-accordion-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One" aria-expanded="true">
								<i class="fa fa-cog"></i> Temel Site Bilgileri
							</a>
						</h4>
					</div>
					<div id="collapse2One" class="accordion-body collapse in" aria-expanded="true">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-2 control-label" for="baslik">Title:</label>
								<div class="col-md-9">
									<input type="text" name="title" class="form-control" value="<?=$bilgiler["title"]?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="baslik">Keywords:</label>
								<div class="col-md-9">
										<input name="keywords" id="keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?=$bilgiler["keywords"]?>" style="display: none;">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="baslik">Description:</label>
								<div class="col-md-9">
									<textarea name="description" cols="30" rows="3" class="form-control"><?=$bilgiler["descriptions"]?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="telefon">Telefon:</label>
								<div class="col-md-9">
									<input type="tel" name="tel" class="form-control" value="<?=$bilgiler["tel"]?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="fax">Fax:</label>
								<div class="col-md-9">
									<input type="text" name="fax" class="form-control" value="<?=$bilgiler["fax"]?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="email">E-Mail:</label>
								<div class="col-md-9">
									<input type="email" name="email" class="form-control" value="<?=$bilgiler["email"]?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="adres">Adres:</label>
								<div class="col-md-9">
									<textarea name="adres" cols="30" rows="5" class="form-control"><?=$bilgiler["adres"]?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault">Logo Fotoğrafı:</label>
								<div class="col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<i class="fa fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Değiştir</span>
												<span class="fileupload-new">Resim Seç</span>
												<input type="file" name="logo_img" accept="<?=implode(",",$dosyayuklemuzantiimg)?>"/>
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Temizle</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault">İcon Fotoğrafı:</label>
								<div class="col-md-9">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<i class="fa fa-file fileupload-exists"></i>
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Değiştir</span>
												<span class="fileupload-new">Resim Seç</span>
												<input type="file" name="icon_img" accept="<?=implode(",",$dosyayuklemuzantiimg)?>"/>
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Temizle</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="email">Harita Koordinatları(x,y):</label>
								<div class="col-md-9">
									<input type="text" name="koordinat" class="form-control" value="<?=$bilgiler["koordinat"]?>">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-accordion panel-accordion-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two" aria-expanded="false">
								<i class="fa fa-tags"></i> Sosyal Medya Bilgileri
							</a>
						</h4>
					</div>
					<div id="collapse2Two" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<div id="socialmedyalar" class="mb-lg">
							<?php
								if(is_array($social) and !empty($social)){
									foreach ($social as $key => $value) {
										echo '<div class="form-group">
											<label class="col-md-2 control-label" for="'.strto($key, "uc").'">'.strto($key, "uc").':</label>
											<div class="col-md-4">
												<input type="text" name="social['.$key.'][url]" class="form-control" id="'.strto($key, "uc").'" value="'.$value["url"].'">
											</div>
											<div class="col-md-1">
												<i class="fa fa-'.$value["icon"].'"></i><input type="hidden" name="social['.$key.'][icon]" value="'.$value["icon"].'">
											</div>
											<div class="col-md-1"><a class="btn btn-xs btn-danger mt-xs" id="socialsilbutton"><i class="fa fa-remove"></i></a></div>
										</div>';
									}
								}
							?>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Sosyal Medya Ekle:</label>
								<div class="col-md-2" style="text-align:right !important">
									<input type="text" id="socialadi" class="form-control" placeholder="Adı">
								</div>
								<div class="col-md-4" style="text-align:right !important">
									<input type="text" id="sociallink" class="form-control" placeholder="Link">
								</div>
								<div class="col-md-2" style="text-align:right !important">
									<select id="socialicon" class="form-control">
										<option value="">Seçiniz</option>
										<option value="facebook">Facebook</option>
										<option value="twitter">Twitter</option>
										<option value="instagram">İnstagram</option>
										<option value="whatsapp">Whatsapp</option>
										<option value="youtube">Youtube</option>
										<option value="google-plus">Google Plus</option>
										<option value="pinterest">Pinterest</option>
										<option value="amazon">Amazon</option>
										<option value="skype">Skype</option>
										<option value="linkedin">Linkedin</option>
										<option value="tumblr">Tumblr</option>
										<option value="yahoo">Yahoo</option>
										<option value="vimeo">Vimeo</option>
										<option value="foursquare">Foursquare</option>
										<option value="vk">Vk</option>
									</select>
								</div>
								<div class="col-md-1" style="text-align:right !important">
									<button class="btn btn-primary" id="socialkaydetbutton"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-accordion panel-accordion-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three" aria-expanded="false">
								<i class="fa fa-newspaper-o"></i> Site İçeriği Bilgileri
							</a>
						</h4>
					</div>
					<div id="collapse2Three" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-2 control-label">Slider Adet:</label>
								<div class="col-md-9">
									<input type="number" name="slideradet" min="1" class="form-control" value="<?=$bilgiler["slideradet"]?>">
									<div class="alert alert-warning p-xs mb-none mt-sm"><i class="fa fa-exclamation-triangle mr-xs"></i> Slider da gösterilmesini istediğiniz fotoğraf sayısını giriniz.</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Blog Yazı Adet:</label>
								<div class="col-md-9">
									<input type="number" name="blogyazilimit" min="1" class="form-control" value="<?=$bilgiler["blogyazilimit"]?>">
									<div class="alert alert-warning p-xs mb-none mt-sm"><i class="fa fa-exclamation-triangle mr-xs"></i> Anasayfa'da gösterilmesini istediğiniz blog yazısı sayısını giriniz.</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Haber Yazı Adet:</label>
								<div class="col-md-9">
									<input type="number" name="haberyazilimit" min="1" class="form-control" value="<?=$bilgiler["haberyazilimit"]?>">
									<div class="alert alert-warning p-xs mb-none mt-sm"><i class="fa fa-exclamation-triangle mr-xs"></i> Anasayfa'da gösterilmesini istediğiniz haber yazısı sayısını giriniz.</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Video Adet:</label>
								<div class="col-md-9">
									<input type="number" name="videolimit" min="0" class="form-control" value="<?=$bilgiler["videolimit"]?>">
									<div class="alert alert-warning p-xs mb-none mt-sm"><i class="fa fa-exclamation-triangle mr-xs"></i> Anasayfa'da gösterilmesini istediğiniz video sayısını giriniz.</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="inputDefault">Hakkımızda:</label>
								<div class="col-md-9">
									<div class="metinduzenle" data-text-name="hakkimizda"><?=$bilgiler["hakkimizda"]?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-accordion panel-accordion-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Four" aria-expanded="false">
								<i class="fa fa-ellipsis-h"></i> Diğer İşlemler
							</a>
						</h4>
					</div>
					<div id="collapse2Four" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-2 control-label">Header Kod Ekle:</label>
								<div class="col-md-9">
									<textarea name="headerekle" cols="30" rows="8" class="form-control"><?=$bilgiler["headerekle"]?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Footer Kod Ekle:</label>
								<div class="col-md-9">
									<textarea name="footerekle" cols="30" rows="8" class="form-control"><?=$bilgiler["footerekle"]?></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="form-group">
				<div class="col-md-12" style="text-align:right !important">
					<input type="submit" class="btn btn-primary" value="Kaydet" name="btn_kaydet">
				</div>
			</div>
		</div>
	</form>
</div>
