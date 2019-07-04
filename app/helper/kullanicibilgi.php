<?php
	function kb($key="")
	{
		if(!isset($key)) return false;
		if(isset($_SESSION["giris"]) and $_SESSION["giris"])
		{
			$girisveri = unserialize(sifrecoz($_SESSION["safe2"], $_SESSION["safe1"]));
		}

		if($key === true) return $girisveri;
		return $girisveri[$key];
	}
?>
