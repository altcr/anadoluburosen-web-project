<?php
	function filterurl($filters, $st=0)
	{
		if($st == 0) return htmlspecialchars(trim($filters));
		elseif($st == 1) return trim($filters);
		elseif($st == 2) return ($filters);
		else return trim(strip_tags($filters));
	}


	function get($name, $st=0)
	{
		
		if(isset($_GET[$name]))
		{
			if(is_array($_GET[$name])) {
				return array_map(function($item){
					return filterurl($item, $st);
				},$_GET[$name]);
			}
			
			return filterurl($_GET[$name], $st);
		}
		return false;	
	}
	
	function post($name, $st=0)
	{
		if(isset($_POST[$name]))
		{
			if(is_array($_POST[$name])) {
				return array_map(function($item){
					return filterurl($item, $st);
				},$_POST[$name]);
			}
			
			return filterurl($_POST[$name], $st);
		}
		return false;	
	}
	