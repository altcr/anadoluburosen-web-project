<?php require_once "inc/header.php";?>
		<section class="page-header page-header-color page-header-secondary page-header-float-breadcrumb">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<h1 class="mt-1">Blog <span>En güncel blog yazılarımızı okuyabilirsiniz.</span></h1>
					</div>
					<div class="col-lg-6">
						<ul class="breadcrumb">
							<li><a href="<?=url?>">Ana Sayfa</a></li>
							<li class="active">BLOG</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<div class="container mt-3 d-none d-sm-block">
			<div class="row">
				<?=$blogslider?>
			</div>
		</div>
		<div class="container mt-4">
			<div class="row">
				<div class="col-md-9">
					<div class="heading heading-border heading-middle-border heading-middle-border-center">
						<h5><strong>Tüm Yazılar</strong></h5>
					</div>
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
