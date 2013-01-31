<?php include_once('header.php');
 include_once('includes/website.php');
session_start();
$websiteid=1;
if(isset($_GET['pageurlid']))
{
	$pageid=$_GET['pageurlid'];
	$viewpage=new Website();
    $res=$viewpage->fetchpage($websiteid,$pageid);
    $db=new DBConnection();
    $pagerow=$db->fetch_assoc($res);

    			$pageid=$pagerow['page_id'];
   		 		$pagename=$pagerow['page_name'];
    			$pagecontent=$pagerow['page_content'];
    			$dbmenu=$pagerow['menu'];
    			$dbpagestatus=$pagerow['page_status'];
    	
    
}	
?>
<title>Edit Page</title>
<body>
<script type="text/javascript">
function createpagevalidate()
{  
	
	  String.prototype.trim = function() {
      return this.replace(/^\s+|\s+$/g,"");
    }
	var page=document.getElementById('pagename').value;
	var pagecont=document.getElementById('pagecontent').value;
	var menu=document.getElementById('pagemenu').value;
	var pgstatus=document.getElementById('pagestatus').value
	
	if((page.trim() == '')||(page.trim() == null))
	{
		alert('Please Enter Page Name');
		document.getElementById('pagename').focus();
		return false;
	}
	
	if((pagecont.trim() == '')||(pagecont.trim() == null))
	{
		alert('Please Enter Page Contents');
		document.getElementById('pagecontent').focus();
		return false;
	}

	if(menu=="")
	{
		alert('please select Menu field. ');
		document.getElementById('pagemenu').focus();
		return false;
	}
	
	if(pgstatus=="")
	{
		alert('please select Menu field. ');
		document.getElementById('pagestatus').focus();
		return false;
	}	
	

	   return true
  
}
</script>
	<h2>Modify page</h2>
	<form name='createpage' action='includes/createpage_res.php' method='post' >
	<table border='0'>
	<tr>
		<td colspan='2'><input type='hidden'  name='pageid' id="pageid" value="<?php if(!empty($pageid)) echo $pageid;?>" ></td>
	</tr>
	<tr>
		<td>Page Name</td>
		<td><input type='text'  name='pagename' id="pagename" value="<?php if(!empty($pagename)) echo $pagename;?>" ></td>
	</tr>
	<tr>
		<td>Page Content</td>
		<td><textarea name='pagecontent' id="pagecontent"  height='50' width='70'><?php if(!empty($pagecontent)) echo $pagecontent; ?></textarea></td>
	</tr>	
	<tr><td>Add as Menu page</td>
		<td><select id='pagemenu' name='pagemenu'>
			<option value='Yes'<?php if($dbmenu=='Yes') echo 'selected';?>>Yes</option>
		    <option value='No' <?php if($dbmenu=='No') echo 'selected'; ?>>No </option>
		    </select>
		</td>
	</tr>
	<tr><td>Page</td>
		<td><select id='pagestatus' name='pagestatus'>
			<option value='Active'<?php if($dbpagestatus=='Active') echo 'selected';?>>Active</option>
		    <option value='Inactive' <?php if($dbpagestatus=='Inactive') echo 'selected'; ?>>Inactive</option>		    </select>
		</td>
	</tr>

	  <tr><td colspan='2' align='center'><input type='submit'  name='btnmodifypage' value="Modify page " onClick="return createpagevalidate();" ></td></tr>
	</table>	
	</form>
		


<?php include_once('footer.php');?>