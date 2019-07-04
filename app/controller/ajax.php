<?php 
	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') exit;
	if($_SERVER["REQUEST_METHOD"] != "POST") exit;
	if(!$_SERVER["HTTP_REFERER"]) exit;
	if(!$_SERVER["HTTP_USER_AGENT"]) exit;
	if(!$_SERVER["HTTP_ACCEPT"]) exit;


	if(post("type")){
		if(file_exists(dir . "/ajax/" . ajax_decode(post("type")) . ".php")){
			$kilitac = true;
			require_once(dir . "/ajax/" . ajax_decode(post("type")) . ".php");
		}else{
			$kilitac = false;
			die ("hatalı dosya isteği.");
			exit;
		}
	}