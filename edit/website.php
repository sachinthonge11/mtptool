<?php 
include_once("dbconnect.php");
include_once("dblibrary.php");
class Website extends DBlibrary
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
		$result_set = $this->database->query($query);
		//echo "in data base pagemenu==".$pagemenu;
		if($pagemenu == 'No'){ 
		 $query1 ="UPDATE page SET parent_id='0',menu='No',submenu='No' WHERE parent_id='$pageid'";
		 $result_set = $this->database->query($query1);
		}
		//echo "query==".$query1;
		return $result_set;
	}
	function deletepage($pageid){
		$query =" DELETE FROM page WHERE page_id='$pageid' ";
		$result_set = $this->database->query($query);
		//echo "query=".$query; die;
		return $result_set;
	}
	function fetchpage($websiteid,$pageid){
			 
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid' ";
		if($pageid>0){
		$query.= " AND page_id=$pageid";
	    }
	    //echo "query=".$query;
		$result_set = $this->database->query($query);
		return $result_set;

	}
	
	function fetchewebsiteinfo($websiteid){
		$query ="SELECT a.website_id, a.website_name, a.user_id, b.keyword,b.site_title, b.meta_description FROM website a LEFT OUTER JOIN seo_settings b ON a.website_id = b.website_id
			WHERE a.website_id = '$websiteid' ";
		 //echo "query=".$query;
		 $result_set = $this->database->query($query);
		 return $result_set;
	}


	public function getmenupages($website_id) {
        $query = "SELECT page_id, page_name FROM page 
        		WHERE website_id='$website_id' AND menu='Yes' 
        		AND page_status='Active'";
        error_log($query);
        $result_set = $this->database->query($query);
        return $result_set;
    }
    public function fetch_array($resultset){
    	return $this->database->fetch_array($resultset);
    }
    
    public function addPageMenu($websiteid,$menu) {	
    	$query =" UPDATE page SET menu='No' WHERE website_id ='$websiteid'";
		$result_set = $this->database->query($query);
		foreach($menu as $pageid)
		{
			$query =" UPDATE page SET menu='Yes' WHERE website_id ='$websiteid' 	AND page_id='$pageid'";
			$result_set = $this->database->query($query);
    	}
		return $result_set;
    	
    }
    public function fetchwebpages($websiteid){
			 
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid'
		AND (page_content='' OR page_content=NULL) ";
		$result_set = $this->database->query($query);
		return $result_set;

	}
	public function fetchblankpages($websiteid)	{
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid'
		AND menu='No' and  parent_id='0' ";
		$result_set = $this->database->query($query);
		return $result_set;
	}

	public function editblankpages($websiteid,$pageid)	{
		$query = "SELECT page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu FROM page WHERE website_id = '$websiteid'
		AND menu='No' AND  parent_id='0' AND page_id !='$pageid' ";
		$result_set = $this->database->query($query);
		return $result_set;
	}

	public function fetchsubmenuspages($websiteid,$pageid){
		
		$query = "SELECT  page_id,website_id,page_name,page_content,page_status,parent_id,menu,submenu 
		FROM page WHERE website_id = '$websiteid' AND parent_id='$pageid'";
		
		$result_set = $this->database->query($query);
		return $result_set;
	}
	public function addsubmenu($pageid,$submenupages,$presubmenu){
		$query =" UPDATE page SET menu='No',submenu='No',parent_id='0' WHERE parent_id='$pageid'";
		$result_set = $this->database->query($query);
		if($presubmenu!=''){
			foreach($presubmenu as $presubmenu){
				$query =" UPDATE page SET menu='No',submenu='Yes',parent_id='$pageid' WHERE page_id='$presubmenu'";
				$result_set = $this->database->query($query);
	    	}	
        }
        if($submenupages!=''){
        	foreach($submenupages as $submenu){
			$query =" UPDATE page SET menu='No',submenu='Yes',parent_id='$pageid' WHERE page_id='$submenu'";
			$result_set = $this->database->query($query);
    		}
        }	
		return $result_set;
	}



}

?>