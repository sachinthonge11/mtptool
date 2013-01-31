<?php include_once('header.php');
 include_once('includes/website.php');
 include_once('includes/library.php');
session_start();
$websiteid=1; //get from the page;
function getwebsitepages($websiteid)
{
	$viewpage= new Website();
	$res=$viewpage->fetchwebpages($websiteid);
    $db=new DBConnection();
    $pagearr=array();
    $count=0;
     while($pagerow=$db->fetch_assoc($res)){
            if(empty($pagecontent)) {
                $pagearr[$count]=$pagerow['page_id'];
                $count++;
            }  
    	}
     return $pagearr;	
}
	

	$pagearray=getwebsitepages($websiteid);
	if(!empty($pagearray))
 	{ 
 		$pageid=$pagearray[0];
 		
	 	$viewpage=new Website();
    	$res=$viewpage->fetchpage($websiteid,$pageid);
    	$db=new DBConnection();   	    
   		$nrow=$db->num_rows($res);
		$db=new DBConnection();
	    $pagerow=$db->fetch_assoc($res);
			$pageid=$pagerow['page_id'];
		 	$pagename=$pagerow['page_name'];
			$pagecontent=$pagerow['page_content'];
			
				
   }
   else{
   			echo "<script>alert('page have already content')</script>";
    		echo "<script>window.location='viewpages.php'</script>";
    	}

?>
<title>Add Page</title>
<body>
<script type="text/javascript">
function createpagevalidate(){  
 	String.prototype.trim = function() {
      return this.replace(/^\s+|\s+$/g,"");
    }
   	var pagecont=document.getElementById('pagecontent').value;
	var menu=document.getElementById('pagemenu').value;
	
	if((pagecont.trim() == '')||(pagecont.trim() == null)){

		alert('Please Enter Page Contents');
		document.getElementById('pagecontent').focus();
		return false;
	}
	if(menu==""){
		alert('please select Menu field. ');
		document.getElementById('pagemenu').focus();
		return false;
	}
    return true
}
</script>
	<h2>Add page</h2>
	<form name='createpage'  method='post' action='includes/createpage_res.php'>
	<table border='0'>
	  <tr>
	  		<td colspan='2'><input type='hidden'  name='pageid' id="pageid" value="<?php if(isset($pageid)) echo $pageid;?>" ></td>
	  </tr>
	  <tr>
	  		<td>Page Name</td>
	  	  	<td><?php if(isset($pagename)) echo $pagename; ?></td>
	  </tr>
	  <tr>
	  		<td>Page Content</td>
	  		<td><textarea name='pagecontent' id="pagecontent" cols='16' rows='4'><?php  if(isset($pagecontent)) echo $pagecontent;?></textarea></td>
	  </tr>	
	  <tr>
	  		<td>Add as Menu page</td>
	  		<td><select id='pagemenu' name='pagemenu'>
	  			<option value="">Select</option>
	  		    <option value='Yes' <?php if($dbmenu=='Yes') echo "selected"?>>Yes</option> 
	  			<option value='No' <?php if($dbmenu=='No') echo "selected"?>>No </option>
	  			</select>
	  		</td>
	  	</tr>
	  <tr>
	  		<td colspan='2' align='center'><input type='submit'  name='addcontents' value="add contents " onClick="return createpagevalidate();" ></td>
	  </tr>
	</table>	
	</form>
	<?php  	
?>
<?php echo "<br><br>"; include_once('footer.php');?>