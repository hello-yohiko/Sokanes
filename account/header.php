<?php
include_once "../header.php";

include_once "use/class.edit.php";

if($GLOBALS['USER']->User == false || $GLOBALS['USER']->User == null)
    die();

$menu = [
	[
		"name" => "Paramètres Utilisateur",
		"id" => "PU",
		"menu" => [
			[
				"name" => "Mon compte",
				"icon" => "",
				"link" => "",
				"class" => "",
				"id" => ""
			]
		]
	],
	[
		"name" => "publication",
		"id" => "post",
		"menu" => [

		]
	],
	[
		"name" => "administrateur",
		"id" => "ADMIN",
		"menu" => [
		]
	],
	[
		"name" => "Paramètres Activité",
		"menu" => [
			/* [
				"name" => "Mes données",
				"icon" => "",
				"link" => "",
				"class" => "",
				"id" => "signout"
			], */
			[
				"name" => "Log Out",
				"icon" => "",
				"link" => "../sign-out.php",
				"class" => "",
				"id" => "signout"
			]
		]
	]
];

$userData = $GLOBALS['USER'];
$userType = $userData->getType;
getAct($userType);

function push_menu(array $data = [], string $name = "")
{
	global $menu;

	for($i=0;$i<count($menu);$i++)
	{
		$id = array_search($name, $menu[$i]);
		if($id != null)
		{
			break;
		}
	}

	array_push($menu[$i]['menu'], $data);
}

function getAct(int $int)
{
	global $menu;

	if(
		(!$convertInt = intval($int))
		&&
		($int != 0)
	)
	{
		die('echec'.$int);
	}

	// ajout des menu
	if(
		($int >= 0)
	)
	{
		push_menu([
			"name" => "Profil d'utilisateur",
			"link" => "user"
		], "PU");

		push_menu([
			"name" => "Paramétre de compte",
			"link" => "setting"
		], "PU");
	}

	if(
		($int == 4)
	)
	{
		push_menu([
			"name" => "Chat Privée",
			"link" => "messages"
		], "ADMIN");
	}

	if(
		($int >= 5 && $int <= 8)
	)
	{
		push_menu([
			"name" => "Liste publication",
			"link" => "edit_post"
		], "post");
	}

	return [
		"ID" => 0,
		"name" => "",
		"menu" => $menu
	];
}

//die();

if(isset($getUserAct['all']) && $getUserAct['all'] == true)
{
}

?>