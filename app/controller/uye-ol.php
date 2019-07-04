<?php
	$_sayfatitle = "Üye Ol";
	$_sayfakeywords ="uyelik,anadoluburosen";
	$_sayfadescription = "Sitemize üye olabilirsiniz.";

	if(get("id") and is_numeric("id")){
    $ilceler = $db->select("ilceler")->where("il_id",get("id"))->run();
  }
	else{
		$iller=$db->select("iller")->run();
	}

	$sayfaHata="";
	if($_POST){
		if(!empty(post("ad")) and !empty(post("soyad")) and !empty(post("email")) and !empty(post("tel")) and (post("il")!=-1) and (post("ilce")!=-1) and !empty(post("sifre")) and !empty(post("sifre_tekrar"))){
			if(post("sifre")===post("sifre_tekrar")){
				$userControl = $db->select("kullanicilar")->from("id")->where("email",post("email"))->limit(1)->run(true);
				if(!$userControl)
				{
					$id="";
					$idControl=$db->select("kullanicilar")->from("id")->orderby("id","desc")->limit(1)->run(true);

					if(count($idControl)==0)
						$uyeYilAl=date("Y");
					else
						$uyeYilAl=substr($idControl["id"],0,4);

					$yil=date("Y");
					if($uyeYilAl!=$yil){
						$sifre = md5(sha1(md5(post("sifre"))));
						$kullaniciEkle = $db->insert("kullanicilar")->set(array(
							"id" => ($yil."1000"),
							"email" => post("email"),
							"sifre" => $sifre,
							"ad" => post("ad"),
							"soyad" => post("soyad"),
							"tel" => post("tel")
						));
					}
					else{
						$sifre = md5(sha1(md5(post("sifre"))));
						$kullaniciEkle = $db->insert("kullanicilar")->set(array(
							"id" => ($idControl["id"]+1),
							"email" => post("email"),
							"sifre" => $sifre,
							"ad" => post("ad"),
							"soyad" => post("soyad"),
							"tel" => post("tel")
						));
					}

					if($kullaniciEkle){
						$sayfaHata='<div class="alert alert-success"><i class="fa fa-check"></i> Kaydınız başarıyla yapıldı. Girişe yönlendiriliyorsunuz..</div>';
						header("refresh:3; url=".url."/giris-yap");
					}
					else
						$sayfaHata='<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Bir hata oluştu. Lütfen tekrar deneyiniz!</div>';
				}
				else
				$sayfaHata='<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Bu Email adresine kayıtlı kullanıcı bulunmaktadır!</div>';
			}
			else
				$sayfaHata='<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Şifreler eşleşmiyor, lütfen kontrol ediniz!</div>';
		}
		else
			$sayfaHata='<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Lütfen boş alan bırakmayınız.</div>';
	}
