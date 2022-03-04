<?php
_header_();
?>
<!-- start include -->
<main class="">
	<!-- banner -->
	<section class="home banner banner-information-service">

		<div class="left-cont">
			
			<div class="banner-information-service">

				<div class="background">
					<span class="img" style="background-image:  url('/sokanes/use/files/img/ban.png');"></span>
				</div>

				<div class="main">
					
					<section class="header">
						
						<h1>l'information SANS critique, en NEUTRE</h1>

					</section>
					<section class="body">
						
						<span class="title">
							L'information en neutre, détaillée, compréhensible et en simple de compréhension
						</span>

						<p>
							Nos équipes sont là pour proposer la meuilleure experience possible.
						</p>

					</section>
					<section class="footer">
						


					</section>
				</div>


			</div>

		</div>
		<div class="right-cont cont-align-card">
			
			<div class="while">
				
				<?php
				$re = $GLOBALS['SQL']->PostView();
				for($i=0;$i<2;$i++) {
					$a = $re[$i];
					
				?>
				<div class="element-user-inter">

					<div class="contnet-element-flex-align">


						<div class="header-cont">
							
							<div class="cont">
								
								<div class="left">
									
									<div class="text">
										<span class="title"><?= $a['post_title'] ?></span>
									</div>

								</div>
								<div class="right">
									
									<div class="min">
										
										<img src="<?= $a['post_min'] ?>" width="100%">

									</div>

								</div>

							</div>

						</div>
						<div class="body-cont">
							
							<div class="content">
								
								<p class="text">
									<?= raiduct($a['post_subTitle'], 151) ?>
								</p>

							</div>

						</div>
						<div class="footer-cont">
							
							<div class="content">
								
								<div class="left-cont">
									
									<a href="<?= __DIRUP__ ?><?= $a['post_type'][0]['slug'] ?>/<?= $a['post_name'] ?>">
										<span class="text">Lire la suite</span>
									</a>

								</div>

								<div class="right-cont">
									
									<span class="date art-element"><?= upDate($a['post_date']) ?></span>
								</div>

							</div>

						</div>
					</div>

				</div>
				<?php } ?>

			</div>

		</div>
		
	</section>
	<!-- end banner -->
	<!-- banner -->
	<section class="home publication-rows">

		<section class="contenaire">

			<section class="home publication-information">
				<div class="center">
					<h1>Nos Dernières publications</h1>
					<p>
					Nous publions toute les semaines, une nouvelle publication. Composé de cours, et de recherches.
					<br>
					Nous choisissons les meuilleurs sources pour nos publications. Nous ne partagons auccune idée ni envie, nous sommes tout ce qu'il y a de plus simple. 
					</p>
				</div>
			</section>
			
			<section class="while-content publication">
				<!-- rows -->
				<?php
				$b =0;
				$re = $GLOBALS['SQL']->PostView();
				for($i=0;$i<4;$i++) {
					$b += 0;

					if($b == 1 || $b == 3)
						echo '<div class="rows while-sep row-count'.$b.'">';
				?>
				<div class="card">
					
					<div class="card-background">
						<span class="img" style="background-image: url(<?= $re[$i]['post_min'] ?>);"></span>
					</div>
					<div class="card-content">
						<div class="card-header">
							<left class="left-cont">
								<span class="count-row"><!-- 0<?= $b ?> --></span>
							</left>
							<left class="right-cont"></left>
						</div>
						<div class="card-body">
							<div class="title">
								<?= $re[$i]['post_title'] ?>
							</div>
							<div class="description">
								<?= raiduct($re[$i]['post_subTitle'], 100) ?>
							</div>
						</div>
						<div class="card-footer">
							<div class="btn">
								<a href="<?= __DIRUP__ ?><?= $re[$i]['post_type'][0]['slug'] ?>/<?= $re[$i]['post_name'] ?>">
									Lire la suite <ion-icon class="icone" name="chevron-forward-outline"></ion-icon>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
					if($b == 2 || $b == 4)
						echo "</div>";
				}
				?>
				<!-- end rows -->
			</section>

		</section>

	</section>
	<!-- banner -->
	<!-- banner -->
	<section class="home banner banner-information">
		<section class="background">
			
		</section>
		<section class="banner-contenaire">
			<div class="left">
				<div class="information">
					<h1>Soyez la communauté</h1>
					<p>
						La communication du savoir attend que vous.
						<br>
						Partagé avec le communauté, ce que vous aimés et vos conseil. Partagé des idées et nous les partagons. Consever le site. SOYEZ LA COMMUNATé 
					</p>
				</div>
				<div class="option">
					<a href="web-sign.php">
						<span class="text-content">
							êtres demain
						</span>
					</a>
				</div>
			</div>
		</section>
	</section>
	<!-- end banner -->
	<!-- banner -->
	<section class="home service-info">
		
		<div class="contenaire">
			
			<div class="header-sect">
				
				<div class="bande rotate">
					<h1>Qui sommes nous ? Pourquoi sommes nous utile ?</h1>
				</div>

			</div>
			<div class="body-sect">
				
				<div class="while-user-helper">
					

					<div class="card horizontale">
						
						<div class="content">
							
							<div class="left-cont">
								
							</div>

							<div class="right-cont">
								
								<div class="body texts">
									
									<span class="big-text">
										<b>Pour tous les goût !</b>
									</span>

									<span class="big-s-text">
										<p>
											Ici vous aurez de quoi vous divertir et vous informez, peu importe ce que vous aimez il y a des articles pour tout le monde ici.<br>
											Avec un petit peu de recherche vous trouverez un article qui vous plaira, nous espèrons que Sokanes vous apportera divertissement, culture ...
										</p>
									</span>

								</div>

							</div>

						</div>

					</div>
					<div class="card horizontale">
						
						<div class="content">
							
							<div class="left-cont">
								
							</div>

							<div class="right-cont">
								
								<div class="body texts">
									
									<span class="big-text">
										<b>Nous sommes Utile </b>
									</span>

									<span class="big-s-text">
										<p>
											Nous vous informons de bonne choses, ne vous disons se que il faut passé. Nous passons l'information. Et ses tou.<br>
											Sokanès, vous fais decouvrire se resource, des texte ne critiquand pas et vous laissant imaginé ce que vous lisé.
										</p>
									</span>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>
			<div class="header-sect"></div>

		</div>

	</section>
	<!-- end banner -->
	<!-- banner -->
	<section class="home user-list">
		
		<div class="section-header">
			


		</div>

		<div class="section-body contenaire">
			
			<div class="for" align="center">

				<?php $for = [
					[
						"name" => "Aide",
						"desc" => "Avec sokanès, vous pouvez êtres aidé à votr juste valeurs.
									<br>
									Nous ne jugeons pas et ne donnons pas d'avis"
					],
					[
						"name" => "Neutralité",
						"desc" => "Avec sokanès, vous pouvez êtres aidé à votr juste valeurs.
									<br>
									Nous ne jugeons pas et ne donnons pas d'avis"
					],
					[
						"name" => "Communauté",
						"desc" => "Avec sokanès, vous pouvez êtres aidé à votr juste valeurs.
									<br>
									Nous ne jugeons pas et ne donnons pas d'avis"
					]
				]; ?>
				
				<?php for($i = 0;$i < count($for); $i++) { ?>
				<div class="card-use">
					<div class="top">
						
						<div class="min">
							<img src="/sokanes/use/files/img/use.png" width="100%">
						</div>

					</div>
					<div class="bottom">
						
						<div class="information">
							
							<div class="name">
								<span><b><?= $for[$i]['name'] ?></b></span>
							</div>

							<div class="desc">
								<p>
									<?= $for[$i]['desc'] ?>
								</p>
							</div>

						</div>

					</div>
				</div>
				<?php } ?>

			</div>

		</div>

	</section>
	<!-- end banner -->
</main>
<!-- end include -->
<?php
_footer_();
?>
