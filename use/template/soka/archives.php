<?php
_header_();
?>
<!-- start include -->
<main class="contenaire">
	<!-- banner -->
	<?php 
		if(isset($dataMO['data']) && $dataMO['data'] != null) {
	?>
	<section class="content-list archive-cat">
		<div class="header-cont">
			<div class="name-section">
				<span class="name">Liste publication `<?= $GLOBALS['PAGER']->catName ?> `</span>
			</div>
		</div>
		<div class="body-cont">
			
			<div class="while-content">
				
				<?php
				

				?>
				<div class="align-sys">
					<?php
					for($god = 0; $god < count($dataMO['data']); $god++) {
	      				$a = $dataMO['data'][$god];
					?>
					<div class="element-card verticale">
						<a href="/<?= $a['post_type'][0]['slug'] ?>/<?= $a['post_name'] ?>">
						<div class="content flex">
							<div class="top">
								<div class="min-img-art">
									<span class="img" style="background-image: url(<?= $a['post_min'] ?>);"></span>
								</div>
							</div>
							<div class="bottom">
								
								<div class="content-flex">
									<div class="title">
										<span class="title-art"><?= $a['post_title'] ?></span>
									</div>

									<div class="date">
										<span class="date-art"><?= upDate($a['post_date']) ?></span>
									</div>
								</div>

							</div>
						</div>
						</a>
					</div>

					<?php
						}
					?>
				</div>

			</div>

		</div>
		<div class="footer-cont">
			
			<div class="list-page-access">
				
				<?php
					for($i=1;$i<=$dataMO['page']["page_list_end"];$i++) {
	         			if($i == $dataMO['page']["page_list_current"]) {
				?>
				<span class="page-count current">
					<?= $i ?>
				</span>
				<?php
						}
						else
						{
				?>
				<a class="page-count" href="/0/general/pages/<?= $i ?>"><?= $i ?></a>
				<?php
						}
					}
				?>

			</div>

		</div>
	</section>
	<?php
		}
	?>
	<!-- end banner -->
</main>
<!-- end include -->
<?php
_footer_();
?>