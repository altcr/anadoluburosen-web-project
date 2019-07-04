<?php require_once "inc/header.php";?>
		<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h1 class="mt-1">Blog Arama <span>Aramanıza ait sonuçlar aşağıda listelenmiştir.</span></h1>
					</div>
					<div class="col-lg-6">
						<ul class="breadcrumb">
							<li><a href="<?=url?>">Ana Sayfa</a></li>
							<li><a href="<?=url?>/blog">BLOG</a></li>
							<li class="active"><?=url(1)?></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<div class="container mt-lg">
			<div class="row">
				<div class="col-md-9">
					<div class="alert alert-info"><i class="icon-tag icons"></i><strong> "<?=url(1)?>"</strong>  İçin arama sonuçları.</div>
					<?=$blogitem?>
					<nav aria-label="Page navigation example">
					  <ul class="pagination">
						<?=$sayfanumara?>
					  </ul>
					</nav>
				</div>

				<div class="col-md-3">
					<?php include "blog-right.php";?>
				</div>
			</div>
		</div>
<?php require_once "inc/footer.php";?>
