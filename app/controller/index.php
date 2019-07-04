<?php
	$_sayfatitle = "Ana Sayfa";
	$_sayfakeywords = "ana sayfa";
	$_sayfadescription = null;

	$slider="";
	$sliders = $db	->select("slider")
					->where("durum",1)
					->orderby("sira","asc")
					->run();

	if($sliders)
	{
		foreach($sliders as $val)
		{
			$slider.='<li data-transition="'.$val["animate"].'">
				<img src="'.upurl.'/'.$val["resim"].'"
					alt="Slider"
					data-bgposition="center center"
					data-bgfit="cover"
					data-bgrepeat="no-repeat"
					class="rev-slidebg">';

			if(!empty($val["baslik"]))
			{
				$slider.='<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-55"
					data-start="500"
					style="z-index: 5; text-transform: uppercase; font-size: 52px;"
					data-transform_in="y:[-300%];opacity:0;s:500;">'.$val["baslik"].'</div>';
			}

			if(!empty($val["aciklama"]))
			{
				$slider.='<div class="tp-caption main-label"
					data-x="left" data-hoffset="25"
					data-y="center" data-voffset="-5"
					data-start="1500"
					data-whitespace="nowrap"
					data-transform_in="y:[100%];s:500;"
					data-transform_out="opacity:0;s:500;"
					style="z-index: 5; font-size: 1.5em; text-transform: uppercase;"
					data-mask_in="x:0px;y:0px;">'.$val["aciklama"].'</div>';
			}

			if(!empty($val["link"]))
			{
				$slider.='<div class="tp-caption bottom-label"
						data-x="left" data-hoffset="25"
						data-y="center" data-voffset="40"
						data-start="2000"
						style="z-index: 5; padding-bottom: 3px;"
						data-transform_in="y:[100%];opacity:0;s:500;" style="font-size: 1.2em;">
						<a href="'.$val["link"].'"><button class="btn btn-1">Detay</button></a></div>';
			}
			$slider.=' </li>';
		}
	}

	$blog = $db->select("blog")->where("durum",1)->orderby("id","Desc")->limit($blogyazilimit)->run();
	$blogitem = "";
	if($blog)
	{
		foreach($blog as $val)
		{
			$blogitem .= '<div class="col-md-4">
											<a href="'.url."/blog-detay/".$val["selflink"].'" title="'.$val["baslik"].'" class="text-decoration-none">
												<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
													<span class="thumb-info-side-image-wrapper col-md-12">
														<img alt="'.$val["baslik"].'" class="img-fluid" src="'.upurl.'/'.$val["kapak_img"].'">
													</span>
													<span class="thumb-info-caption">
														<span class="thumb-info-caption-text p-xl">
															<h4 class="font-weight-semibold mb-1">'.(mb_substr($val["baslik"],0,25,"UTF-8")).'..</h4>
														</span>
													</span>
												</span>
											</a>
										</div>';
		}
	}

	$video = $db->select("video")->where("durum",1)->orderby("id","Desc")->limit($videolimit)->run();
	$videoitem = "";
	if($video)
	{
		foreach($video as $val)
		{
			$videoitem .= '
										<div class="col-md-4">
											<a title="'.$val["baslik"].'" class="text-decoration-none">
												<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
													<span class="thumb-info-side-image-wrapper col-md-12">
														<iframe width="100%" height="250" src="https://www.youtube.com/embed/'.$val["link"].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
													</span>
													<span class="thumb-info-caption">
														<span class="thumb-info-caption-text p-xl">
															<h4 class="font-weight-semibold mb-1">'.mb_substr($val["baslik"],0,25,"UTF-8").'..</h4>
														</span>
													</span>
												</span>
											</a>
										</div>';
		}
	}

	$haber = $db->select("haber")->where("durum",1)->orderby("id","Desc")->limit($haberyazilimit)->run();
	$haberitem = "";
	if($haber)
	{
		foreach($haber as $val)
		{
			$haberitem .= '<div class="col-md-4">
											<a href="'.url."/haber-detay/".$val["selflink"].'" title="'.$val["baslik"].'" class="text-decoration-none">
												<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
													<span class="thumb-info-side-image-wrapper col-md-12">
														<img alt="'.$val["baslik"].'" class="img-fluid" src="'.upurl.'/'.$val["kapak_img"].'">
													</span>
													<span class="thumb-info-caption">
														<span class="thumb-info-caption-text p-xl">
															<h4 class="font-weight-semibold mb-1">'.(mb_substr($val["baslik"],0,25,"UTF-8")).'..</h4>
														</span>
													</span>
												</span>
											</a>
										</div>';
		}
	}

	$kullanici_yorumlar=$db->select("kullanici_yorumlar")->orderBy("id","desc")->limit(5)->run();
	$yorum_item="";
	foreach ($kullanici_yorumlar as $val) {
		$yorum_item .= '<div class="row justify-content-center">
											<div class="col-lg-8 pt-4 mt-3">
												<div class="testimonial testimonial-style-2 testimonial-with-quotes mb-0">
													<div class="testimonial-quote">“</div>
													<blockquote>
														<p class="font-weight-light">'.$val["yorum"].'</p>
													</blockquote>
													<div class="testimonial-author">
														<p class="text-uppercase">
															<strong>'.$val["adSoyad"].'</strong>
														</p>
													</div>
												</div>
											</div>
										</div>';
	}
