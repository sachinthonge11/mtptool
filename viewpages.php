<?php session_start();
 include_once('header.php');
 include_once('includes/website.php');
//include_once('adminmenu.php');\


$websiteid=1; //fetch by 

$website=new Website();
$res=$website->fetchpage($websiteid,$pageid=0);//  To fetch pages by user_id 
//echo $res;

if($res>0){	
		echo "<table id='pages' border='2' cellspacing='2px' cellwidth='5px' >";
		echo "<tr><th>Sr.No.</th><th>Pages</th><th>Actions</th></tr>";
		$count=0;
 		while($pagerow=$website->fetch_assoc($res))
 		{
 			$count++;
 			//extract($pagerow);
 		 	echo "<tr>";
 		 	echo "<td>$count</td><td>".$pagerow['page_name']."</td><td><a href='viewpage.php?pageurlid=".$pagerow['page_id']."'>view</a>  |  <a href='editpage.php?pageurlid=".$pagerow['page_id']."'>Edit</a>   |   <a href='deletepage.php?pageurlid=".$pagerow['page_id']."' onclick=\"return confirm('Are you Sure?');\"> Delete </a> </td>";
 		 	 echo"</tr>";

 		}
 		echo "</table>";

 		echo "<br><div id='pageNavPosition'></div>";
	}
	else{
  		echo "no pages found for particular users";
	}

?>

<body>
	<script type="text/javascript"><!--
        var pager = new Pager('pages',<?php echo PAGERECORD;?>); 
        pager.init(); 
        pager.showPageNav('pager', 'pageNavPosition'); 
        pager.showPage(1);
    //--></script>

<?php include_once('footer.php');	?>