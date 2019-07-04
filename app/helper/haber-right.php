<?php

/*function populeryazilar()
{
	global $db;
	$populeryazilar = "";
	$populer = $db->select("haber")->where("durum",1)->orderby("rand()")->limit(4)->run();
	foreach($populer as $val)
	{
		$populeryazilar .= '<li>

									<div class="post-info">
										<a href="'.url.'/haber-detay/'.$val["selflink"].'">'.mb_substr($val["baslik"],0,20, "UTF-8").'...</a>
										<div class="post-meta">
											 '.turkcetarih("d F Y",$val["tarih"]).'
										</div>
									</div>
								</li>';
	}
	return $populeryazilar;
}*/
