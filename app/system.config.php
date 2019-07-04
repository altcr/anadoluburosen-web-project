<?php

	//Veri Tabanı Bilgileri
	$config["db"]=array();

	$config["db"]=[
		"host" => "", // Veri Tabanı hostu
		"name" => "", // Veri Tabanı Adı
		"user" => "", // Veri Tabanı kullanıcısı
		"pass" => "" // Veri Tabanı kullanıcısı şifresi
	];

	//Script kurumlu uzantısı
	$ekklosör = "";

	//Tema Klasör. View dosyasındaki klasör ismi.
	$themesname = "tema";

	//Hata Sayfası. Controller klasöürnden bir dosya ismi.
	$errorpage = "404";

	//Admin Cookie Bilgileri
	$admincookieurl = $ekklosör."/admin/";
	$admincookietime = (time() + (86400 * 1));

	//Blog sayfa Başına Gösterme Limiti
	$blogyazilimit = 10;

	//Kabul Edilen resimi Tipleri
	$dosyayuklemuzantiimg = array('image/*');

	//Kabul Edilen HTML Tags
	$kabulhtmltags = "<p><blockquote><br><br /><h1><h2><h3><h4><h5><h6><b><u><iframe><img><a><table><tr><td><tbody><th><thead><ol><ul><li><span><font><pre>";


	$SendikaIsim  = "Anadolu BÜROSEN";

	//Script içi değişmeyen değerler.
	define("dir",__DIR__);

	define("controller", dir. "/controller");

	define("view", dir. "/view/".$themesname);
	if(!file_exists(view)) exit("<b>HATA: view klasöründe '".$themesname."' dosyası bulunamadı.</b>");

	define("url", (@$_SERVER["HTTPS"] ? "https://" : "http://").$_SERVER["SERVER_NAME"].$ekklosör);
	define("aurl", (@$_SERVER["HTTPS"] ? "https://" : "http://").$_SERVER["SERVER_NAME"].$ekklosör."/admin");

	define("assurl", url."/assets/".$themesname);
	define("aassurl", aurl."/assets");
	define("upurl", url."/uploads");
