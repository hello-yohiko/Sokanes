<section class="user-profil-contenaire">
	<div class="content-sect">
		<section class="header-profil">
			
			<div class="flex">
				
				<div class="photo-user">
					<span class="img" style="background-image: url(<?= $GLOBALS['USER']->getAvatar ?>);"></span>
				</div>

				<div class="text-user">
					
					<div class="princ">
						<span class="username">
							<?= $GLOBALS['USER']->getUsername ?>
						</span>
						<span class="number-compte">
							ID: <?= $GLOBALS['USER']->getNumber ?>
						</span>
					</div>

				</div>

			</div>

		</section>
		<section class="content-profil">

			<form method="post">

			<div class="info-user-perso">
				
				<div class="user-subuser-text">
					<textarea class="subuser" name="subUser"><?php if(isset($GLOBALS['USER']->dataJson['subUser'])) { echo $GLOBALS['USER']->dataJson['subUser']; } ?></textarea>
				</div>

				<div class="badge-user-list">

					<?php
						for($i=1;$i<11;$i++) {
					?>
					
					<div class="badge-elem">
						<span class="img" style="background-image: url(/0/account/use/files/assets/<?= $i ?>.png);"></span>
					</div>

					<?php
						}
					?>

				</div>

			</div>

				<input type="submit" name="submit">
			</form>
			
		</section>
	</div>
</section>