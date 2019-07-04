						<?php
							if(get("islem") == "sil")
							{
								
								if(!get("id")) exit(header("Location:".aurl.'/index.php?s=iletisim')); 
								$iletisim = $db	->select("iletisim")
														->where("id",get("id"))
														->limit(1)
														->run(true);
								if(!$iletisim) exit(header("Location:".aurl.'/index.php?s=iletisim')); 
								else{
									
									$iletisimsil = $db->delete("iletisim")->where("id",get("id"))->done();
									if($iletisimsil){
										echo '<div class="alert alert-success">
											<strong><i class="fa fa-check"></i> İletişim mesajları Ve Cevapları Silindi. Yönlendiriliyorsunuz...</strong>
										</div>';
									}
									else{
										echo '<div class="alert alert-danger">
											<strong><i class="fa fa-warning"></i> İletişim mesajları Ve Cevapları Silinirken Bir Hata Oluştu. Yönlendiriliyorsunuz...</strong>
										</div>';
									}
									header("refresh:2; url=".aurl.'/index.php?s=iletisim');
								}
							}
							else{
						?>
						<div class="row">
							<div class="col-lg-12">
								<section class="panel">
									<form action="" class="form-horizontal form-bordered" method="post">
										<header class="panel-heading">	
											<h2 class="panel-title">İletişim</h2>
										</header>
										<div class="panel-body">
											<table class="table table-hover table-bordered mb-none">
												<thead>
													<tr>
														<th>İsim</th>
														<th>Telefon</th>
														<th>Mail</th>
														<th>Tarih</th>
														<th>Mesaj</th>
														<th>İşlem</th>
													</tr>
												</thead>
												<tbody>
												<?php
													$iletisim = $db	->select("iletisim")
																	->orderby("durum desc, tarih","desc")
																	->run();
													if($iletisim)
														foreach($iletisim as $val)
														{
															echo '
																<tr>
																	<td>'.$val["adsoyad"].'</td>
																	<td>'.$val["tel"].'</td>
																	<td>'.$val["email"].'</td>
																	<td>'.turkcetarih('j F Y H:i' ,$val["tarih"]).'</td>
																	<td>'.nl2br($val["mesaj"]).'</td>																
																	<td>
																		<a href="'.aurl."/index.php?s=iletisim&islem=sil&id=".$val["id"].'" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Sil</a>
																	</td>																
																</tr>
															';
														}
													else echo '<tr><td colspan="6"><div class="alert alert-warning m-none"><strong><i class="fa fa-warning"></i> Listelenecek iletişim isteği bulunamadı.</strong></div></td></tr>';
												?>
												</tbody>
											</table>
										</div>
									</form>
								</section>
							</div>
						</div>
						<?php }?>