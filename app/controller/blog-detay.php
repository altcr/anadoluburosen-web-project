<?php 
	$blog=$db->select("blog")->from("blog.*,blog_kategori.id as katid,blog_kategori.ad as katadi,blog_kategori.selflink as katselflink")->join("blog_kategori","%s.id=%s.katid","inner")->where("durum",1)->where("selflink",url(1))->run(true);
	if($blog){
		$konuetiketler = implode(", ",array_map(function($item){
					return '<a href="'.url.'/blog-etiket/'.permalink(trim($item)).'" title="'.trim($item).'">'.trim($item).'</a>';
				},explode(",",$blog["keywords"])));
		$konuyorumsay = yorumlar(1,$blog["id"],-1,true)." Yorum";
		$_sayfatitle = $blog["baslik"];
		$_sayfakeywords =$blog["keywords"];
		$_sayfadescription = $blog["description"];
		$_sayfaimage = upurl."/".$blog["kapak_img"];
		$blogitemurl = url."/blog-detay/".url(1);
		$kisablogitemurl = gkisalt($blogitemurl);
		
		$paylasfacebook = "http://www.facebook.com/sharer/sharer.php?u=".$blogitemurl;
		$paylastwitter = "http://twitter.com/intent/tweet?text=".mb_substr($blog["baslik"],0,(137-mb_strlen($kisablogitemurl,"UTF-8")),"UTF-8").(mb_strlen(strip_tags($blog["baslik"]),"utf-8") > (137-mb_strlen($kisablogitemurl,"UTF-8"))? "... " : " ").$kisablogitemurl;
		$paylaslinkedin = "https://www.linkedin.com/cws/share?url=".$blogitemurl;
		$paylasgplus = "https://plus.google.com/share?url=".$blogitemurl;
		$paylasemail = "https://mail.google.com/mail/u/0/?view=cm&fs=1&to&su=".$blog["baslik"]."&body=".$blog["baslik"]." - ".$blogitemurl."&ui=2&tf=1";
		
		$benzerurun ="";
		$sayfamesaj="";
		if(isset($_POST) and url(2) == "yorumyaz")
		{
			if(post("altid") and post("adsoyad") and post("email") and post("mesaj"))
			{
				$ekle = $db	->insert("yorumlar")
							->set(array(
								"altid" => post("altid"),
								"tip" => 1,
								"itemid" => $blog["id"],
								"adsoyad" => post("adsoyad"),
								"email" => post("email"),
								"mesaj" => post("mesaj"),
								"durum" => 1
							));
				if($ekle)
				{
					header("Location:".url."/".url(0)."/".url(1)."#yorumgoster".$db->lastId());
				}
				else
				{
					$sayfamesaj = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Yorumunuz eklenirken bilinmeyen bir hata ile karşılaşıldı.</strong></div>';
				}
			}
			else
			{
				$sayfamesaj = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Lütfen boş alan bırakmayınız.</strong></div>';
			}
		}		
	}
	else
	{
		$_sayfatitle = "Blog Bulunamadı";
		$_sayfakeywords ="Hata Sayfası";
		$_sayfadescription = "Böyle bir blog mevcut değil.";
		$viewdegistir="404";
	}
	
?>