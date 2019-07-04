<?php
	$_sayfatitle = "Giriş Yap";
	$_sayfakeywords ="giris,anadoluburosen";
	$_sayfadescription = "Sitemize giriş yapabilirsiniz.";

	if(isset($_SESSION["giris"])){
			exit(header("Location:".url));
	}

	$sayfaHata="";

	if($_POST){
		if(!empty(post("email")) and !empty(post("sifre")))
		{
			$sifre = md5(sha1(md5(post("sifre"))));
			$kullaniciKontrol = $db->select("kullanicilar")
							->where("email",post("email"))
							->where("sifre",$sifre)
							->limit(1)
							->run(true);
			if($kullaniciKontrol)
			{
				$kullaniciKontrol["sifre"] = null;
				$_SESSION["giris"] = true;
				$_SESSION["safe1"] = md5($kullaniciKontrol["id"]);
				$_SESSION["safe2"] = sifrele(serialize($kullaniciKontrol), md5($kullaniciKontrol["id"]));
				exit(header("Location:".url."/hesabim"));
			}
			else
			{
				$sayfaHata = '<div class="alert alert-danger">
												<i class="fa fa-remove"></i> Lütfen bilgilerinizi kontrol ediniz!
											</div>';
			}
		}
		else
		$sayfaHata = '<div class="alert alert-danger">
										<i class="fa fa-remove"></i> Lütfen alanları doldurunuz!
									</div>';
	}
