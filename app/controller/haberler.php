<?php

		$_sayfatitle 		= 	"Haber";
		$_sayfakeywords 	=	"Haber";
		$_sayfadescription 	= 	"Her türlü teknolojik gelişmeleri, haberleri ve yazıları sizler için derledik.";
		$sayfanumara 		=	"";
		$blogslider 		= 	'';

		$toplamblog = count($db->select("haber")->where("durum",1)->run());
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
					if($gecerlis > $saynumadet/2+1 and $gecerlis < $toplams and $toplams > 1) $sayfanumara .= '<li><a href="'.url.'/haber-kategori/'.url(1).'/sayfa/1">«</a></li>';
					for($i = $gecerlis-$saynumadet/2; $i< $gecerlis+$saynumadet/2; $i++)
					{
						if($toplams < $i or $i <=0) continue;
						$sayfanumara .= '<li'.($gecerlis == $i ? ' class="active"' : "" ).'><a href="'.url.'/haber-kategori/'.url(1).'/sayfa/'.$i.'">'.$i.'</a></li>';
					}
					if($toplams - ($saynumadet/2-1) > $gecerlis and $gecerlis < $toplams and $toplams > 1) $sayfanumara .= '<li><a href="'.url.'/haber-kategori/'.url(1).'/sayfa/'.$toplams.'">»</a></li>';
				}
			}else exit(header("Location:".url."/haberler"));



			$blog = $db->select("haber")->from("haber.*, haber_kategori.selflink as haberselflink, haber_kategori.ad as haberad")->join("haber_kategori","%s.id=%s.katid and haber_kategori.durum=1","inner")->where("durum",1)->orderby("tarih","Desc")->limit($gblog,$blogyazilimit)->run();

			$renk = array("default","success","info","warning","danger","dark","primary","secondary","tertiary","quaternary");

			$blogitem = "";
			if($blog)
			{
				foreach($blog as $val)
				{
					$blogitem .= '<div class="row">
							<div class="col-md-5 mb-md">
								<div class="portfolio-item">
									<a href="'.url."/haber-detay/".$val["selflink"].'" title="'.$val["baslik"].'">
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
												<li><h5><span class="badge badge-'.$renk[($val["katid"] % 10)].'" style="display:inline-block;padding:5px;"><a href="'.url."/haber-kategori/".$val["haberselflink"].'"  title="'.$val["haberad"].'" style="color:#fff">'.$val["haberad"].'</a></span></h5></li>
												<li><i class="icon-calendar icons"></i> '.turkcetarih("d F Y", $val["tarih"]).'</li>
												<li><i class="icon-bubbles icons"></i> <a href="'.url."/haber-detay/".$val["selflink"].'#comments">'.yorumlar(1,$val["id"],-1,true).'</a></li>
											</ul>
										</div>
									</div>
								</div>
								<p class="mt-xlg"><a href="'.url."/haber-detay/".$val["selflink"].'" class="bloglink"><strong style="min-height:50px;display: inline-block;">'.$val["baslik"].'</strong></a></p>
								<ul class="portfolio-details">
									<li class="text-right">
										<a href="'.url."/haber-detay/".$val["selflink"].'" title="'.$val["baslik"].'" class="btn btn-sm btn-default"><i class="fa fa-hand-o-right"></i> Devamını Oku</a>
									</li>
								</ul>
							</div>
						</div><hr class="solid tall mt-0 mb-4">';
				}
			}
			else{
				$blogitem = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Bu kategoriye ait içerik mevcut değildir.</strong></div>';
			}

			$slider = $db->select("haber")->from("haber.*, haber_kategori.selflink as haberselflink, haber_kategori.ad as haberad")->join("haber_kategori","%s.id=%s.katid","inner")->where("durum",1)->where("slider",1)->orderby("tarih","desc")->limit(5)->run();
			if($slider)
			{
				$say = 1;
				foreach($slider as $val)
				{
					$slideritem[] = '
									<a href="'.url."/haber-detay/".$val["selflink"].'" title="'.$val["baslik"].'">
										<span class="thumb-info thumb-info-centered-info thumb-info-no-borders mb-md">
											<span class="thumb-info-wrapper">
												<img src="'.upurl."/".$val["kapak_img"].'" class="img-responsive" alt="'.$val["baslik"].'" title="'.$val["baslik"].'" height="'.($say == 1 ? "305" : "145").'" width="'.($say == 1 ? "555" : "263").'">
												<span class="thumb-info-title">
													<span class="thumb-info-inner">'.strto(mb_substr($val["baslik"],0,100,"UTF-8"),"b").'</span>
													<span class="label label-'.$renk[($kategori["id"] % 10)].'" style="">'.strto($val["haberad"],"b").'</span>
												</span>
												<span class="thumb-info-action">
													<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
												</span>
											</span>
										</span>
									</a>
					';
					$say++;
				}
				$blogslider = '
								<div class="col-md-6">
									'.$slideritem[0].'
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											'.$slideritem[1].'
										</div>
										<div class="col-md-6">
											'.$slideritem[2].'
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											'.$slideritem[3].'
										</div>
										<div class="col-md-6">
											'.$slideritem[4].'
										</div>
									</div>
								</div>
						';
			}
		}
		else{
			$blogitem = '<div class="alert alert-danger"><strong><i class="fa fa-warning"></i> Bu kategoriye ait içerik mevcut değildir.</strong></div>';
		}
?>
