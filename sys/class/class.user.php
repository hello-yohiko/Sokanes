<?php

class __user__
{
	private $getTOKEN;

	public $getUsername;
	public $getMail;
	public $getNumber;
	public $getDate;
	public $getPassword;
	public $getType;
	public $getAvatar;

	public $dataJson;

	public $User;

	/* page data */
	public $pageGET_username;
	public $pageGET_date;
	public $pageGET_statut;

	function __construct()
	{
		$this->getTOKEN = "";
		$this->User = false;
		$this->getAvatar = "https://images-ext-2.discordapp.net/external/axtXOuAlerZ79zWbvUUwaj7zOqjT9ji7F_gdh1MBNQk/%3Fsize%3D1024/https/cdn.discordapp.com/avatars/808410615688986695/c60bc5eccb449ddf2f1d64599d4d4d8e.png?width=422&height=422";
		if(
			!empty($_COOKIE['user_ID_to_connect'])
		)
		{
			$this->getTOKEN = htmlspecialchars($_COOKIE['user_ID_to_connect']);
			if(!$this->convert_token())
			{
				echo '<a href="'.__DIRUP__.'/sign-out.php">Suprimer le TOKEN</a>';
				die('Echec execution de la fonction "CONVERT_TOKEN"');
			}
		}

		if(
			!empty($_GET['user_ID_to_connect'])
		)
		{
			$this->getTOKEN = htmlspecialchars($_COOKIE['user_ID_to_connect']);
			if(!$this->convert_token())
			{
				echo '<a href="'.__DIRUP__.'/sign-out.php">Suprimer le TOKEN</a>';
				die('Echec execution de la fonction "CONVERT_TOKEN"');
			}
		}

		if(
			!empty($_POST['user_ID_to_connect'])
		)
		{
			$this->getTOKEN = htmlspecialchars($_COOKIE['user_ID_to_connect']);
			if(!$this->convert_token())
			{
				echo '<a href="'.__DIRUP__.'/sign-out.php">Suprimer le TOKEN</a>';
				die('Echec execution de la fonction "CONVERT_TOKEN"');
			}
		}
	}

	private function convert_token()
	{
		global $GLOBALS;
		// detection du token
		if(
			isset($this->getTOKEN)
			&& $this->getTOKEN != ""

		)
		{

			if(preg_match('#([0-9a-zA-Z_]+)/([0-9a-zA-Z]+)#', $this->getTOKEN, $tabReturn))
  			{

  				$reqUserData = $GLOBALS['SQL']->_getPrepare(
  					"SELECT * FROM fl_user WHERE token_ = ?",
  					"s",
  					[$tabReturn[1]]
  				);
  				if(!$getUserData = $reqUserData['data'][0])
  				{
  					die("imposible de recuperré les donée lier au token");
  				}

  				if(!$val_Deg = json_decode(htmlspecialchars_decode($getUserData['val_']), true))
  				{
  					die("Imposible de recuperré les donée \"JSON_DECODE\"");
  				}

  				$this->User = true;

  				$this->getUsername = $getUserData['username'];
  				$this->getMail = $getUserData['mail_'];
  				$this->getDate = $getUserData['date_'];
  				$this->getNumber = $getUserData['number_'];
  				$this->getType = $val_Deg['type'];
  				$this->getPassword = a($getUserData['password']);


  				$this->dataJson = $val_Deg;


  				return true;

  			}
  			else
  			{
  				die("Imposible de recuperré les donée depuis le cookie");
  			}

		}
		else
		{
			die("error: token init / req");
		}

		return false;
	}

	public function getTypeUser(int $id = 0, string $val = "name")
	{
		$userGach  = [
			[
				"name" => "membres",
				"prefix" => "dd"
			],
			[
				"name" => "partenaire",
				"prefix" => "dd"
			],
			[
				"name" => "sponsors",
				"prefix" => "dd"
			],
			[
				"name" => "publicitaire",
				"prefix" => "dd"
			],
			[
				"name" => "bénévole",
				"prefix" => "dd"
			], 
			[
				"name" => "aide-rédacteur",
				"prefix" => "dd"
			], 
			[
				"name" => "rédacteur",
				"prefix" => "dd"
			], 
			[
				"name" => "modérateur",
				"prefix" => "dd"
			],
			[
				"name" => "administrateur",
				"prefix" => "dd"
			]
		];

		return $userGach[$id][$val];
	}


	public function pageS(string $str)
	{
		global $GLOBALS;

		if(
			$a = $GLOBALS['SQL']->_getPrepare(
				"SELECT * FROM fl_user WHERE number_ = ?",
				"s",
				[$str]
			)
		)
		{

			if(isset($a['data'][0]['number_']))
			{

				$po = $a['data'][0];

				$po = [
					"username" => nl2br($po['username']),
					"data_old" => upDate($po['date_']),
					0 => json_decode(htmlspecialchars_decode($po['val_']), true)
				];

				$this->pageGET_username = nl2br($po['username']);
				$this->pageGET_date = upDate($po['data_old']);

				if(isset($po[0]['subUser']))
					$this->pageGET_statut =$po[0]['subUser'];

				//var_dump($po);

				return true;

			}
		}

		return false;
	}


	// settings

	public function setUsername(string $str)
	{
		$this->getUsername = $str;

		return $GLOBALS['SQL']->_query_(
			"
			UPDATE fl_user
				SET username = '{$str}'
				WHERE number_ = '{$this->getNumber}'
			"
		);
	}

	public function setMail(string $str)
	{
		$this->getMail = $str;

		return $GLOBALS['SQL']->_query_(
			"
			UPDATE fl_user
				SET mail_ = '{$str}'
				WHERE number_ = '{$this->getNumber}'
			"
		);
	}

	public function setSubUser(string $str)
	{
		global $GLOBALS;
		$this->dataJson['subUser'] = $str;

		$vl = json_encode($this->dataJson);

		return $GLOBALS['SQL']->execute_sql(
			"
			UPDATE fl_user
				SET val_ = ?
				WHERE number_ = ?
			",
			"ss",
			[$vl, $this->getNumber]
		);
	}
}

function a($str)
{
	$op = strlen($str);
	if($op >= 14)
		$op = 14;

	$a = "";
	for($i=0;$i<$op;$i++)
	{
		$a .= "•";
	}

	return $a;
}