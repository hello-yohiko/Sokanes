<?php
$pager = "post_liste";
if(isset($READ_URL_TAB[1]) && $READ_URL_TAB[1] != "")
{
	$edit = true;
}

if(isset($edit) && $edit == true)
{
	$pager = "edit_post";

	$add = [
				"post_title" => "",
				"post_subTitle" => "",
				"post_content" => "",
				"post_date" => "",
				"post_author" => "",
				"post_name" => "",
				"post_type" => [
					"name" => "non classé",
					"slug" => "non-classe",
					"term_group" => -1
				],
				"post_min" => __UND_UPLOAD__,
			];

	$qeury = "SELECT * FROM fl_posts WHERE post_name = ? ORDER BY ID DESC";
	if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "s", [$READ_URL_TAB[1]]))
	{
		die("echec");
	}

	//var_dump($data['data'][0]);
	$reqDataart = $data['data'][0];
	$reqDataart['json'] = json_decode(htmlspecialchars_decode($reqDataart['post_content']), true);

	if(!$reqDataart)
		die('couper');

	$edit = new __EDIT__($reqDataart['ID']);

	if(isset($reqDataart['json']['title']) && $reqDataart['json']['title'] != "")
		$add['post_title'] = $reqDataart['json']['title'];

	if(isset($reqDataart['json']['desc']) && $reqDataart['json']['desc'] != "")
	    $add['post_subTitle'] = $reqDataart['json']['desc'];

	if(isset($reqDataart['json']['content']) && $reqDataart['json']['content'] != "")
	    $add['post_content'] = $reqDataart['json']['content'];

	if(isset($reqDataart['post_date']) && $reqDataart['post_date'] != "")
	    $add['post_date'] = $reqDataart['post_date'];

	if(isset($reqDataart['post_author']) && $reqDataart['post_author'] != "")
	    $add['post_author'] = $GLOBALS['SQL']->dataUser($reqDataart['post_author'], "username");

	if(isset($reqDataart['post_name']) && $reqDataart['post_name'] != "")
	    $add['post_name'] = $reqDataart['post_name'];

	echo $reqDataart['post_name'];

	if(isset($reqDataart['post_type']) && $reqDataart['post_type'] != "")
	    $add['post_type'] = $GLOBALS['SQL']->PostMetas($reqDataart['post_type'])[1];

	     	
	if(isset($reqDataart['json']['min']) && $reqDataart['json']['min'] != "")
	{
	    $add['post_min'] = __UPLOAD__.$reqDataart['json']['min'];
	    $edit->setPostImage(htmlspecialchars($reqDataart['json']['min']));
	}

	$dataEditor = $add;
}

$tabInfCat = $GLOBALS['SQL']->PostMetas();

$getUserAct = [
	"all" => false,
	"title" => true,
	"subTitle" => true,
	"content" => true,
	"min" => true,
	"type" => true
];

switch($userType)
{
	case 5:
		$getUserAct['min'] = false;
		$getUserAct['type'] = false;
		break;

	case 7:
		$getUserAct['title'] = false;
		$getUserAct['subTitle'] = false;
		$getUserAct['content'] = false;
		$getUserAct['min'] = false;
		break;

	default:
		$getUserAct['all'] = true;
}

if(isset($getUserAct['all']) && $getUserAct['all'] == true && $userType != 8)
{
	$getUserAct['title'] = false;
	$getUserAct['subTitle'] = false;
	$getUserAct['content'] = false;
	$getUserAct['min'] = false;
	$getUserAct['type'] = false;
	echo "cette accé ne vous est pas autorisé;";
}
else
{
	$getUserAct['all'] = false;
}



if(isset($_POST['submit']))
{
	if(
		!empty($_POST['title'])
	)
	{
		$edit->setTitle(htmlspecialchars($_POST['title']));
	}

	if(!empty($_POST['subtitle']))
	{
		$edit->setSubtitle(htmlspecialchars($_POST['subtitle']));
	}

	if(!empty($_POST['content']))
	{
		$edit->setContent(htmlspecialchars($_POST['content']));
	}

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
			   $tailleMax = 2097152;
			   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
			   if($_FILES['avatar']['size'] <= $tailleMax) {
			      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
			      if(in_array($extensionUpload, $extensionsValides)) {
			         $chemin = "use/files/img/post/min-".$USER->getNumber."-".$reqDataart['post_name'].".".$extensionUpload;
			         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
			         if($resultat) {
			            $min = "min-".$USER->getNumber."-".$reqDataart['post_name'].".".$extensionUpload;
			            $edit->setPostImage(htmlspecialchars($min));
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

	$edit->UpdateSQL();
}



function getPostArchives()
{
	global $GLOBALS;
	global $READ_URL_TAB;

	$depart = 0;
	$endListeNumberView = 10; // nombre d'element à afficher !
	$getPostCat = "";

	$getPagNumber = 0;
	if(isset($READ_URL_TAB[2]) && $READ_URL_TAB[2] > 0)
	{
		$getPagNumber = $READ_URL_TAB[2];
	}



	$qeury = "SELECT * FROM fl_posts WHERE post_type != ? ORDER BY ID DESC";
	if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "s", [$getPostCat]))
	{
		die("echec");
	}

	// calcule des page
	$videosTotales = count($data['data']);
	$pagesTotales = ceil($videosTotales/$endListeNumberView);

	if(isset($getPagNumber) AND !empty($getPagNumber) AND $getPagNumber > 0 AND $getPagNumber <= $pagesTotales) {
	   $getPagNumber = intval($getPagNumber);
	   $pageCourante = $getPagNumber;
	} else {
	   $pageCourante = 1;
	}

	$depart = ($pageCourante-1)*$endListeNumberView;

	$a = 0;
	$dataTransFere = [
		"data" => [],
		"page" => [
			"page_list_start" => $depart,
			"page_list_current" => $pageCourante,
			"page_list_end" => $pagesTotales
		]
	];
	for($i = $depart; $i < $videosTotales;$i++)
	{
		$a += 1;
		if($a >= $endListeNumberView+1)
			break;

		$getImp = $data['data'][$i];
      $getImp['o'] = json_decode(htmlspecialchars_decode($getImp['post_content']), true);

      if(isset($getImp['o']))
      {
			get($i);
			$add = [
				"post_title" => "",
				"post_subTitle" => "",
				"post_content" => "",
				"post_date" => "",
				"post_author" => "",
				"post_name" => "",
				"post_type" => "",
				"post_min" => __UND_UPLOAD__,
			];

			if(isset($getImp['o']['title']) && $getImp['o']['title'] != "")
	         $add['post_title'] = $getImp['o']['title'];

	      if(isset($getImp['o']['desc']) && $getImp['o']['desc'] != "")
	         $add['post_subTitle'] = $getImp['o']['desc'];

	      if(isset($getImp['o']['content']) && $getImp['o']['content'] != "")
	         $add['post_content'] = $getImp['o']['content'];

	      if(isset($getImp['post_date']) && $getImp['post_date'] != "")
	         $add['post_date'] = $getImp['post_date'];

	      if(isset($getImp['post_author']) && $getImp['post_author'] != "")
	         $add['post_author'] = $GLOBALS['SQL']->dataUser($getImp['post_author'], "username");

	      if(isset($getImp['post_name']) && $getImp['post_name'] != "")
	         $add['post_name'] = $getImp['post_name'];

	      if(isset($getImp['post_type']) && $getImp['post_type'] != "")
	         $add['post_type'] = $GLOBALS['SQL']->PostMetas($getImp['post_type']);

	     	
	      if(isset($getImp['o']['min']) && $getImp['o']['min'] != "")
	         $add['post_min'] = __UPLOAD__.$getImp['o']['min'];

      	array_push($dataTransFere['data'], $add);
      }

	}

	return $dataTransFere;
}

if(isset($getUserAct['all']) && $getUserAct['all'] == false)
{
	include_once "use/html.{$pager}.php";
}
?>