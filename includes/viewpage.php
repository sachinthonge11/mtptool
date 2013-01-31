<?php
include_once("header.php");
include_once('includes/page.php');
session_start();
$_SESSION['username']='sachin';
$_SESSION['userid']=2;

if(isset($_GET['pageurlid']))
{
    $pageid=$_GET['pageurlid'];
    $viewpage=new Page();
    $Type='bypage';
   if(isset($_GET[pageurlid])) {
    $res=$viewpage->Fetchpageinfo($pageid,$Type);
    $db=new DBConnection();
    $pagerow=$db->fetch_assoc($res);

                $pageid=$pagerow[page_id];
                $pagename=$pagerow[page_name];
                $pagecontent=$pagerow[page_content];
            }
    
}   ?>
<!-- BEGIN: Page Content -->
<title><?php echo $pagename;?><title>
<div id="container">
    <div id="content">
     <h2> <?echo $pagecontent;?><h2> 
    </div>
</div>
<!-- END: Page Content -->
include_once("footer.php");
?>
 
