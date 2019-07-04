<?php

	if(!$kilitac) exit("Bu Dosya Direk Erişime Kapalıdır!");
	header('Content-Type: application/json');
	
	$secil = post("secil");
	
	$return["varmi"] = false;
	$return["hata"] = "";
	$return["return"] = "";
		
		
		
	if($secil)
	{
		$ilceler = $db 	->select("ilceler")
						->where("ilid",$secil)
						->where("durum",1)
						->orderby("isim")
						->run();
		if($ilceler)
		{
			$return["gelen"] = $ilceler;
		} else $return["hata"] = "Bu İlin Kayıtlı İlçesi Bulunamadı!";
	} else $return["hata"] = "Bir İl Seçmediniz!";
		
		
		
	if(!empty($return["hata"])) $return["varmi"] = true;
	
	echo json_encode($return);