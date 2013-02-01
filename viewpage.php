<?php
include_once("header.php");
include_once('includes/website.php');
include_once('includes/library.php');
    $pageid=Mod_addslashes($_GET['pageurlid']);
    $websiteid=1 ;//add website id here 
    $viewpage=new Website();
    if(isset($_GET['pageurlid'])) {
    $res=$viewpage->fetchpage($websiteid,$pageid);
    $db=new DBConnection();
    $pagerow=$db->fetch_assoc($res);
                //print_r($pagerow);
                $pageid=$pagerow['page_id'];
                $pagename=$pagerow['page_name'];
                $pagecontent=$pagerow['page_content'];
               
            }
    echo "<a href='javascript:history.back();'>BACK</a>";
  ?>
<!-- BEGIN: Page Content -->
    <title><?php echo $pagename;?></title>
     <h2>Page Name:<?php echo $pagename;?></h2>     
     <h3> <?php echo $pagecontent;?></h3> 
  

<?php include_once("footer.php");?>
 
