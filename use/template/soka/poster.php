<?php
_header_();
?>
<!-- start include -->
<main class="contenaire">
	<!-- banner -->
	<section class="publication-user">
		
		<div class="left-cont">
			
			<!-- content banner -->
			<div class="min-post min-body">
				<img src="<?= $PosterDATA['post_min'] ?>" width="100%">
			</div>
			<!-- end content banner -->
			<article class="poster user-read">
				<div class="information-poster one-view">
					<div class="date-information">
						<span class="date-update">
							Publié le <?= upDate($PosterDATA['post_date']) ?>
							Par 
							<?php 
							if(isset($PosterDATA['post_author']) && $PosterDATA['post_author'] != "") 
							{ 
								echo '<a href="'.__DIRUP__.'user/'.$PosterDATA['post_author_ID'].'">'.$PosterDATA['post_author']."</a>"; 
							} 
							?> 
						</span>
						<h1 class="title">
							<?= $PosterDATA['post_title'] ?>
						</h1>
					</div>
				</div>
				<div class="content-poster">
					<?= htmlspecialchars_decode($PosterDATA['post_content']) ?>
				</div>
			</article>
		</div>

		<div class="right-cont">

			<section class="publicitaire">
				
				<!-- coder un système de pub -->

				<div class="contnet-pub-center">
					
				</div>

			</section>
			
			<section class="algo-publication">

				<section class="publiciter-viewer">
					<section id="pub"></section>
					<script src="/pub/api.main.js"></script>
					<link rel="stylesheet" type="text/css" href="/pub/a.css">
				</section>
				
				<div class="header-section">
					<span class="title">
						ça peut vous inéraisser
					</span>
				</div>
				<div class="body-section">
					
					<div class="while">
						
						<?php
						$re = $GLOBALS['SQL']->PostView();
						for($i=0;$i<4;$i++) {
							$a = $re[$i];
						//while($a = posts(4))
						//{
						//	$b = postsCount();
						?>
						<div class="element-list">
							<div class="element-content">

								<div class="left-cont">
									<span class="img" style="background-image: url(<?= $a['post_min'] ?>);"></span>
								</div>
								<div class="right-cont">
									<div class="information">
										<span class="author">
											Sokanès
										</span>
										<a href="<?= __DIRUP__ ?><?= $a['post_type'][0]['slug'] ?>/<?= $a['post_name'] ?>"><span class="title"><?= $a['post_title'] ?></span></a>
										<span class="type">
											<?= $a['post_type'][0]['name'] ?>
										</span>
									</div>
								</div>
								
							</div>
						</div>
						<?php
						}
						?>

					</div>

				</div>

			</section>

		</div>

	</section>
	<!-- end banner -->
</main>
<!-- end include -->
<?php
_footer_();
?>