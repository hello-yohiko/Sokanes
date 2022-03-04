<section class="contenaire thread-plug">
	<div class="left-cont">
		<section class="width-thread-contenaire banner-info thread">
			<div class="content-banner">
				<div class="information">
					<h1>Partagé vos connaissance et aidez.</h1>
					<p>Ce que vous savez nous ais utile à tous</p>
				</div>
			</div>
		</section>
		<section class="width-thread-contenaire listen" id="topthread">
			<div class="list-content">
				<div class="list-header">
					
					<div class="title-list">
						<span class="title">
							TOP Thread
						</span>
					</div>

				</div>
				<div class="list-body">
					
					<div class="while thread-content">
						
						<?php
						for($i = 0; $i < count($data['data']); $i++)
						{
							$a = $data['data'][$i];

							$qeury = "SELECT * FROM plug_thread WHERE th_type = ?";
							$zey = $GLOBALS['SQL']->_getPrepare($qeury, "s", [$a['term']]);
						?>
						<div class="element list-cat-thread">
							<div class="header">
								
								<div>
									<div class="name-count">
										
										<span class="name"><?= $a['name'] ?></span>

									</div>
								</div>

							</div>
							<div class="flex content">
								
								<div class="content-align">
									

									<div class="while">
										
										<?php
										for($zeI = 0; $zeI < count($zey['data']); $zeI++)
										{
											$b = $zey['data'][$zeI];
											$jsonB = json_decode(htmlspecialchars_decode($b['th_content']), true);

										?>
										<li><a href="thread/feeds/<?= $b['th_name'] ?>"><?= htmlentities($jsonB['name']) ?></a></li>
										<?php
										}
										?>

									</div>

								</div>

							</div>
						</div>
						<?php
						}
						?>

					</div>

				</div>
				<div class="list-footer"></div>
			</div>
			<div class="form-thread">
				
				<div class="content">
					
					<div class="header-cont"></div>
					<div class="body-cont">
						
						<form method="post">
							
							<div class="block-input text">
								<input type="text" name="subTitle">
							</div>
							<div class="block-input text">
								<input type="text" name="subSubTitle">
							</div>
							<div class="block-input textarea">
								<textarea name="subContent"></textarea>
							</div>
							<div class="block-input button">
								<input type="submit" name="subThread">
							</div>
						</form>

					</div>
					<div class="footer-cont"></div>

				</div>

			</div>
		</section>
	</div>
</section>