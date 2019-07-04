<?php	
	$selflink = url(1);
	if($selflink)
	{
		$sayfa = $db->select("sayfalar")
					->where("selflink", $selflink)
					->where("durum", 1)
					->limit(1)
					->run(true);
		if($sayfa)
		{	
			if(!$girisvar and $sayfa["giris"] === "1")
			{
				exit(header("Location:".site_url()));
			}
			
			$sayfaisim = $sayfa["isim"];
			$sayfatitle = $sayfa["isim"];
			$sayfakeywords = implode(", ",explode(" ", $sayfa["isim"]))."artı başarı";
			$sayfadescription = substr($sayfa["isim"], 0, 160);
			$_sayfatitle =  $sayfa["isim"];
			$_sayfakeywords =implode(", ",explode(" ", $sayfa["isim"]))."artı başarı";
			$_sayfadescription = substr($sayfa["isim"], 0, 160);
			$sayfaaciklama = stripslashes($sayfa["aciklama"]);
			$SayfaBannerResimVar = false; 
			if($sayfa["BannerResim"])
			{
				$SayfaBannerResimVar = true;
				$data = array(
					"url"		=> url."/uploads/".$sayfa["BannerResim"],
					"title"		=> $sayfa["isim"],
					"height"	=> "350px",
					"width"		=> "100%",
				);
				$SayfaBannerResim = dokumanyaz($data);
			}
		}else  exit(header("Location:".site_url()));
	}else  exit(header("Location:".site_url()));
	