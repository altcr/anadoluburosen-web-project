			<aside class="sidebar">
				<form action="<?=url?>/blog-arama/" method="post">
					<div class="input-group input-group-lg mb-xl">
						<input class="form-control" placeholder="arama..." name="s" minlength="3" maxlength="50" id="s" type="text" required>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<hr>
				<h4 class="heading-primary">Kategoriler</h4>
				<ul class="nav nav-list mb-xlg">
					<li class="col-md-12"><a href="<?=url?>/blog">Tüm Yazılar</a></li>
					<?php blogkategori();?>
				</ul>
				<hr>
			</aside>
