<?php
$pageDataFeeds = [
	"feeds_author" => "",
	"feeds_title" => "",
	"feeds_content" => "",
	"reponse" => [

	]
];

$return = false;
if(!empty($getSYS[1]) && $getSYS[1] != "")
{
	$getSYSType = $getSYS[1];
	if($getSYSType == "feeds")
	{
		
		if(!empty($getSYS[2]))
		{
			$g = htmlentities($getSYS[2]);
			$gt = getThreadFeeds($g);

			$pageDataFeeds['feeds_author'] = $gt['th_author'];
			$pageDataFeeds['feeds_title'] = $gt['th_content']['name'];
			$pageDataFeeds['feeds_content'] = $gt['th_content']['text'];

			$return = $pageDataFeeds;
		}


	}
}

if(isset($_POST['subThread']))
{

	if(
		!empty($_POST['subTitle'])
		&&
		!empty($_POST['subContent'])
	)
	{

		$name = htmlentities($_POST['subTitle']);
		$text = htmlentities($_POST['subContent']);
		$idANDlink = RandCaract(12, "");
		echo $idANDlink;
		$count = 0;
		$json = htmlspecialchars(json_encode([
			"name" => $name,
			"text" => $text
		]));

		$req = "INSERT INTO plug_thread(th_author, th_name, th_content, th_vis, th_date) VALUES(?, ?, ?, ?, Now())";
		$data = [$GLOBALS['USER']->getNumber, $idANDlink, $json, $count];
		$past = "ssss";

		echo $json;

		if(!$GLOBALS['SQL']->execute_sql(
			"INSERT INTO 
			plug_thread
			(th_author, th_name, th_content, th_vis, th_date) 
			VALUES
			(?, ?, ?, 0, now() )",

			"sss",
			[$GLOBALS['USER']->getNumber, $idANDlink, $json]
		))
		{
			die('errro');
		}
		header("Refresh:1");

	}
	else
	{
		echo "error";
		die("\n actualisé");
	}
}



$qeury = "SELECT * FROM th_meta";
$data = $GLOBALS['SQL']->_getPrepare($qeury, "", []);

for($i = 0; $i < count($data['data']); $i++)
{
	$a = $data['data'][$i];

	$qeury = "SELECT * FROM plug_thread WHERE th_type = ?";
	$zey = $GLOBALS['SQL']->_getPrepare($qeury, "s", [$a['term']]);
}


_header_();
if($return)
	include_once dirname(__FILE__) . "/../../".DIR_TEMPS._TEMPLATE_."/plug/feeds.php";
else
	include_once dirname(__FILE__) . "/../../".DIR_TEMPS._TEMPLATE_."/plug/home.php";
_footer_();

?>