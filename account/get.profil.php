<?php
?>
<section class="profil-info">
	
	<div class="content-sect">
		<div class="body-sect">
			
			<section class="section-option-profil flex">
				
				<div class="profil-user flex">
					
					<div class="photo">

						<span class="img">
							H
						</span>
						
					</div>

					<div class="info">
						
						<span class="username litle-text"><?= "{$GLOBALS['USER']->getUsername}"; ?></span>
						<span class="mail text"><b><?= "{$GLOBALS['USER']->getMail}"; ?></b></span>
						<span class="button a"><?= "{$GLOBALS['USER']->getTypeUser($GLOBALS['USER']->getType, 'name')}"; ?></span>

					</div>

				</div>

				<div class="profil-option flex">
					
					<div class="menu-buttons">
						
						<button class="sign-out">Sign Out</button>

					</div>

				</div>

			</section>

		</div>
		<div class="footer-sect"></div>

	</div>

</section>

<section class="profil-setting">
	
	<div class="content-sect">
		
		<div class="header-sect">
			
			<div class="name">
				<span class="h1">Porfil</span>
			</div>

		</div>
		<div class="body-sect">
			
			<section class="tablet content-post">
				
				<div class="ht">
					
					<div class="unit-header">
						
						<div class="text">
							<span>Username</span>
						</div>

					</div>
					<div class="unit-content">
						
						<div class="text">
							<span class="text">
								<?= "{$GLOBALS['USER']->getUsername}" ?>
							</span>
						</div>

					</div>
					<div class="unit-option">
						<button>Edité</button>
					</div>
				</div>

				<span class="hr"></span>

				<div class="ht">
					
					<div class="unit-header">
						
						<div class="text">
							<span>Adress Electronic</span>
						</div>

					</div>
					<div class="unit-content">
						
						<div class="text">
							<span class="text">
								<?= "{$GLOBALS['USER']->getMail}" ?>
							</span>
						</div>

					</div>
					<div class="unit-option">
						<button>Edité</button>
					</div>
				</div>

				<span class="hr"></span>

				<div class="ht">
					
					<div class="unit-header">
						
						<div class="text">
							<span>Mot de passe</span>
						</div>

					</div>
					<div class="unit-content">
						
						<div class="text">
							<span class="text password">
								<?= "{$GLOBALS['USER']->getPassword}" ?>
							</span>
						</div>

					</div>
					<div class="unit-option">
						<button>Edité</button>
					</div>
				</div>

				<span class="hr"></span>

			</section>

		</div>
		<div class="footer-sect"></div>

	</div>

</section>