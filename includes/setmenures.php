<?php session_start(); 
	include_once("dbconnect.php");
	include_once("website.php");	
		if($_POST['selectmenu']){
				$menu=$_POST['menu'];
 		    	$websiteid=$_SESSION['websiteid'];
	 		  	//echo " in res websiteid=".$websiteid;
	         	$setmenu=new Website();
	 			$setmenures=$setmenu->addPageMenu($websiteid,$menu);
		 			if($setmenures>0){
		 				echo "<script>alert('menus is Added successfuly')</script>";
		 				echo "<script>window.location='../setmenu.php'</script>";
		 			}	
		 		    else{
		 		    	echo "<script>alert('menus are not updated.');<script>";
		 				echo "<script>window.location='../setmenu.php'</script>";
		 			}
 		}	