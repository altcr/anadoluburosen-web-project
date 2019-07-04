<?php

	function strto($str, $to) {
		$lower 	= array("I"=>"ı","i"=>"İ");
		$str = strtr($str,$lower);
		
		switch($to)
		{
			case "k":
				$str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
				return $str;
			break;
			
			case "b":
				$str = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
				return $str;
			break;
			
			case "uc":
				
				$str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
				return $str;
			break;
			
			default:
				trigger_error('Lütfen geçerli bir strto() parametresi giriniz.', E_USER_ERROR);
			break;
		}
	}