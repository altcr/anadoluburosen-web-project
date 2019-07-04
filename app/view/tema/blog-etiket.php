<?php require_once "inc/header.php";?>
		<div class="container mt-lg">
			<div class="row">
				<div class="col-md-9">
					<div class="alert alert-info"><strong><i class="icon-tag icons"></i> "<?=url(1)?>" etiketini İçeren yazılar.</strong></div>
					<?=$blogitem?>	
					<ul class="pagination pagination-lg pull-right">
						<?=$sayfanumara?>	
					</ul>
				</div>

				<div class="col-md-3">
					<?php include "blog-right.php";?>
				</div>
			</div>
		</div>
<?php require_once "inc/footer.php";?> 