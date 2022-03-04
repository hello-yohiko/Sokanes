<!DOCTYPE html>
<html>
<head>
	<!-- Google Analytics -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-XXXXX-Y', 'auto');
	ga('send', 'pageview');
	</script>
	<meta name="google-site-verification" content="VPtqUabCRbKw3J-_RRvC7d-WWa1RXrsVFWiXHMmVn6w" />
	<!-- END Google Analytics -->

	<!-- start api -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- end api -->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $GLOBALS['PAGER']->MetaTITLE ?></title>

	<link rel="icon" type="image/png" href="<?= __DIRUP__ ?>favicon.png" />

	<!-- TWITTER EMDED -->
	<meta property="og:keywords" content="<?= $GLOBALS['PAGER']->MetaKEY ?>">
	<meta property="twitter:card" content="summary_large_image" />
	<meta property="og:type" content="actualite">
    <meta property="og:site_name" content="sokanès">
    <meta property="og:title" content="<?= $GLOBALS['PAGER']->MetaTITLE ?>">
    <meta property="og:description" content="<?= $GLOBALS['PAGER']->MetaSUBTITLE ?>">
    <meta property="og:image" content="<?= $GLOBALS['PAGER']->MetaIMAGE ?>">
    <meta property="twitter:image" content="<?= $GLOBALS['PAGER']->MetaIMAGE ?>">
    <!-- END TWITER EMBED -->


	<!-- tehmes css-->
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/plug/css/root.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/plug/css/screen.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/plug/css/main.css">

	<script type="text/javascript">
    	let config = 
		{
			"main": {
				"user": "<?= $_COOKIE['user_ID_to_connect'] ?>",
				"channel": ""
			}
		}
    </script>
</head>
<body>
	<header>
		<div class="menu">
			<ul>
				<li><a href="">< Return WebSite</a></li>
			</ul>
		</div>

		<section class="content-thread">
			
			<div class="content-thrad-aligned">
				
				<div class="header">

					<div class="form-sreach">
						
						<form method="get">
							<div class="block-input">
								<input type="text" name="q" placeholder="Search Thread">
							</div>
						</form>

					</div>
					
					<div class="information">
						
						<div class="content-inf">
							
							<span class="title">
								Vos THREAD
							</span>

						</div>

					</div>

				</div>

				<div class="content">
					
					<div class="while">
						<ul>
							<?php
							for($i = 0; $i < 8; $i++)
							{
							?>
							<li>
								<a href="#">
									<div class="li-content">
										Je suis un titre / <?= $i * 8 ?>
									</div>
								</a>
							</li>
							<?php
							}
							?>
						</ul>

					</div>

				</div>

			</div>

		</section>
	</header>
	<main>
		<nav>
			<div class="content-nav">
				
				<div class="left-cont">
					
					<div class="icone">
						
						<ion-icon class="icone-element" name="layers"></ion-icon>

					</div>

				</div>
				<div class="center-cont">
					
					<div class="information-channel">
						

						<span class="title">
							Liste des Thread Populaire
						</span>

					</div>

				</div>
				<div class="right-cont"></div>

			</div>
		</nav>
		<section class="body">