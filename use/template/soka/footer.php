	<footer>
		<section class="footer-content">
			<div class="footer-foot">
				<h2 style="text-align: center;">Sokanès, neutre en information</h2>
			</div>
			<div class="contnet-colluns">
				<div class="column map">
					<h2>Map</h2>
					<ul>
						<li><a href="<?= __DIRUP__ ?>">Home</a></li>
						<li><a href="https://www.sokanes.ga/p/510264658956898221722281779739">help</a></li>
					</ul>
				</div>
				<div class="column map">
					<h2>Map Catégorie</h2>
					<?php
						$agt = $GLOBALS['SQL']->PostMetas();
						for($i=0;$i<count($agt);$i++)
						{
							if($agt[$i]['term_group'] >= 0)
							{
								$qeury = "SELECT * FROM fl_posts WHERE post_type = ? ORDER BY ID DESC";
								if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "s", [$agt[$i]['term_group']]))
								{
									die("echec");
								}

								if($data['data'])
								{
					?>
					<ul>
						<li><a href="<?= __DIRUP__."{$agt[$i]['slug']}" ?>"><?= "{$agt[$i]['name']}" ?></a></li>
					</ul>
					<?php } } } ?>
				</div>
				<div class="column help">
					<h2>Information</h2>
					<ul>
						<li>contacté : contact@sokanes.ga</li>
						<li>support : support@sokanes.ga</li>
					</ul>
				</div>
				<div class="column help">
					<h2>Réseaux</h2>
					<ul>
						<li><a href="https://discord.gg/Bgh87YGrKY">Sokanès l'officiel</a></li>
					</ul>
				</div>
			</div>
			<div class="footer-foot">
				<h4>Contactez nous à contact@sokanes.ga</h4>
			</div>
		</section>
	</footer>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>