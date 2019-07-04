<?php

	function haberkategori($a=-1){
		global $db;
		$kategori=$db->select("haber_kategori")->where("durum",1)->where("alt_id",$a)->run();
		if($kategori)
			foreach($kategori as $val){
				echo '<li'.(url(1) == $val["selflink"] ? ' class="col-md-12 active"': ' class="col-md-12"').'><a href="'.url.'/haber-kategori/'.$val["selflink"].'">'.$val["ad"].'</a>';
				$varmi=$db->select("haber_kategori")->where("durum",1)->where("alt_id",$val["id"])->run(true);
				if($varmi){
					echo "<ul>";
					haberkategori($val["id"]);
					echo "</ul>";
				}
				echo "</li>";
			}
		else echo '<div class="alert alert-warning"><strong><i class="fa fa-frown-o"></i> Şuan Kategori Eklenmemiş.</strong></div>';
	}

?>
