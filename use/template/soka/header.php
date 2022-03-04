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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
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

	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/css/root.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/css/frame.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/css/screen.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
	<section class="banner-information">
		


	</section>
	<nav class="destop-version naviguation-bar">
		<div class="contenaire">
			<div class="left-cont">
			    <img height="30" src="/<?= __DIRUP__ ?>/logo_small.png">
			</div>
			<div class="center-cont">
				<div class="menu-deroulant">
					<ul>
						<li><a href="<?= __DIRUP__ ?>" class="<?php if(isset($GLOBALS['ROOTER']->getPage) && $GLOBALS['ROOTER']->getPage == "home") { echo 'active'; } ?>">Home</a></li>
						<li><a href="<?= __DIRUP__ ?>general/" class="<?php if(isset($GLOBALS['ROOTER']->getPage) && $GLOBALS['ROOTER']->getPage == "archives") { echo 'active'; } ?>"><?php if(isset($GLOBALS['PAGER']->catName) && $GLOBALS['PAGER']->catName != "") { echo $GLOBALS['PAGER']->catName ; } else { echo "Publications"; } ?></a></li>
					</ul>
				</div>
			</div>
			<div class="right-cont">
				<?php if(isset($GLOBALS['USER']->getNumber) && $GLOBALS['USER']->getNumber != "") { ?>
				<a href="<?= __DIRUP__ ?>account/">
					<span class="btn-po">
						Mon Compte
					</span>
				</a>
				<?php
				} else {
				?>
				<a href="<?= __DIRUP__ ?>web-sign.php">
					<span class="btn-po">
						Espace Membre
					</span>
				</a>
				<?php
				}
				?>
			</div>
		</div>
	</nav>
	<nav class="mobile-version naviguation-bar">
		<div class="contenaire">
			
			<div class="left-cont"></div>
			<div class="right-cont">
				
				<div class="menu-deroulant">
					<ul>
						<li>
							<a href="<?= __DIRUP__ ?>" class="<?php if(isset($GLOBALS['ROOTER']->getPage) && $GLOBALS['ROOTER']->getPage == "home") { echo 'active'; } ?>">Home</a>
						</li>
						<li>
							<a href="<?= __DIRUP__ ?>general/" class="<?php if(isset($GLOBALS['ROOTER']->getPage) && $GLOBALS['ROOTER']->getPage == "archives") { echo 'active'; } ?>"><?php if(isset($GLOBALS['PAGER']->catName) && $GLOBALS['PAGER']->catName != "") { echo $GLOBALS['PAGER']->catName ; } else { echo "Publications"; } ?></a>
						</li>
					</ul>
				</div>

			</div>

		</div>
	</nav>