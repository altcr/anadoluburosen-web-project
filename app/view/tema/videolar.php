<?php require_once "inc/header.php";?>
		<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h1 class="mt-1">Video <span>En güncel videoları izleyebilirsiniz.</span></h1>
					</div>
					<div class="col-lg-6">
						<ul class="breadcrumb">
							<li><a href="<?=url?>">Ana Sayfa</a></li>
							<li class="active">VİDEO</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-12">
					<div class="heading heading-border heading-middle-border heading-middle-border-center">
						<h5><strong>Tüm VİDEOLAR</strong></h5>
					</div>
				</div>
				<?=$videoitem?>
			</div>
		</div>
<?php require_once "inc/footer.php";?>
