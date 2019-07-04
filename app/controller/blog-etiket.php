<?php 
		$_sayfatitle = url(1);
		$_sayfakeywords = url(1);
		$_sayfadescription = url(1)." Etikleti ile ilgili bulunan yazılar.";
		
		if(!url(1)) exit(header("Location:".url."/blog"));
		$sayfanumara = "";
		$toplamblog = count($db->select("blog")->from("blog.id")->join("blog_kategori","%s.id=%s.katid and blog_kategori.durum=1","inner")->where("durum",1)->where("keylink",url(1).",%","like")->or_where("keylink","%,".url(1),"like")->or_where("keylink","%,".url(1).",%","like")->run());
		if($toplamblog)
		{
			
			$gecerlis = url(3) ? (is_numeric(url(3)) ? url(3) : 1): 1;
			$toplams = ceil($toplamblog/$blogyazilimit);
			if($gecerlis <= $toplams)
			{
				$gblog = $blogyazilimit*($gecerlis-1);

				if($toplamblog > $blogyazilimit)
				{
					$saynumadet = 10;
					if($gecerlis > $saynumadet/2+1 and $gecerlis < $toplams and $toplams > 1) $sayfanumara .= '<li><a href="'.url.'/blog-etiket/'.url(1).'/sayfa/1">«</a></li>';
					for($i = $gecerlis-$saynumadet/2; $i< $gecerlis+$saynumadet/2; $i++)
					{
						if($toplams < $i or $i <=0) continue;
						$sayfanumara .= '<li'.($gecerlis == $i ? ' class="active"' : "" ).'><a href="'.url.'/blog-etiket/'.url(1).'/sayfa/'.$i.'">'.$i.'</a></li>';
					}
					if($toplams - ($saynumadet/2-1) > $gecerlis and $gecerlis < $toplams and $toplams > 1) $sayfanumara .= '<li><a href="'.url.'/blog-etiket/'.url(1).'/sayfa/'.$toplams.'">»</a></li>';
				}
			}else exit(header("Location:".url."/blog"));
			

			
			$blog = $db->select("blog")->from("blog.*, blog_kategori.selflink as blogselflink, blog_kategori.ad as blogad")->join("blog_kategori","%s.id=%s.katid and blog_kategori.durum=1","inner")->where("durum",1)->where("keylink",url(1).",%","like")->or_where("keylink","%,".url(1),"like")->or_where("keylink","%,".url(1).",%","like")->limit($gblog,$blogyazilimit)->run();

			$renk = array("default","success","info","warning","danger","dark","primary","secondary","tertiary","quaternary");
			
			$blogitem = "";
			if($blog)
			{
				foreach($blog as $val)
				{
					$blogitem .= '<div class="row">
						<div class="col-md-5 mb-md">
							<div class="portfolio-item">
								<a href="'.url."/blog-detay/".$val["selflink"].'" title="'.$val["baslik"].'">
									<span class="thumb-info thumb-info-no-zoom thumb-info-lighten">
										<span class="thumb-info-wrapper">
											<img src="'.upurl."/".$val["kapak_img"].'" class="img-responsive" alt="'.$val["baslik"].'" title="'.$val["baslik"].'">
											<span class="thumb-info-action">
												<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
											</span>
										</span>
									</span>
								</a>
							</div>
						</div>
						<div class="col-md-7">
							<div class="portfolio-info">
								<div class="row">
									<div class="col-md-12 center">
										<ul>
											<li><i class="icon-calendar icons"></i> '.turkcetarih("d F Y", $val["tarih"]).'</li>
											<li><i class="icon-bubbles icons"></i> <a href="'.url."/blog-detay/".$val["selflink"].'#comments">'.yorumlar(1,$val["id"],-1,true).'</a></li>
										</ul>
									</div>
								</div>
							</div>
							<span class="label label-lg label-'.$renk[($val["katid"] % 10)].'" style="display:inline-block;padding:5px;"><a href="'.url."/blog-kategori/".$val["blogselflink"].'"  title="'.$val["blogad"].'" style="color:#fff">'.$val["blogad"].'</a></span>
							<p class="mt-xlg"><a href="'.url."/blog-detay/".$val["selflink"].'" class="bloglink"><strong style="min-height:50px;display: inline-block;">'.$val["baslik"].'</strong></a></p>
							<ul class="portfolio-details">
								<li class="text-right">
									<a href="'.url."/blog-detay/".$val["selflink"].'" title="'.$val["baslik"].'" class="btn btn-sm btn-default"><i class="fa fa-hand-o-right"></i> Devamını Oku</a>
								</li>
							</ul>
						</div>
					</div><hr class="solid tall mt-md mb-md">';
				}
			}	
			else{
				$blogitem = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Bu etikete ait içerik mevcut değildir.</strong></div>';
			}
		}
		else{
			$blogitem = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Bu etikete ait içerik mevcut değildir.</strong></div>';
		}
	