<?php

	function url($item)
	{
		global $_url;
		if(isset($_url[$item])) 
			return $_url[$item];
		return false;
	}
	
	function controller($item){
		return controller."/".$item.".php";
	}
	
	function view($item){
		if(file_exists(view."/".$item.".php"))
			return view."/".$item.".php";
		return false;
	}
	