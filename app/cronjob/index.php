<?php
try
	{
		error_reporting(0);
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		date_default_timezone_set('Europe/Istanbul');
		session_start();
		ob_start();
		require realpath("../")."/init.php";
		
		if(get("CronJobSifre") and get("CronJobSifre") === "CronJobSifreIzinliIslem")
			$CronJobSifre = true;
		else
			$CronJobSifre = false;
		
		
		if($CronJobSifre)
		{
			$CronJobZamanArray = array("1dk", "2dk","3dk","4dk","5dk","10dk","15dk","30dk","1sa","2sa","6sa","12sa","1gun","1hafta","1ay","1yil");
			if(get("CronJobZaman") and in_array(get("CronJobZaman"),	$CronJobZamanArray))
			{
				switch(get("CronJobZaman"))
				{
					case 1:
					
					break;
					
					case 1:
					
					break;
					
					case 1:
					
					break;
					
					case 1:
					
					break;
					
				}
			}
			else
			{
				exit(header("Location:".url));
			}
		}
		else
		{
			exit(header("Location:".url));
		}
		
		ob_end_flush();
	}
	catch (Exception $e)	
	{
		echo $e->getMessage();
		exit;
	}