<?php
include_once "../header.php";

$getDATA = $_GET;

$jsonReturn = [
	"access" => false,
	"user" => [
	],
	"log" => []
];

function logADD($act, $txt)
{
	global $jsonReturn;
	array_push($jsonReturn['log'], ["action" => $act, $txt]);
}

if(
	isset($getDATA['user_api'])
	&&
	isset($getDATA['post_id'])
)
{
	//var_dump($GLOBALS);

	$post_id = htmlspecialchars($getDATA['post_id']);

	$userDATA = $GLOBALS['USER'];
	$jsonReturn['user']['type'] = $userDATA->getTypeUser($userDATA->getType, 'name');

	echo $userDATA->getType;

	if($userDATA->getType == 8)
	{
		logADD('Success', "Utilisateur autorisé à utilisé cette action dans l'API");
		$jsonReturn['access'] = true;

		if($post_id != "")
		{
			logADD('Success', "ID_POST est bien remplit");

			if(
				$getPostInf = $GLOBALS['SQL']->PostView($post_id))
			{
				logADD('Success', "Lecture POST Réussis");

				if(count($getPostInf) == 1)
				{

					logADD('Success', "ID_POST est bien est un POST valide");

					var_dump($getPostInf);
				}
				else
				{
					logADD('Success', "ID_POST n'est pas un POST valide");
				}
			}
			else
			{
				logADD('Success', "Lecture POST à échoué");
			}
		}
		else
		{
			logADD('Success', "ID_POST n'est pas remplit");
		}
	}
	else
	{
		logADD('Echec', "Utilisateur non autorisé à utilisé cette action dans l'API");
	}

}

echo json_encode($jsonReturn);
?>