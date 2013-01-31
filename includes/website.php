<?php 
include_once("dbconnect.php");
class Website
{
	var $database = null;
	function __construct() {
		$this->database = new DBConnection();
	}

	function addpage($pageid,$pagecontent,$pagemenu){
		$query =" UPDATE page SET page_content='$pagecontent',menu='$pagemenu' WHERE page_id ='$pageid'";
		//echo "query=".$query;
		$result_set = $this->database->query($query);
		return $result_set;
	}
	function updatepage($pageid,$pagename,$pagecontent,$pagemenu,$pagestatus){
		$query =" UPDATE page SET page_name='$pagename',page_content='$pagecontent',menu='$pagemenu',page_status='$pagestatus' WHERE page_id ='$pageid'";
		//echo "query=".$query;
		$result_set = $this->database->query($query);
		if($pagemenu == 'yes'){
		  //echo "in the yes menu"; 
		 $query ="INSERT INTO menu (page_id,website_id,user_id,parent_menu) VALUES ('$pageid','$websiteid','$userid','0')";
		 echo "query=".$query;
		 $result_set = $this->database->query($query);
		}
		return $result_set;
	}
	function deletepage($pageid){
		$query =" DELETE FROM page WHERE page_id='$pageid' ";
		$result_set = $this->database->query($query);
		//echo "query=".$query; die;
		return $result_set;
	}
	function fetchpage($websiteid,$pageid)
	{
			 
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid' ";
		if($pageid>0){
		$query.= " AND page_id=$pageid";
	    }
	    //echo "query=".$query;
		$result_set = $this->database->query($query);
		return $result_set;

	}
	
	function fetchewebsiteinfo($websiteid)
	{
		$query ="SELECT a.website_id, a.website_name, a.user_id, b.keyword,b.site_title, b.meta_description FROM website a LEFT OUTER JOIN seo_settings b ON a.website_id = b.website_id
			WHERE a.website_id = '$websiteid' ";
		 //echo "query=".$query;
		 $result_set = $this->database->query($query);
		 return $result_set;
	}


	public function getmenupages($website_id)
    {
        $query = "SELECT page_id, page_name FROM page 
        		WHERE website_id='$website_id' AND menu='Yes' 
        		AND page_status='Active'";
        error_log($query);
        $result_set = $this->database->query($query);
        return $result_set;
    }
    public function fetch_array($resultset)
    {
    	return $this->database->fetch_array($resultset);
    }
    
    public function addPageMenu($websiteid,$menu)
    {	
    	$query =" UPDATE page SET menu='No' WHERE website_id ='$websiteid'";
		$result_set = $this->database->query($query);
		foreach($menu as $pageid)
		{
			$query =" UPDATE page SET menu='Yes' WHERE website_id ='$websiteid' 	AND page_id='$pageid'";
			$result_set = $this->database->query($query);
    	}
		return $result_set;
    	
    }
    public function fetchwebpages($websiteid)
	{
			 
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid'
		AND (page_content='' OR page_content=NULL) ";
		$result_set = $this->database->query($query);
		return $result_set;

	}
	public function fetchblankpages($websiteid)
	{
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid'
		AND menu='No' and submenu='No' AND (page_content='' OR page_content=NULL) ";
		$result_set = $this->database->query($query);
		return $result_set;
	}
}
?>