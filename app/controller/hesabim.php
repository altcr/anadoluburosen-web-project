<?php
	$_sayfatitle = "Hesabım";
	$_sayfakeywords ="hesabim,anadoluburosen";
	$_sayfadescription = "Bilgilerinizi yönetebileceğiniz hesap sayfası.";

	if(!isset($_SESSION["giris"])){
			exit(header("Location:".url));
	}

	$iller=$db->select("iller")->run();

	if($_POST){
		if(post("btnBilgiDegistir")){
			
		}

		if(post("btnSifreDegistir")){

		}
	}

	if(!empty(get("islem")) and get("islem")=="cikis"){
		unset($_SESSION["giris"]);
		unset($_SESSION["safe1"]);
		unset($_SESSION["safe2"]);

		$_SESSION["giris"] = false;
		$_SESSION["safe1"] = "";
		$_SESSION["safe2"] = "";

		session_destroy();

		if(isset($_SESSION["giris"]) or $_SESSION["giris"] = false) header("Location:".url);
		return false;
	}
