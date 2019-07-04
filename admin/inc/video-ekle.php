<?php

	if(isset($_POST) and post("btn_kaydet"))
	{
		$hatasayfaul = "";
		if(!post("baslik"))
		{
			$hatasayfaul .= "<li>Video Başlığı Girilmedi.</li>";
		}
		if(!post("link"))
		{
			$hatasayfaul .= "<li>Video Linki Girilmedi.</li>";
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
				$ekle = $db->insert('video')
							->set(array(
								"baslik" => strto(post("baslik"),"uc"),
								"link" => post("link"),
								"durum" => post("durum") ? 1 : 0,
							));
				if($ekle)
				{
					$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-thumbs-o-up"></i> Video başarıyla eklendi.</strong></div>';
					header("refresh:2; url=".aurl."/index.php?s=video-ekle");
				}
				else $sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-thumbs-o-down"></i> Video eklenirken bir hata oluştu.</strong></div>';
		}
	}
?>
											<div class="row">
												<div class="col-md-12">
													<?=$sayfahata?>
													<section class="panel">
														<header class="panel-heading">
															<h2 class="panel-title">Video Ekle</h2>
														</header>
														<div class="panel-body">
															<form action="" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
																<div class="form-group">
																	<label class="col-md-2 control-label" for="kategori">Durum</label>
																	<div class="col-md-9">
                                    <div class="switch switch-sm switch-success">
                                      <input type="checkbox" name="durum" id="durum" data-plugin-ios-switch checked="checked" />
                                    </div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="baslik">Başlık:</label>
																	<div class="col-md-9">
																		<input type="text" name="baslik" class="form-control" id="baslik">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="inputDefault">Link:</label>
																	<div class="col-md-9">
																		<input type="text" name="link" class="form-control">
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
