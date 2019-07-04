<?php

	if(isset($_POST) and post("btn_kaydet"))
	{
		$sayfahata = "";
		if(!post("adSoyad"))
		{
			$sayfahata .= '<div class="alert alert-danger">Ad Soyad boş bırakılamaz!</div>';
		}
		elseif(!post("yorum"))
		{
			$sayfahata .= '<div class="alert alert-danger">Yorum boş bırakılamaz!</div>';
		}
		else
		{
				$ekle = $db->insert('kullanici_yorumlar')
							->set(array(
								"adSoyad" => post("adSoyad"),
								"yorum" => post("yorum", 1),
							));
				if($ekle)
				{
					$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-thumbs-o-up"></i> Yorum başarıyla eklendi.</strong></div>';
					header("refresh:2; url=".aurl."/index.php?s=kullanici-yorumlar");
				}
				else $sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-thumbs-o-down"></i> Yorum eklenirken bir hata oluştu.</strong></div>';
			}
		}
?>
											<div class="row">
												<div class="col-md-12">
													<?=$sayfahata?>
													<section class="panel">
														<header class="panel-heading">
															<h2 class="panel-title">Yorum Ekle</h2>
														</header>
														<div class="panel-body">
															<form action="" class="form-horizontal form-bordered" method="post">
																<div class="form-group">
																	<label class="col-md-2 control-label" for="baslik">Ad Soyad:</label>
																	<div class="col-md-9">
																		<input type="text" name="adSoyad" class="form-control" id="baslik" required>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="inputDefault">Yorum:</label>
																	<div class="col-md-9">
																		<div class="metinduzenle" data-text-name="yorum" required></div>
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
