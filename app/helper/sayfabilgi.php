<?php

	function sayfabilgi($key, $value = null, $tip = null)
	{
		global $defaultsayfatitle;
		global $defaultsayfakeywords;
		global $defaultsayfadescription;
		
		switch($key)
		{
			case 1:
				if($tip === null)
					return $value.$defaultsayfatitle;
				elseif($tip === 1)
					return $defaultsayfatitle." | ".$value;
				elseif($tip === 2)
					return $defaultsayfatitle;
			break;
			
			case 2:
				return $defaultsayfakeywords.",".$value;
			break;
			
			case 3:
				if($value === null or empty($value))
					return $defaultsayfadescription;
				else
					return $value;
			break;	
			
		}
		
		return false;
	}