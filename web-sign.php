<?php
# recupérre le foncionnement systèmes
include_once "header.php";

$getRegVal = true;
$getTitlePage = "Inscription";
if(isset($_GET['act']) && $_GET['act'] == "login")
{
	$getRegVal = false;
	$getTitlePage = "Connéction";
}
$envi = [
	"count" => 0,
	"data" => [
		"error_msg" => ""
	]
];

if(
	(isset($_POST['subForm'])) // principale
	&&
	(
		(!empty($_POST['mailUserForm']))
		&&
		(!empty($_POST['passwordUserForm']))
	)
)
{
	$upMail = htmlspecialchars($_POST['mailUserForm']);
	$Password = htmlspecialchars($_POST['passwordUserForm']);
	$upPassword = sha1($Password);

	if((filter_var($upMail, FILTER_VALIDATE_EMAIL)))
	{
		if(
			strlen($Password) >= 3
		)
		{
			echo strlen($Password);
			if(
				(!empty($_POST['twopasswordUserForm']))
				&& 
				(!empty($_POST['usernameUserForm']))
				&&
				($getRegVal == true)
			)
			{
				// inscription detection
				$upUsername = htmlspecialchars($_POST['usernameUserForm']);
				$upTwoPassword = sha1($_POST['twopasswordUserForm']);

				if($upTwoPassword == $upPassword)
				{
					$envi['count'] += 1;
					$envi['data']['error_msg'] = "";

					$aa = $GLOBALS['SQL']->_getPrepare('SELECT mail_ FROM fl_user WHERE mail_ = ?', "s", [$upMail]);
					if(count($aa['data']) == null)
					{
						$envi['count'] += 1;
						$envi['data']['error_msg'] = "";

						$number = RandCaract(12, "_number_");
						$token = RandCaract(24, "").'_'.$number;
						$val_ = htmlspecialchars(json_encode(array("mail" => true, "type" => 0)));


						$GLOBALS['SQL']->execute_sql(
							"INSERT INTO fl_user(token_, number_, username, password, mail_, date_, val_) VALUES(?, ?, ?, ?, ?, Now(), ?)",
							"ssssss",
							[$token, $number, $upUsername, $upPassword, $upMail, $val_]
						);

						$cook = $token . "/" . sha1($number);

				        $envi['bool'] = true;
					}
					else
					{
						$envi['data']['error_msg'] = "L'adresse mail existe déjà !";
					}
				}
				else
				{
					$envi['data']['error_msg'] = "Les mot de passe ne coresponde pas";
				}
			}
			elseif(($getRegVal == true))
			{
				$envi['data']['error_msg'] = "Les champs ne sont pas renseigner";
			}
			elseif (($getRegVal == false)) {
				$aa = $GLOBALS['SQL']->_getPrepare('SELECT * FROM fl_user WHERE mail_ = ? AND password = ?', "ss", [$upMail,$upPassword]);
				if(isset($aa['data']) && count($aa['data']) == 1)
				{
			        $a = $aa['data'][0];
			        $b = json_decode(htmlspecialchars_decode($a['val_']), true);

			        $cook = $a['token_'] . "/" . sha1($a['number_']);
			        $envi['bool'] = true;

			        if($b['type'] >= 1)
				        $envi['admin'] = true;
			    }
			    else
			    {
			       	$envi['data']['error_msg'] = "la compte n'existe pas ";
			    }
			}

			if($envi['bool'] = true && isset($cook))
			{
				echo "ok";
				$_SESSION['user_ID_to_connect'] = $cook;
		        setcookie("user_ID_to_connect", $cook, time() + 3600 * 24 * 31, "/", USE_COOK, false, true);
		        echo '<script language="Javascript">document.location.replace("'.__DIRUP__.'");</script>';
			}
		}
		else
		{
			$envi['data']['error_msg'] = "Le mot de passe doit etre plus grand que 3 characters";
		}
	}
	else
	{
		$envi['data']['error_msg'] = "L'adresse mail n'est pas valide";
	}
}

function CheckData(string $txt, $regex)
{
	if(preg_match($regex, $txt, $params))
	{
		return true;
	}

	return false;
}


function RandCaract($length, $a)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($a == "_number_")
        $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $getTitlePage ?></title>
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?><?= DIR_TEMPS . _TEMPLATE_ ?>/css/root.css">
	<link rel="stylesheet" type="text/css" href="<?= __DIRUP__ ?>a.css">

	<!-- TWITTER EMDED -->
	<meta property="og:keywords" content="Informatique, blog, news, information">
	<meta property="twitter:card" content="summary_large_image" />
	<meta property="og:type" content="actualite">
    <meta property="og:site_name" content="sokanès">
    <meta property="og:title" content="L'information en neutres, Nous formons le Future de demain">
    <meta property="og:description" content="sokanès, C'est Vous notre futur">
    <meta property="og:image" content="https://panel.sokanes.ga/ban.png">
    <meta property="twitter:image" content="https://panel.sokanes.ga/ban.png">
    <!-- END TWITER EMBED -->
</head>
<body>
	<main class="page">
		
		<div class="sign-section contenaire">

			<div class="left-cont">
				
				<div class="form-aligned flex">

					<div class="header">
						
						<div class="logo-place">
							<span class="img" style="background-image: url('https://media.discordapp.net/attachments/819669124010868797/936190635130630204/logo_white_large.png?width=1025&height=223');"></span>
						</div>

						<p>
							<?php if(isset($envi['data']['error_msg']) && $envi['data']['error_msg'] != "") { echo $envi['data']['error_msg']; } ?>
						</p>

					</div>
					
					<form method="post">

						<?php if($getRegVal) { ?>
						<div class="input-contenaire">
							<label>Username</label>
							<div class="input-block">
								<input type="text" name="usernameUserForm">
							</div>
							<p>Un nom d'utilisateur est important ! il vous permet d'étres different et d'étres mentionner.</p>
						</div>
						<?php } ?>
						<div class="input-contenaire">
							<label>Mail</label>
							<div class="input-block">
								<input type="email" name="mailUserForm">
							</div>
							<?php if($getRegVal) { ?>
							<p>Très utile si vous perder votre compte :)</p>
							<?php } ?>
						</div>
						<div class="input-contenaire <?php if($getRegVal) { echo "horiz"; } ?>">
							<label>PassWord</label>
							<div class="input-block">
								<input type="password" name="passwordUserForm">
							</div>
						</div>
						<?php if($getRegVal) { ?>
						<div class="input-contenaire <?php if($getRegVal) { echo "horiz"; } ?>">
							<label>Confirm. PassWord</label>
							<div class="input-block">
								<input type="password" name="twopasswordUserForm">
							</div>
						</div>
						<?php } ?>

						<div class="input-contenaire">
							<div class="input-form submit">
								<div class="cont">
									<button type="submit" name="subForm">Continuer</button>
								</div>
								<div class="cont">
									<div>
										<label>En continuant, Vous accepter nos condition.</label>
										<br>
										<?php if($getRegVal) { ?>

										<label>Vous avez déjà un compte ? <a href="?act=login">Me connecter</a></label>
										<?php } else { ?>
											<label><a href="?act=register">M'inscrire</a></label>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						
					</form>

					<div class="footer">
						
						<p>
							Nous ne stokons auccune information que vous nous avez pas demandé.
							<br>
							<br>
							Nous ne sommes pas responsable de vos donner de connéction et ce que vous entrez dans les champs à votre disposition sur le site.
						</p>

					</div>

				</div>

			</div>
			<!--<div class="right-cont back">
				<div class="background">
					
					<span class="img" style="background-image: url(https://wallpaperaccess.com/full/6664444.jpg);"></span>

				</div>
			</div>-->
			
		</div>

	</main>
</body>
</html>