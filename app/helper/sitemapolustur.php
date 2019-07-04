<?php

	function sitemapolustur()
	{
		global $db;
		$sitemap = new Sitemap(url);	
		$sitemap->addItem('/', '1.0', 'daily', 'Today');
		$dir = opendir(realpath(".")."/app/controller");

		$blogurunler = $db->select("urunler")->from("selflink,tarih")->orderby("rand()")->run();
		if($blogurunler)
		{
			foreach($blogurunler as $val)
			{
				$sitemap->addItem('/urun-detay/'.$val["selflink"], '0.8', 'monthly',date("d-m-Y",time($val["tarih"])));
			}
		}


		$blogdetay = $db->select("blog")->from("selflink,keylink,tarih")->orderby("rand()")->run();
		$blogetiket = "";

		if($blogdetay)
		{
			foreach($blogdetay as $val)
			{
				$blogetiket .= $val["keylink"].",";
				$sitemap->addItem('/blog-detay/'.$val["selflink"], '0.6', 'monthly',date("d-m-Y",time($val["tarih"])));
			}
		}

		if($blogetiket != "")
		{
			$etiketler = array_filter(explode(",",$blogetiket));
			$say = 1;
			foreach($etiketler as $val)
			{
				if($say >5) break;
				$sitemap->addItem('/blog-etiket/'.$val, '0.5');
				$sitemap->addItem('/blog-arama/'.$val, '0.5');
				$say++;

			}
		}

		while (($dosya = readdir($dir)) !== false)
		{
			$dahiletme = array("blog-detay","blog-arama","blog-etiket","blog-kategori","urun-detay","urun-kategori","referans-detay");

			if(!is_dir($dosya) and !in_array(str_replace(".php","",$dosya), $dahiletme))
			{
				$sitemap->addItem('/'.str_replace(".php","",$dosya), '0.5', 'monthly', date("d-m-Y",filemtime(realpath(".")."/app/controller/".$dosya)));
			}
		}
		closedir($dir);

		$sitemap->createSitemapIndex(url."/", 'Today');
	}
