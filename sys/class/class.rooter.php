<?php
class __root_racine__
{
	private $getTok; // clé de recuperration de data $_GET[$getTok];

	public $getPage;
	public $pageGET;

	// -- constructeru --

	function __construct(string $Get = "NO")
	{
		$this->getTok = $Get;
	}

	// function

	function __GETrooter()
	{
		global $GLOBALS;
		$this->getPage = "home";
		$get09 = ""; // name temp | initialisation de la variable de contenu $_GET
		if(
			isset($_GET[$this->getTok]) 
			&&
			$_GET[$this->getTok] != ""
		)
		{
			$this->getPage = "home"; // initialisation de la valeur de retour
			$tans = htmlentities($_GET[$this->getTok]); // name temp

			/*
			 * separration de l'url à partire du "/"
			 * pour réalisé un tableau
			 *
			 *
			 */
			if($READ_URL_TAB = explode("/", $tans)) // transforme l'url en tableau
			{
				// action si le tableau existe


				if($this->getPlug($READ_URL_TAB[0]))
				{
					$this->getPage = $GLOBALS['PLUG']->pageS();
					$this->pageGET = $READ_URL_TAB;
				}
				elseif($READ_URL_TAB[0] == "user" && $GLOBALS['USER']->pageS($READ_URL_TAB[1]))
				{
					$this->getPage = "user";
				}
				else
				{
					// temp
					$GLOBALS['PAGER']->setGet($READ_URL_TAB);
					$this->getPage = $GLOBALS['PAGER']->pageS();
					// temp
				}

			}
			else
			{
				//$this->getPage = "home";
			}

		}
		else
		{
			$this->getPage = "home";
		}

		include_once dirname(__FILE__) . "/../get.".$this->getPage.".php";

		return false;
	}



	public function getPlug(string $str)
	{
		if($str == "thread")
		{
			return true;
		}
		return false;
	}

	// set AND get
}