											<div class="row">
												<div class="col-md-12">
													<?php if(get("islem") === "listele" or empty(get("islem"))){ ?>
													<section class="panel">
														<header class="panel-heading">	
															<div class="panel-actions">
																<a href="<?=aurl?>/index.php?s=blog-kategori&islem=ekle&altid=<?=get("altid") ? is_numeric(get("altid")) ? get("altid") : -1 : -1?>" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Kategori Ekle"><i class="fa fa-plus"></i></a>
															</div>
															<h2 class="panel-title">Blog Kategoriler </h2>
														</header>
														<div class="panel-body">
															
															<div class="table-responsive">
																<table class="table table-bordered table-hover mb-none">
																	<thead>
																		<tr>
																			<th>Kategori</th>
																			<th>Seflink</th>
																			<th>Durum</th>
																			<th>İşlemler</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			$altid = get("altid") ? is_numeric(get("altid")) ? get("altid") : -1 : -1;
																			$kategoriler = $db->select("blog_kategori")->where("alt_id",$altid)->run();
																			if($kategoriler)
																				foreach($kategoriler as $val)
																				{
																					echo '	<tr>
																								<td><a href="'.aurl.'/index.php?s=blog-kategori&islem=listele&altid='.$val["id"].'">'.$val["ad"].'</a></td>
																								<td>'.$val["selflink"].'</td>
																								<td>'.($val["durum"] == 1 ? '<span class="label label-success">Açık</span>' : '<span class="label label-danger">Kapalı</span>').'</td>
																								<td>
																									<a href="'.aurl.'/index.php?s=blog-kategori&islem=ekle&altid='.$val["id"].'" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Alt Kategori Ekle"><i class="fa fa-plus"></i></a>
																									<a href="'.aurl.'/index.php?s=blog-kategori&islem=sil&altid='.$altid.'&id='.$val["id"].'" class="btn btn-xs btn-danger ml-xs" data-toggle="tooltip" data-placement="top" title="Kategoriyi Sil" onclick="return confirm(\'Silmek İstediğinize emin misiniz?\')"><i class="fa fa-remove"></i></a>
																									<a href="'.aurl.'/index.php?s=blog-kategori&islem=duzenle&altid='.$altid.'&id='.$val["id"].'" class="btn btn-xs btn-warning ml-xs" data-toggle="tooltip" data-placement="top" title="Kategoriyi Düzenle"><i class="fa fa-pencil"></i></a></td>
																							</tr>';
																				}
																			else echo '<tr><td colspan="4"><div class="alert alert-warning m-none"><strong><i class="fa fa-warning"></i> Listelenecek Kategori Bulunamadı.</strong></div></td></tr>';
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</section>
													<?php }if(get("islem") === "ekle"){?>
													<section class="panel">
														<header class="panel-heading">												
															<h2 class="panel-title">Blog Kategoriler Ekle</h2>
														</header>
														<div class="panel-body">
															<?php
																$altid = get("altid") ? is_numeric(get("altid")) ? get("altid") : -1 : -1;
																if($altid != -1)
																{
																	$kategori = $db->select("blog_kategori")->where("id",$altid)->run();
																	if(!$kategori) exit(header("Location:".aurl."/index.php?s=blog-kategori"));
																}

																if(isset($_POST) and post("btn_kaydet"))
																{
																	$hatasayfaul = "";
																	if(!is_numeric(post("alt_id")))
																	{
																		$hatasayfaul .= "<li>Alt kategori bulunamadı.</li>";
																	}
																	if(!post("keywords"))
																	{
																		$hatasayfaul .= "<li>Anahtar kelime girilmedi.</li>";
																	}
																	if(!post("description"))
																	{
																		$hatasayfaul .= "<li>Açıklama girilmedi.</li>";
																	}
																	if($hatasayfaul != "")
																	{
																		$hatailk ='<div class="alert alert-danger">
																				<strong><i class="fa fa-warning"></i> Hata!</strong> Aşağıdaki Nedenlerden dolayı kategori eklenmedi. Lütfen Tekrar Deneyiniz.
																				<ul>';
																		$hatason = '</ul>
																			</div>';
																		$sayfahata = $hatailk.$hatasayfaul.$hatason;
																	}
																	else
																	{
																		$ekle = $db	->insert('blog_kategori')
																					->set(array(
																						"alt_id" => $altid,
																						"selflink" => permalink(post("baslik")),
																						"ad" => mb_convert_case(mb_strtolower(post("baslik"),"UTF-8"), MB_CASE_TITLE, "UTF-8"),
																						"keywords" => post("keywords"),
																						"description" => post("description"),
																						"durum" => post("durum") ? 1 : 0,
																					));
																		if($ekle)
																		{
																			$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-thumbs-o-up"></i> Kategori başarılya eklendi. :)</strong></div>';
																			header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid);
																		}					
																		else $sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-thumbs-o-down"></i> Kategori eklenirken bir hata oluştu. :(</strong></div>';
																	}
		
																}
															?>
															<?=$sayfahata?>
															<form action="" class="form-horizontal form-bordered" method="post" >	
																<div class="form-group">
																	<label class="col-md-2 control-label" for="Durum">Durum:</label>
																	<div class="col-md-9">
																		<div class="switch switch-sm switch-success">
																			<input type="hidden" name="alt_id" value="<?=$altid?>" />
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
																	<label class="col-md-2 control-label" for="keywords">Keywords:</label>
																	<div class="col-md-9">
																		<input name="keywords" id="keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="description">Description:</label>
																	<div class="col-md-9">
																		<textarea class="form-control" name="description" rows="3" id="description"></textarea>
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
													<?php }if(get("islem") === "duzenle"){?>
													<section class="panel">
														<header class="panel-heading">												
															<h2 class="panel-title">Blog Kategoriler Düzenle</h2>
														</header>
														<div class="panel-body">
															<?php
																$altid = get("altid") ? is_numeric(get("altid")) ? get("altid") : -1 : -1;
																$id = get("id") ? is_numeric(get("id")) ? get("id") : -1 : -1;
																$kategori = $db->select("blog_kategori")->where("id",$id)->limit(1)->run(true);
																if($kategori)
																{
																	if(isset($_POST) and post("btn_kaydet"))
																	{
																		$hatasayfaul = "";
																		if(!is_numeric(post("alt_id")))
																		{
																			$hatasayfaul .= "<li>Alt kategori bulunamadı.</li>";
																		}
																		if(!post("keywords"))
																		{
																			$hatasayfaul .= "<li>Anahtar kelime girilmedi.</li>";
																		}
																		if(!post("description"))
																		{
																			$hatasayfaul .= "<li>Açıklama girilmedi.</li>";
																		}
																		if($hatasayfaul != "")
																		{
																			$hatailk ='<div class="alert alert-danger">
																					<strong><i class="fa fa-warning"></i> Hata!</strong> Aşağıdaki Nedenlerden dolayı kategori eklenmedi. Lütfen Tekrar Deneyiniz.
																					<ul>';
																			$hatason = '</ul>
																				</div>';
																			$sayfahata = $hatailk.$hatasayfaul.$hatason;
																		}
																		else
																		{
																			$ekle = $db	->update('blog_kategori')
																						->where("id",$id)
																						->set(array(
																							"alt_id" => $altid,
																							"selflink" => permalink(post("baslik")),
																							"ad" => mb_convert_case(mb_strtolower(post("baslik"),"UTF-8"), MB_CASE_TITLE, "UTF-8"),
																							"keywords" => post("keywords"),
																							"description" => post("description"),
																							"durum" => post("durum") ? 1 : 0,
																						));
																			if($ekle)
																			{
																				$sayfahata = '<div class="alert alert-success"><strong><i class="fa fa-thumbs-o-up"></i> Kategori başarılya düzenlendi. :)</strong></div>';
																				header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid);
																			}					
																			else $sayfahata = '<div class="alert alert-danger"><strong><i class="fa fa-thumbs-o-down"></i> Kategori düzenlenirken bir hata oluştu. :(</strong></div>';
																		}
			
																	}
																}
															?>
															<?=$sayfahata?>
															<form action="" class="form-horizontal form-bordered" method="post" >	
																<div class="form-group">
																	<label class="col-md-2 control-label" for="Durum">Durum:</label>
																	<div class="col-md-9">
																		<div class="switch switch-sm switch-success">
																			<input type="hidden" name="alt_id" value="<?=$altid?>" />
																			<input type="checkbox" name="durum" id="durum" data-plugin-ios-switch<?=$kategori["durum"] ==  1 ? ' checked="checked"' : null?> />
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="baslik">Başlık:</label>
																	<div class="col-md-9">
																		<input type="text" name="baslik" class="form-control" id="baslik" value="<?=$kategori["ad"]?>">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="keywords">Keywords:</label>
																	<div class="col-md-9">
																		<input name="keywords" id="keywords" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?=$kategori["keywords"]?>" />
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label" for="description">Description:</label>
																	<div class="col-md-9">
																		<textarea class="form-control" name="description" rows="3" id="description"><?=$kategori["description"]?></textarea>
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
													<?php }if(get("islem") === "sil"){
															$altid = get("altid") ? is_numeric(get("altid")) ? get("altid") : -1 : -1;
															$id = get("id") ? is_numeric(get("id")) ? get("id") : -1 : -1;
															$kategori = $db->select("blog_kategori")->where("id",$id)->limit(1)->run(true);
															if($kategori)
															{
																$kategoriblogs = $db->select("blog")->where("katid",$id)->run();
																if($kategoriblogs)
																{
																	echo '<div class="alert alert-warning"><strong><i class="fa fa-warning"></i>Bu kategori silenemez. alt yazılar barındırıyor.</strong></div>';
																	header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid);
																}
																else{
																	$sil = $db	->delete('blog_kategori')
																				->where('id', $id)
																				->done();
																	if($sil){
																		echo '<div class="alert alert-success"><strong><i class="fa fa-check"></i> Kategori başarılya silindi.</strong></div>';
																		header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid);
																	}else{
																		echo '<div class="alert alert-danger"><strong><i class="fa fa-remove"></i> Kategori başarılya silinirken bilinmeyen bir hata oluştu.</strong></div>';
																		header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid);
																	}
																}
															}else exit(header("refresh:2; url=".aurl."/index.php?s=blog-kategori&islem=listele&altid=".$altid));
														?>
													<?php }?>
												</div>
											</div>