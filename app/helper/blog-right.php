<?php

	function populeryazilar()
	{
		global $db;
		$populeryazilar = "";
		$populer = $db->select("blog")->where("durum",1)->orderby("rand()")->limit(4)->run();
		foreach($populer as $val)
		{
			$populeryazilar .= '<li>
										
										<div class="post-info">
											<a href="'.url.'/urun-detay/'.$val["selflink"].'">'.mb_substr($val["baslik"],0,20, "UTF-8").'...</a>
											<div class="post-meta">
												 '.turkcetarih("d F Y",$val["tarih"]).'
											</div>
										</div>
									</li>';
		}
		return $populeryazilar;
	}

	/*function encokokunan()
	{
		global $db;
		$encokokunan = "";
		$okunan = $db->select("blog")->where("durum",1)->orderby("rand()")->limit(4)->run();
		foreach($okunan as $val)
		{
			$encokokunan .= '<li>
										<div class="post-image">
											<div class="img-thumbnail">
												<a href="'.url.'/blog-detay/'.$val["selflink"].'">
													<img src="'.upurl."/".$val["kapak_img"].'" alt="'.$val["baslik"].'" title="'.$val["baslik"].'" width="50">
												</a>
											</div>
										</div>
										<div class="post-info">
											<a href="'.url.'/blog-detay/'.$val["selflink"].'">'.mb_substr($val["baslik"],0,20, "UTF-8").'...</a>
											<div class="post-meta">
												 '.turkcetarih("d F Y",$val["tarih"]).'
											</div>
										</div>
									</li>';
		}
		return $encokokunan;
	}*/
