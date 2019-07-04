<?php

		$_sayfatitle 		= "Blog";
		$_sayfakeywords 	=	"Blog";
		$_sayfadescription 	= "Her türlü teknolojik gelişmeleri, haberleri ve yazıları sizler için derledik.";

		$video = $db->select("video")->where("durum",1)->orderby("id","Desc")->run();
		$videoitem = "";
		if($video)
		{
			foreach($video as $val)
			{
				$videoitem .= '					  <div class="col-md-4">
											<a title="'.$val["baslik"].'" class="text-decoration-none">
												<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
													<span class="thumb-info-side-image-wrapper col-md-12">
														<iframe width="100%" height="250" src="https://www.youtube.com/embed/'.$val["link"].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
													</span>
													<span class="thumb-info-caption">
														<span class="thumb-info-caption-text p-xl">
															<h4 class="font-weight-semibold mb-1">'.$val["baslik"].'</h4>
														</span>
													</span>
												</span>
											</a>
										</div>';
			}
		}
		else{
			$videoitem = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Video mevcut değildir.</strong></div>';
		}
?>
