<?php session_start();
include_once('website.php');
include_once('library.php');
  $error='';
	if(empty($_POST['pagename'])){
 			$error.= "you have not entered page name<br>";
 	}
 	if(empty($_POST['pagecontent'])){
 			$error.= "you have not entered pagecontent<br>";
 	}	
	if (!empty($error)){	
 	}
 	else{	
 	   		echo " ".$error;  
 	}
 			
 	   if(isset($_POST['btnmodifypage'])){	
 	          $pageid=Mod_addslashes($_POST['pageid']);
            $pagename=Mod_addslashes($_POST['pagename']);
            $pagecontent=Mod_addslashes(trim($_POST['pagecontent']));
            $pagemenu=Mod_addslashes($_POST['pagemenu']);
            $pagestatus=Mod_addslashes($_POST['pagestatus']);

         	  $website=new Website();
 			      $modres=$website->updatepage($pageid,$pagename,$pagecontent,$pagemenu,$pagestatus);
 			
   			if($modres>0){
                if($pagemenu=='Yes'){
                    $chksubmenu=Mod_addslashes($_POST['checksubmenu']);
                    if($chksubmenu=='Yes')
                    {
                      $submenupages=$_POST['submenu'];
                      //echo "pageid=".$pageid;
                     // print_r($submenupages);
                      $res=$website->addsubmenu($pageid,$submenupages);
                      if($res>0)
                      {
                        echo "submenu pages added successfully";
                      }
                    }
                  }

         				echo "<script>alert('page info is updated successfuly')</script>";
         				echo "<script>window.location='../viewpages.php'</script>";
   			   }  	
 		    else{
       		    	echo "<script>alert('page info not updated.');<script>";
       				  echo "<script>window.location='../viewpages.php'</script>";
 			      }
 	   }

    if(isset($_POST['addcontents'])){
            $pageid=Mod_addslashes($_POST['pageid']);
            $pagecontent=Mod_addslashes(trim($_POST['pagecontent']));
            $pagemenu=Mod_addslashes($_POST['pagemenu']);
            $website=new Website();
            $res=$website->addpage($pageid,$pagecontent,$pagemenu);
            if($res>0) {
                 if($pagemenu=='Yes'){
                    $chksubmenu=Mod_addslashes($_POST['checksubmenu']);
                    if($chksubmenu=='Yes')
                    {
                      $submenupages=$_POST['submenu'];
                      //echo "pageid=".$pageid;
                     // print_r($submenupages);
                      $res=$website->addsubmenu($pageid,$submenupages);
                      if($res>0)
                      {
                        echo "submenu pages added successfully";
                      }
                    }
                  }

                echo "<script>alert('page info is updated successfuly')</script>";
                echo "<script>window.location='../createpage.php'</script>";
            }
            else{
              echo "<script>alert('page info not updated.');<script>";
              echo "<script>window.location='../createpage.php'</script>";
            }

    }
?>