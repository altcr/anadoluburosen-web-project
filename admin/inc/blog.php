						<?php
							if(!empty(get("id"))){
								if(get("durum")=="1"){
									$guncelle=$db->update("blog")->where("id",get("id"))->set(array(
														'durum'=>'0'
													));
								}
								else{
									$guncelle=$db->update("blog")->where("id",get("id"))->set(array(
														'durum'=>'1'
													));
								}
							}

							if(!empty(get("sil"))){
								$kontrol=$db->select("blog")->where("id",get("sil"))->run(true);
						    if($kontrol){
						      unlink(realpath("..").'/uploads/'.$kontrol["kapak_img"]);
						      unlink(realpath("..").'/uploads/'.$kontrol["icerik_img"]);
						      $sil=$db->delete("blog")->where("id",get("sil"))->done();
						      if($sil) exit(header("refresh:0"));
						    }
						    else exit(header("location:".aurl."/index.php?s=blog"));
							}

						?>
						<div class="row">
							<div class="col-lg-12">
								<!-- start: page -->
											<div class="row">
											<?php
												$yazilar=$db->select("blog")->from("id,durum,kapak_img,icerik,baslik")->orderby("tarih","Desc")->run();
												echo '<div class="col-md-12"><div class="alert alert-warning"><strong><i class="fa fa-newspaper-o"></i> Toplam '.count($yazilar).' adet yazı var.</strong></div></div>';
												foreach($yazilar as $val)
												{

													$baslik = mb_substr(trim(strip_tags($val["baslik"])), 0, 32,"UTF-8").(mb_strlen(strip_tags($val["baslik"]),"utf-8") > 28 ? "..." : null);
													$icerik = mb_substr(trim(strip_tags($val["icerik"])), 0, 90,"UTF-8").(mb_strlen(strip_tags($val["icerik"]),"utf-8") > 90 ? "..." : null);

													$durum_icon= $val["durum"]=="1" ? "thumbs-o-up" : "thumbs-o-down";
													$durum_yazi= $val["durum"]=="1" ? "Aktif" : "Pasif";
													$renk= $val["durum"]=="1" ? "success" : "warning";

													echo '<div class="col-md-4">
																<section class="panel">
																	<div class="panel-body panel-body-nopadding yesil">
																		<div class="item">
																			<img width="100%" class="img-responsive"
																			src='.url.'/uploads/'.$val["kapak_img"].'>
																		</div>
																		<div class="p-md">
																			<h4 class="text-weight-semibold mt-none">'.$baslik.'</h4>
																			<p>'.$icerik.'</p>
																		</div>
																	</div>
																	<div class="panel-footer panel-footer-btn-group">
																		<div class="">
																			<a href='.aurl.'/index.php?s=blog&sil='.$val["id"].' class="btn btn-'.$renk.'" onclick="return confirm(\'Yazıyı silmek istiyor musunuz?\');"><i class="fa fa-trash-o mr-xs"></i> Sil</a>
																			<a href='.aurl.'/index.php?s=blog-duzenle&id='.$val["id"].' class="btn btn-'.$renk.'"><i class="fa fa-pencil mr-xs"></i> Düzenle</a>
																			<a href='.aurl.'/index.php?s=blog&durum='.$val["durum"].'&id='.$val["id"].' class="btn btn-'.$renk.'"><i class="fa fa-'.$durum_icon.' mr-xs"></i> '.$durum_yazi.'</a>
																		</div>
																	</div>
																</section>
															</div>';
												}
											?>
											</div>
								<!-- end: page -->
							</div>
						</div>
