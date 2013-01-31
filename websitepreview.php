<?php
include_once("header.php");
include_once('includes/website.php');
include_once('includes/library.php');
session_start();
$_SESSION['websiteid']=1;
$websiteid=$_SESSION['websiteid'];

if(isset($_GET['pageurlid']))
{
    $pageid=Mod_addslashes($_GET['pageurlid']);
    $websiteid=$_SESSION['websiteid'];
    $viewpage= new Website();

   /******* fetching website information ***************/
    $webres= $viewpage->fetchewebsiteinfo($websiteid);
    $db=new DBConnection();
    $webrow=$db->fetch_assoc($webres);
    //print_r($pagerow);
                $webid=$webrow[website_id];
                $webname=$webrow[website_name];
                $webusr=$webrow[user_id];
                $webkeyword=$webrow[keyword];
                $websitetitle=$webrow[site_title];
                $webdescription=$webrow[meta_description];

    /***********for fetching particular page information  *************/
   
    $res=$viewpage->fetchpage($websiteid,$pageid);
    $db=new DBConnection();
    $pagerow=$db->fetch_assoc($res);
                //print_r($pagerow);
                $pageid=$pagerow[page_id];
                $pagename=$pagerow[page_name];
                $pagecontent=$pagerow[page_content];    
}  
?>
header content
    <title><?php echo $websitetitle ?></title>
    <meta name="description" content="<?php if($webdescription !=NULL) echo $webdescription ; ?>">
    <meta name="keywords" content="<?php if($webkeyword!=NULL) echo $webkeyword;?>">
    <meta charset="UTF-8">
    <div id ='menu'>
    <ul>
    <?php
    $website = new Website();
    $result = $website->getmenupages($websiteid);
    while ($row = $website->fetch_array($result)) {
    ?>
    <li><?php echo "<a href='websitepreview.php?pageurlid=$row[page_id]' >$row[page_name]</a>";?></li>
    <?php
    }
    ?>
    </ul>
</div>
<div id="container">
<h2>Page Name:<?php echo $pagename;?></h2> 
     <h3> <?php echo $pagecontent;?></h3> 
</div>
   
<?php include_once("footer.php");?>


 
