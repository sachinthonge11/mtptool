<?php session_start();
include_once('website.php');
include_once('library.php');

	if(empty($_POST['pagename'])){
 			$error.= "you have not entered page name<br>";
 	}
 	if (!empty($error))	{	
 	}
 	else{	
 	   		echo " ".$error;  
 	}

			$pagename=Mod_addslashes($_POST['pagename']);
 		     $userid=$_SESSION['userid'];	
 			 $websiteid=$_SESSION['websiteid'];
 			 $menus=1;
 		
 	   if($_POST['pagewithmenu']){	
         	$webpage=new Website();
 			$webpageres=$webpage->addwebsitepagetitle($pagename,$userid,$website_id,$menus);
 			
 			if($webpageres>0)
 			{
 				echo "<script>alert('page info is updated successfuly')</script>";
 				echo "<script>window.location='../public/viewpages.php'</script>";
 			}	
 		    else{
 		    	echo "<script>alert('page info not updated.');<script>";
 				echo "<script>window.location='../public/viewpages.php'</script>";
 			}
 	   }

?>