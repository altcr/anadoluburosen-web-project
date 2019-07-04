<?php
	function dokumanyaz($data)
	{
		global $UlasilamayanResim;
		if(!is_array($data)) return false;
		if(isset($data["url"]) and !empty($data["url"]))
		{
			$uzanti = pathinfo($data["url"], PATHINFO_EXTENSION);
			$ek = "";
			if(!isset($data["boyutsuz"]) and empty($data["boyutsuz"])) $data["boyutsuz"] = false;
			if(isset($data["divid"]) and !empty($data["divid"])) 		$ek .= ' id="'.$data["divid"].'" ';
			if(isset($data["divclass"]) and !empty($data["divclass"]))	$ek .= ' class="'.$data["divclass"].'" ';
			if(isset($data["title"]) and !empty($data["title"])) 		$ek .= ' alt="'.$data["title"].'" title="'.$data["title"].'" ';
			if(isset($data["style"]) and !empty($data["style"])) 		$ek .= ' style="'.$data["style"].'"';
			if(isset($data["height"]) and !empty($data["height"]) and $data["boyutsuz"] === false) 		$ek .= ' height="'.$data["height"].'"';
			if(isset($data["width"]) and !empty($data["width"]) and $data["boyutsuz"] === false) 		$ek .= ' width="'.$data["width"].'"';
			if(isset($data["images"]) and !empty($data["images"])) 		$ek .= ' poster="'.$data["images"].'" ';	
			if(isset($data["ek"]) and !empty($data["ek"])) 				$ek .= ' '.$data["ek"];	
			$Kontrol = get_headers($data["url"]);	
			switch($uzanti)
			{
				case "jpg":
				case "jpeg":
				case "png":
				case "gif":
					if($Kontrol[0] !== "HTTP/1.0 200 OK" and $Kontrol[0] !== "HTTP/1.1 200 OK")
					{
						$data["url"] = $UlasilamayanResim;
					}else{
						$ResimBilgi = getimagesize($data["url"]);
						if(!isset($data["width"]) and empty($data["width"]) and $data["boyutsuz"] !== false) 		$ek .= ' width="'.$ResimBilgi[0].'"';
						if(!isset($data["height"]) and empty($data["height"]) and $data["boyutsuz"] !== false) 		$ek .= ' height="'.$ResimBilgi[1].'"';
					}
					return '<img src="'.$data["url"].'" '.$ek.'/>';
				break;
				
				case "mp4":
					return'	<video'.$ek.'preload="none">
								<source src="'.$data["url"].'" type="video/mp4">
							</video>';
				break;
				
				case "mp3":
					return'	<video'.$ek.'preload="none">
								<source src="'.$data["url"].'" type="video/mp3">
							</video>';
				break;
				
				default:
				case "pdf":
					return'<iframe src="'.$data["url"].'"'.$ek.'scrolling="auto" frameborder="0"></iframe>';
				break;
			}
		}
		return false;
	}
?>