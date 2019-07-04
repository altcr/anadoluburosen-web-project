<?php 
	function akb($key="")
	{
		if(!isset($key)) return false;
		
		if(isset($_COOKIE["admingiris"]) and $_COOKIE["admingiris"])
		{
			$girisveri = unserialize(sifrecoz($_COOKIE["adminsafe1"], md5("1")));
		}
		
		if($key === true) return $girisveri;
		return $girisveri[$key];
	}