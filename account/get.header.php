<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $GLOBALS['USER']->getUsername ?> - Paramètres</title>

	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/css/root.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?>account/styles.css">

	<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
</head>
<body>
		
	<section id="main">
		<header>
			<nav>
				<div class="menu-syst">
					
					<div class="header-nav">
						<span class="name">
							<?= $GLOBALS['USER']->getTypeUser($userType, 'name') ?>
						</span>
					</div>
					<div class="content-nav">
						<ul>
							
							<?php
							for($i=0;$i<count($menu);$i++)
							{
								if(isset($menu[$i]['menu']) && count($menu[$i]['menu']) != null)
								{
									echo "<span class=\"hr-text\">{$menu[$i]['name']}</span>";
									echo '<ul>';
									for($a=0;$a<count($menu[$i]['menu']);$a++)
									{
									if(isset($menu[$i]['menu'][$a]['sep']) && $menu[$i]['menu'][$a]['sep'] == true)
										echo '<span class="hr"></span>';
								?>
								<li>
									<a href="<?= __DIRUP__.'account/'."{$menu[$i]['menu'][$a]['link']}" ?>" id="<?php if(isset($menu[$i]['menu'][$a]['id']) && $menu[$i]['menu'][$a]['id'] == true) "{$menu[$i]['menu'][$a]['id']}" ?>">
										<span class="text"><?= "{$menu[$i]['menu'][$a]['name']}" ?></span>
										<span class="background"></span>
									</a>
								</li>
								<?php
									}
								}
								echo '</ul>';
							}
							?>

						</ul>
					</div>

				</div>
			</nav>
		</header>
		<main class="contenaire">
			<div id="AMAINUNIQUECSS">
