<section class="list-post">
	
	<div class="content-sect">
		
		<div class="header-sect">
			
			<div class="name">
				<span class="h1">Liste Publication</span>
			</div>

		</div>
		<div class="body-sect">
			
			<section class="tablet post content-post">

				<?php
				$a=getPostArchives();
				//var_dump($a['data']);
				for($i=0;$i<count($a['data']);$i++)
				{
					$b=$a['data'][$i];
				?>
				
				<div class="ht">
					
					<div class="unit-header">
						
						<div class="text">
							<span><?= "{$b['post_title']}" ?></span>
						</div>

					</div>
					<div class="unit-content">
						
						<div class="text">
							<span class="text">
								<?= "{$b['post_author']}" ?>
							</span>
						</div>

					</div>
					<div class="unit-option">
						<a href="/0/account/edit_post/<?= "{$b['post_name']}" ?>">
							<button>Edité</button>
						</a>
						<a href="">
							<button>Suprimé</button>
						</a>
					</div>
				</div>

				<span class="hr"></span>
				<?php
				}
				?>

			</section>

		</div>
		<div class="footer-sect">
			
			<?php
					for($i=1;$i<=$a['page']["page_list_end"];$i++) {
	         			if($i == $a['page']["page_list_current"]) {
				?>
				<span class="page-count current">
					<?= $i ?>
				</span>
				<?php
						}
						else
						{
				?>
				<a class="page-count" href="/0/account/edit_post/pages/<?= $i ?>"><?= $i ?></a>
				<?php
						}
					}
				?>

		</div>

	</div>

</section>