<?php
	class HelperLoad{
		
		public static function Load()
		{
				$helpirdir =  dir."/helper";
		
				if($dh = opendir($helpirdir))
				{
					while($file = readdir($dh))
					{
						if(is_file($helpirdir."/".$file))
						{
							require_once $helpirdir."/".$file;
						}
					}
				}
		}
	}
?>