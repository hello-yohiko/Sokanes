<?php
class __EDIT__
{
	# get content
	private $tabCont;

	private $title;
	private $subTitle;
	private $content;
	private $postName;
	private $postMin;

	function __construct($cont)
	{
		$this->tabCont = $cont;


	}

	public function UpdateSQL()
	{
		global $GLOBALS;

		$addval = array(
			"title" => $this->title,
			"desc" => $this->subTitle,
			"content" => $this->content,
			"min" => $this->postMin
		);

		$val = htmlspecialchars(json_encode($addval, JSON_UNESCAPED_UNICODE));

		return $GLOBALS['SQL']->execute_sql(
				"
			UPDATE fl_posts
				SET post_content = ?
				WHERE ID = ?
			",  
				"si", 
				[$val, $this->tabCont]
			);

	}

	public function CreateSQL()
	{
		$authorID = $GLOBALS['USER']->getNumber;
		$postPassword = "";
		$postCount = 0;

		$addval = array(
			"title" => $this->title,
			"desc" => $this->subTitle,
			"content" => $this->content,
			"min" => $this->postMin
		);

		$val = htmlspecialchars(json_encode($addval, JSON_UNESCAPED_UNICODE));

		$GLOBALS['SQL']->execute_sql(
				"
				INSERT INTO 
					fl_posts
					(post_author, post_content, post_type, post_name, post_password, post_date, comment_count) 
					VALUES
					(?, ?, ?, ?, ?, Now(), ?)
				",  
				"ssssss", 
				[$authorID, $val, $this->postType, $this->postName, $postPassword, $postCount]
			);
	}

	# settings
	public function setTitle(string $str)
	{
		$this->title = $str;
	}

	public function setSubTitle(string $str)
	{
		$this->subTitle = $str;
	}

	public function setContent(string $str)
	{
		$this->content = $str;
	}

	public function setPostName(string $str)
	{
		$this->postName = $str;
	}

	public function setPostType(string $str)
	{
		$this->postType = $str;
	}

	public function setPostImage(string $str)
	{
		$this->postMin = $str;
	}
}
?>