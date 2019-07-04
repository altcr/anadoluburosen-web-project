<?php
	require_once "system.config.php";

	function __autoload($classname){
		$classfile = dir."/classes/class.".strtolower($classname).".php";
		if(file_exists($classfile)) require_once $classfile;

	}

	$db = @new basicdb($config["db"]["host"],$config["db"]["name"],$config["db"]["user"],$config["db"]["pass"]);
	$site_ayar_cek = $db->select("site_ayar")->limit(1)->run(true);

	$slideradet = $site_ayar_cek["slideradet"];
	$tel = $site_ayar_cek["tel"];
	$fax = $site_ayar_cek["fax"];
	$email = $site_ayar_cek["email"];
	$adres = $site_ayar_cek["adres"];
	$logo = $site_ayar_cek["logo"];
	$ikon = $site_ayar_cek["ikon"];
	$sosyal_meyda = unserialize($site_ayar_cek["sosyal_meyda"]);
	$header = $site_ayar_cek["header"];
	$footer = $site_ayar_cek["footer"];
	$blogyazilimit = $site_ayar_cek["blogyazilimit"];
	$haberyazilimit = $site_ayar_cek["haberyazilimit"];
	$videolimit = $site_ayar_cek["videolimit"];
	$mapkoordinat= $site_ayar_cek["koordinat"];
	$hakkimizda= $site_ayar_cek["hakkimizda"];
	$sendika_bilgileri= $site_ayar_cek["sendika_bilgileri"];
	$yonetim= $site_ayar_cek["yonetim"];
	$subeler= $site_ayar_cek["subeler"];
	$misyon= $site_ayar_cek["misyon"];
	$vizyon= $site_ayar_cek["vizyon"];


	//Sayfa Ayarları
	$defaultsayfatitle = " | ".$site_ayar_cek["title"];
	$defaultsayfakeywords = $site_ayar_cek["keywords"];
	$defaultsayfadescription = $site_ayar_cek["descriptions"];

	HelperLoad::Load();
