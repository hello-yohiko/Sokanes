<?php
$tabInfCat = $GLOBALS['SQL']->PostMetas();

$getUserAct = [
	"all" => false,
	"title" => true,
	"subTitle" => true,
	"content" => true,
	"min" => true,
	"type" => true
];

if(isset($_POST['submit']))
{
	$GLOBALS['EDIT'] = new __EDIT__('');

	$error = "envoyé !";
	if(
		!empty($_POST['title'])
		&&
		!empty($_POST['subtitle'])
		&&
		!empty($_POST['content'])
	)
	{
		$error = "3 champs envoyé !";
		$title = htmlspecialchars($_POST['title']);
		$desc = htmlspecialchars($_POST['subtitle']);
		$content = htmlspecialchars($_POST['content'])
		;

		/* verification des option ! */
		if(
			isset($_POST['type'])
		)
		{
			$type = htmlspecialchars($_POST['type']);
			$number = generateId();
			$min = "";

			$valType = $type;

			if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
			   $tailleMax = 2097152;
			   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
			   if($_FILES['avatar']['size'] <= $tailleMax) {
			      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			      if(in_array($extensionUpload, $extensionsValides)) {
			         $chemin = "use/files/img/post/min-".$USER->getNumber."-".$number.".".$extensionUpload;
			         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
			         if($resultat) {
			            $min = "min-".$USER->getNumber."-".$number.".".$extensionUpload;
			         } else {
			            $msg = "Erreur durant l'importation de votre photo de profil";
			         }
			      } else {
			         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
			      }
			   } else {
			      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
			   }
			}

			$GLOBALS['EDIT']->setTitle($title);
			$GLOBALS['EDIT']->setSubTitle($desc);
			$GLOBALS['EDIT']->setContent($content);
			$GLOBALS['EDIT']->setPostName($number);
			$GLOBALS['EDIT']->setPostType($type);
			$GLOBALS['EDIT']->setPostImage($min);

			var_dump($GLOBALS['EDIT']);

			$GLOBALS['EDIT']->CreateSQL();


			$error = "3 option envoyé !";
		}
		else
		{
			$error = "Les option ne sont pas remplit !";
		}
	}
	else
	{
		$error = "Imposible d'envoyer le POSTs 132";
	}
}


include_once "use/html.edit_post.php";

function generateId()
{
	global $dataThis;

	$num = RandCaract(30, "_number_");
	$baba = $GLOBALS['SQL']->_getPrepare('SELECT post_name FROM fl_posts WHERE post_name = ?', "s", [$num]);
	if(isset($baba['data']) && count($baba['data']) == 0)
	{
		return $num.count($baba['data']);
	}

	return $num;
}

function RandCaract($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>