<?php
class __sql__
{
	private $sql_ip;
	private $sql_name;
	private $sql_user;
	private $sql_password;

	private $sql_data;

    private $count;
    private $curent_count;
    private $post_data;

	function __construct(string $ip, string $name, string $user, string $password)
    {
        $this->sql_ip = $ip;
        $this->sql_name = $name;
        $this->sql_user = $user;
        $this->sql_password = $password;

        $this->sql_data = new mysqli($this->sql_ip, $this->sql_user, $this->sql_password, $this->sql_name);

		if($this->sql_data->connect_errno) {
			die("Échec lors de la connexion à MySQL : (" . $getBddSQL->connect_errno . ") " . $getBddSQL->connect_error);
		}

        $this->curent_count = 0;

		return $this->sql_data;
    }

    public function init()
    {
        $this->curent_count = 0;

        $this->post_data = $this->getpost();
        $this->count = count($this->post_data);
    }

    function execute_sql($inst,  $typeData, $data)
    {
        if(!$stmt = $this->sql_data->prepare($inst))
        {
            echo "Error de recuperration des data";
            return false;
        }

        if (!$stmt->bind_param($typeData, ...$data))
        {
            echo "Échec lors du liage des paramètres : (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }
            
        if (!$stmt->execute())
        {
            echo "Échec lors de l'exécution de la requête : (" . $stmt->errno . ") " . $stmt->error;
            return false;
        }

        return $stmt;
    }

    function _getPrepare($inst,  $typeData, $data)
    {
        $dataPPP = ['data' => []];
        if($stmt = $this->sql_data->prepare($inst))
        {

             /* Lecture des marqueurs */
            if($typeData != "")
            {
                $stmt->bind_param($typeData, ...$data);
            }

            /* Exécution de la requête */
            $stmt->execute();

            /* instead of bind_result: */
            $result = $stmt->get_result();

            while($myrow = $result->fetch_assoc()){
                array_push($dataPPP['data'], $myrow);
            }

            return $dataPPP;
        }
    }

    public function PostView(string $idPost = "")
    {
        global $GLOBALS;

        $data2 = [];
        $add = [];

        $qeury = "SELECT * FROM fl_posts WHERE post_name != ? OR post_name != ? ORDER BY ID DESC";
        if(
            isset($idPost)
            &&
            $idPost != ""
        )
        {
            $qeury = "SELECT * FROM fl_posts WHERE post_name = ? OR post_type = ? ORDER BY ID DESC";
        }

        if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "ss", [$idPost, $idPost]))
        {
            return false;
        }

        for($a = 0; $a < count($data['data']); $a++)
        {
            if(!isset($data['data'][$a]))
            {
                return false;
            }
            # stockage des data
            $get = $data['data'][$a];
            $get['o'] = json_decode(htmlspecialchars_decode($get['post_content']), true);

            // view user
            if(isset($get['o']['title']) && $get['o']['title'] != "")
                $add['post_title'] = $get['o']['title'];

            if(isset($get['o']['desc']) && $get['o']['desc'] != "")
                $add['post_subTitle'] = $get['o']['desc'];

            if(isset($get['o']['content']) && $get['o']['content'] != "")
                $add['post_content'] = $get['o']['content'];

            if(isset($get['post_date']) && $get['post_date'] != "")
                $add['post_date'] = $get['post_date'];

            if(isset($get['post_author']) && $get['post_author'] != "")
                $add['post_author'] = $this->dataUser($get['post_author'], "username");
            
            if(isset($get['post_author']) && $get['post_author'] != "")
                $add['post_author_ID'] = $get['post_author'];

            if(isset($get['post_name']) && $get['post_name'] != "")
                $add['post_name'] = $get['post_name'];

            if(isset($get['post_type']) && $get['post_type'] != "")
                $add['post_type'] = $this->PostMetas($get['post_type']);

            $add['post_min'] = __UND_UPLOAD__;
            if(isset($get['o']['min']) && $get['o']['min'] != "")
                $add['post_min'] = __UPLOAD__.$get['o']['min'];

            array_push($data2, $add);

        }

        return $data2;
    }


    public function PostMetas($idMeta = "")
    {
        global $GLOBALS;

        $data2 = [
            
        ];
        $add = [
            
        ];

        $qeury = "SELECT * FROM fl_postmeta WHERE name != ? OR term_group != ?";
        if(
            isset($idMeta)
            &&
            $idMeta != ""
        )
        {
            $qeury = "SELECT * FROM fl_postmeta WHERE name = ? OR term_group = ?";
        }

        if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "ss", [$idMeta,$idMeta]))
        {
            return false;
        }

        for($a = 0; $a < count($data['data']); $a++)
        {
            if(!isset($data['data'][$a]))
            {
                return false;
            }
            # stockage des data
            $get = $data['data'][$a];

            // view user
            if(isset($get['name']) && $get['name'] != "")
                $add['name'] = $get['name'];

            if(isset($get['slug']) && $get['slug'] != "")
                $add['slug'] = $get['slug'];

            if(isset($get['term_group']) && $get['term_group'] != "")
                $add['term_group'] = $get['term_group'];

            array_push($data2, $add);

        }

        array_push($data2, [
                "name" => "non classé",
                "slug" => "non-classe",
                "term_group" => -1
            ]);

        return $data2;
    }

    public function PostMetas1(string $idMeta = "")
    {
        global $GLOBALS;

        $data2 = [];
        $add = [];

        $qeury = "SELECT * FROM fl_postmeta WHERE name != ? OR term_group != ?";

        if(!$data = $GLOBALS['SQL']->_getPrepare($qeury, "ss", [$idMeta,$idMeta]))
        {
            return false;
        }

        for($a = 0; $a < count($data['data']); $a++)
        {
            if(!isset($data['data'][$a]))
            {
                return false;
            }
            # stockage des data
            $get = $data['data'][$a];

            // view user
            if(isset($get['name']) && $get['name'] != "")
                $add['name'] = $get['name'];

            if(isset($get['slug']) && $get['slug'] != "")
                $add['slug'] = $get['slug'];

            if(isset($get['term_group']) && $get['term_group'] != "")
                $add['term_group'] = $get['term_group'];

            array_push($data2, $add);

        }

        return $data2;
    }


    public function _query_($data)
    {
        return $this->sql_data->query($data);
    }

    public function dataUser($str, $e)
    {
        $dsql = "SELECT * FROM fl_user WHERE number_ = ?";
        if($d = $GLOBALS['SQL']->_getPrepare($dsql, "s", [$str]))
        {
            return $d['data'][0][$e];
        }

        return false;

    }
}
?>