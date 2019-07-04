<?php

$toplamuye=$db->select("kullanicilar")->run();
$toplamhaber=$db->select("haber")->run();
$toplamhaberyorum=$db->select("haber_yorumlar")->run();
$toplamblog=$db->select("blog")->run();
$toplamblogyorum=$db->select("yorumlar")->run();
$mesaj=$db->select("iletisim")->where("durum",0)->run();

?>

<div class="alert alert-info">
  <strong> <?=count($mesaj)?> Adet yeni mesajınız bulunmaktadır.</strong>
</div>

<div class="row">
	<div class="col-md-12 col-lg-6 col-xl-6">
		<section class="panel panel-featured-left panel-featured-primary">
			<div class="panel-body">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-th-list"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Haber</h4>
							<div class="info">
								<strong class="amount"><?=count($toplamhaber)?></strong>
							</div>
						</div>
						<div class="summary-footer">
							<a href="<?=aurl?>/index.php?s=haber" class="text-muted text-uppercase">Tüm Haberler</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-12 col-lg-6 col-xl-6">
		<section class="panel panel-featured-left panel-featured-secondary">
			<div class="panel-body">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-secondary">
							<i class="fa fa-users"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Üye</h4>
							<div class="info">
								<strong class="amount"><?=count($toplamuye)?></strong>
							</div>
						</div>
						<div class="summary-footer">
							<a href="<?=aurl?>/index.php?s=uyeler" class="text-muted text-uppercase">Tüm Üyeler</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-6 col-xl-6">
		<section class="panel panel-featured-left panel-featured-tertiary">
			<div class="panel-body">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-tertiary">
							<i class="fa fa-shopping-cart"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Blog</h4>
							<div class="info">
								<strong class="amount"><?=count($toplamblog)?></strong>
							</div>
						</div>
            <div class="summary-footer">
							<a href="<?=aurl?>/index.php?s=blog" class="text-muted text-uppercase">Tüm Blog Yazıları</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-12 col-lg-6 col-xl-6">
		<section class="panel panel-featured-left panel-featured-success">
			<div class="panel-body">
				<div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-primary">
							<i class="fa fa-hourglass-2"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Haber Yorumları</h4>
							<div class="info">
								<strong class="amount"><?=count($toplamhaberyorum)?></strong>
							</div>
						</div>
						<div class="summary-footer">
              <a href="<?=aurl?>/index.php?s=haberyorumislemleri" class="text-muted text-uppercase">Tüm Yorumlar</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-md-12 col-lg-6 col-xl-6">
		<section class="panel panel-featured-left panel-featured-success">
			<div class="panel-body">
				<div class="widget-summary">
          <div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon bg-success">
							<i class="fa fa-hourglass-2"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Blog Yorumları</h4>
							<div class="info">
								<strong class="amount"><?=count($toplamblogyorum)?></strong>
							</div>
						</div>
						<div class="summary-footer">
              <a href="<?=aurl?>/index.php?s=blogyorumislemleri" class="text-muted text-uppercase">Tüm Yorumlar</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
