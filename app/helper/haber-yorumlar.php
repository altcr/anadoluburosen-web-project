<?php
	function haber_yorumlar($a, $b, $c = -1, $d = false)
	{
		global $db;
		if($d === true)
			return count($db->select("haber_yorumlar")->where("tip",$a)->where("itemid",$b)->where("durum",1)->run());
		$yorumlar = $db->select("haber_yorumlar")->where("tip",$a)->where("itemid",$b)->where("altid",$c)->where("durum",1)->run();
		if($yorumlar)
			foreach($yorumlar as $val)
			{
				echo '	<li id="yorumgoster'.$val["id"].'">
							<div class="comment">
								<div class="img-thumbnail">
									<img class="avatar" src="'.assurl.'/img/aekod-aelogo.png" alt="'.$val["adsoyad"].'" title="'.$val["adsoyad"].'">
								</div>
								<div class="comment-block">
									<div class="comment-arrow"></div>
									<span class="comment-by">
										<strong>'.$val["adsoyad"].'</strong>
										<span class="pull-right">
											<span> <a href="#" class="yorumyanitla" data-id="'.$val["id"].'"><i class="fa fa-reply"></i> Yanıtla</a></span>
										</span>
									</span>
									<p>'.$val["mesaj"].'</p>
									<span class="date pull-right">'.turkcetarih("m F Y H:i l",$val["tarih"]).'</span>
								</div>
							</div>';
				$altyorumlar = $db->select("haber_yorumlar")->where("tip",$a)->where("itemid",$b)->where("altid",$val["id"])->where("durum",1)->run();
				if($altyorumlar)
				{
					echo '<ul class="comments reply">';
						yorumlar($a, $b, $val["id"] )	;
					echo '</ul>';
				}
				echo '	</li>';
			}
		else{
			echo '<div class="alert alert-warning"><strong><i class="fa fa-thumbs-o-up"></i> İlk yorumu sen yapmaya ne dersin.</strong></div>';
		}
		return false;
	}
