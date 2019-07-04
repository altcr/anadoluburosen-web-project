<?php require_once "inc/header.php"?>
	<?php
	if($girisvar)
	{
	?>

					<div class="row">
						<div class="col-md-12">							
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title"><?=$sayfaisim?></h2>
								</header>				
								<div class="panel-body sayfaicerikduzenleme">	
									<?=($sayfaaciklama)?> 
								</div>
							</section>
						</div>
					</div>
	<?php }else{ ?> 
					<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb p-xlg mb-0">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<h1><?=$sayfaisim?></h1>
								</div>
								<div class="col-md-6">
									<ul class="breadcrumb mt-sm text-right">
										<li><a href="<?=url?>">Ana Sayfa</a></li>
										<li>Sayfa</li>
										<li class="active"><?=$sayfaisim?></li>
									</ul>
								</div>
							</div>
						</div>
					</section>
					<?php if($SayfaBannerResimVar){?>
					<div class="container-fluid p-0 text-center">
						<?=$SayfaBannerResim?>
					</div>
					<?php }?>
					<div class="container mt-5">
						<div class="row">
							<div class="col-md-12 mb-4">							
								<?=($sayfaaciklama)?> 
							</div>
						</div>
					</div>
	<?php }?>
					
<?php require_once "inc/footer.php"?>