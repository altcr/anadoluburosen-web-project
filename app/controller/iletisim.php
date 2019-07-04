<?php 
	$_sayfatitle = "İletişim";
	$_sayfakeywords ="iletişim, İstek";
	$_sayfadescription = null;
	
	$mesaj = '';
	if(isset($_POST) and !empty($_POST))
	{
		if(post("adsoyad") and post("email")  and post("tel") and post("mesaj"))
		{
			
			$ekle = $db	->insert("iletisim")
						->set(array(
							"adsoyad" => post("adsoyad"), 
							"email" => post("email"), 
							"tel" => post("tel"), 
							"mesaj" => post("mesaj"),
							"durum" => 1
						));
			if($ekle) $mesaj = '<div class="alert alert-success">	
								<strong><i class="fa fa-check"></i> Tebrikler!</strong> Mesajınız ilgili birimimize iletilmiştir. En kısa zamanda size dönüş yapılacaktır.
							</div>';	
			else $mesaj = '<div class="alert alert-danger">	
								<strong><i class="fa fa-remove"></i> Hata!</strong> Mesajınız İletilirken Bilinmeyen bir Hata Oluştu.
							</div>';							
		}
		else
		{
			$mesaj = '	<div class="alert alert-danger">	
							<strong><i class="fa fa-remove"></i> Hata!</strong> Tüm Alanları Doldurunuz. Yönlendiriliyorsunuz...
						</div>
						<script>setInterval(function(){window.history.back()},2000);</script>
						';

		}			
	}