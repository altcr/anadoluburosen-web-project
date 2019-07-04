<?php

	function ustmenu($altid = -1, $kat = 1)
	{
		if($kat > 2) return false;
		else $kat++;
		global $db;
		$menu = $db->select("menu")->where("altid", $altid)->where("durum",1)->orderby("sira")->run();
		foreach($menu as $val)
		{
			$val["link"] = str_replace("[site_link]", url, $val["link"]);
			$altvarmi = $db->select("menu")->where("altid", $val["id"])->where("durum",1)->orderby("sira")->run();
			if($altvarmi)
			{
				echo '
						<li class="dropdown">
							<a class="nav-link dropdown-toggle" href="'.$val["link"].'" title="'.$val["title"].'">
								'.$val["title"].'
							</a>
							<ul class="dropdown-menu">';
							ustmenu($val["id"],$kat);	
				echo '		</ul>
						</li>
					';
			}
			else
			{
				echo '<li class="">
						<a class="nav-link" href="'.$val["link"].'"'.(is_null($val["target"]) ? null :  'target="'.$val['target'].'"').' title="'.$val["title"].'">
							'.strto($val["title"],"b").' 
						</a>
					</li>';
			}
			
		}
	}