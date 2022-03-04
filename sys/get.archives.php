<?php

function getPostArchives()
{
	global $GLOBALS;

	$depart = 0;
	$endListeNumberView = 10; // nombre d'element à afficher !
	$getPostCat = $GLOBALS['PAGER']->catNum;

	$getPagNumber = 0;
	if(isset($GLOBALS['PAGER']->GetAct[2]) && $GLOBALS['PAGER']->GetAct[2] > 0)
		$getPagNumber = $GLOBALS['PAGER']->GetAct[2];



	$qeury = "SELECT * FROM fl_posts WHERE post_type = ? ORDER BY ID DESC";
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

$dataMO = getPostArchives();

$GLOBALS['PAGER']->upMetaTITLE("page {$dataMO['page']["page_list_current"]} sur {$dataMO['page']["page_list_end"]} de {$GLOBALS['PAGER']->catName}");
$GLOBALS['PAGER']->upMetaSUBTITLE("tes con");


include_once dirname(__FILE__) . "/../".DIR_TEMPS._TEMPLATE_."/archives.php";
?>