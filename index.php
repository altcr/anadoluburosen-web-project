<?php
	try
	{
		error_reporting(0);
		// ini_set('display_errors', 0);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		date_default_timezone_set('Europe/Istanbul');
		session_start();
		ob_start();

		require_once "app/init.php";
		
		$viewdegistir = null;
		
		$_url = get("url"); 
		$_url = array_filter(explode("/",$_url));
		
		if(!isset($_url[0])) $_url[0]= "index";
	
		if(!file_exists(controller(url(0)))) $_url[0]=$errorpage;

		require_once controller($_url[0]);
		
		if(empty($_sayfatitle)) $_sayfatitle = null;
		if(empty($_sayfakeywords)) $_sayfakeywords = null;
		if(empty($_sayfadescription)) $_sayfadescription = null;
		if(empty($_sayfaimage)) $sayfaimage = null;
		else $sayfaimage = $_sayfaimage;
		
		$sayfatitle = sayfabilgi(1, $_sayfatitle);
		$sayfakeywords = sayfabilgi(2, $_sayfakeywords);
		$sayfadescription = sayfabilgi(3, $_sayfadescription);
		
		
		if($viewdegistir !== null)
		{
			if(file_exists(view($viewdegistir))) require_once view($viewdegistir);
			else echo "<b>HATA: view klasöründe '".$viewdegistir."' dosyası bulunamadı.</b>";
		}
		else
		{
			if(file_exists(view(url(0)))) require_once view($_url[0]);
			else echo "<b>HATA: view klasöründe '".$_url[0]."' dosyası bulunamadı.</b>";
		}
		ob_end_flush();
	}
	catch (Exception $e)	
	{
		echo $e->getMessage();
		exit;
	}