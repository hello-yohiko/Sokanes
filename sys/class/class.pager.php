<?php
class __pager__
{
	public $GetAct;
	public $MetaTITLE;
	public $MetaSUBTITLE;
	public $MetaKEY;
	public $MetaIMAGE;


	public $catNum;
	public $catName;

	function __construct()
	{
		$this->GetAct = [];
	}

	// -- func --
	public function pageS()
	{
		global $GLOBALS;

		if(
			isset($this->GetAct[0])
			&&
			$this->GetAct[0] != ""
		)
		{
			get("DATA Detect");
			$pageView = "error";
			$sql = "SELECT * FROM fl_postmeta WHERE slug = ?";
			if($fe = $GLOBALS['SQL']->_getPrepare($sql, "s", [$this->GetAct[0]]))
			{
				if(isset($fe['data'][0]))
				{
					get("Detected");

					$this->catNum = $fe['data'][0]['term_group'];
					$this->catName = $fe['data'][0]['name'];

					if(
						isset($this->GetAct[1])
						&&
						$this->GetAct[1] == "pages"
						&&
						isset($this->GetAct[2])
						&&
						$this->GetAct[2] >= 0
					)
					{
						get("Search Archives");

						// pageSearch();
						$pageView = "archives";
					}
					elseif(
						isset($this->GetAct[1])
						&&
						$this->GetAct[1] != ""
					)
					{
						get("Search Post...");
						$id = $this->GetAct[1];
						if($this->pagePoster($id))
							$pageView = "poster";
					}
					else
					{
						get("ALL Archives");
						if($this->pageArchives())
							$pageView = "archives";
					}
				}
				else
				{
					get("404 Page");
				}
			}

			return $pageView;
		}

		return false;
	}

	/*
	 *
	 *
	 *
	 *
	 */

	// poster view articles
	public function pagePoster(string $idPost)
	{
		$joinDATA = [
			"main" => [
				"return_bool" => 0 
			],
			"data" => [
			]
		];
		if(
			isset($idPost)
			&&
			$idPost != ""
		)
		{
			if(
				$getPostInf = $GLOBALS['SQL']->PostView($idPost)
			)
			{
					$joinDATA['data'] = $getPostInf[0];
					if(isset($joinDATA['data']['post_type']['term_group']) && $joinDATA['data']['post_type']['term_group'] != $this->catNum)
					{
						return false;
					}
					get("View Post");
					$this->MetaTITLE = $joinDATA['data']['post_title'];
					$this->MetaSUBTITLE = $joinDATA['data']['post_subTitle'];
					$this->MetaIMAGE = $joinDATA['data']['post_min'];

					$joinDATA['return_bool'] = 1;
			}
			else
			{
				get("404 View Post");
			}
		}
		$GLOBALS['pager'] = $joinDATA;
		return true;
	}

	public function pageArchives()
	{
		return true;
	}

	// -- tetf --
	public function setGet($str)
	{
		$this->GetAct = $str;
	}


	public function upMetaTITLE(string $str)
	{
		$this->MetaTITLE = $str;
	}

	public function upMetaSUBTITLE(string $str)
	{
		$this->MetaSUBTITLE = $str;
	}

	public function upMetaKEY(string $str)
	{
		$this->MetaKEY = $str;
	}

	public function upMetaIMAGE(string $str)
	{
		$this->MetaIMAGE = $str;
	}
}

function get($tsr)
{
	//echo "</br>";
	//echo $tsr;
	return false;
}