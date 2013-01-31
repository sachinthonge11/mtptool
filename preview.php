<?php
include_once("header.php");
include_once('includes/website.php');
include_once('includes/library.php');
session_start();
$_SESSION['websiteid']=1;
$websiteid=$_SESSION['websiteid'];
$viewpage= new Website();
$res=$viewpage->fetchpage($websiteid,$pageid=0);
$db=new DBConnection();
$items = array();   
$i=1;
while($pagerow=$db->fetch_assoc($res))
{
   // print_r($pagerow);
    $items[$i]=$pagerow['page_id'];
    $i++;
}	

 
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
                $webid=$webrow['website_id'];
                $webname=$webrow['website_name'];
                $webusr=$webrow['user_id'];
                $webkeyword=$webrow['keyword'];
                $websitetitle=$webrow['site_title'];
                $webdescription=$webrow['meta_description'];

    /***********for fetching particular page information  *************/
   
    $res=$viewpage->fetchpage($websiteid,$pageid);
    $db=new DBConnection();
    $pagerow=$db->fetch_assoc($res);
                //print_r($pagerow);
                $pageid=$pagerow['page_id'];
                $pagename=$pagerow['page_name'];
                $pagecontent=$pagerow['page_content'];
}   


$pagearr = $items;
$limit =1;
$qty_items = count($items);
$qty_pages = ceil($qty_items / $limit);
$pageid = isset($_GET['pageurlid']) ? $_GET['pageurlid'] : null;
$curr_page= array_search($pageid,$pagearr); /*This is required to convert to pageid to index page shown in below for traversing*/

$next_page = $curr_page < $qty_pages ? $curr_page + 1 : null;
$prev_page = $curr_page > 1 ? $curr_page - 1 :null;

$offset = ($curr_page - 1) * $limit;
$items = array_slice($items, $offset, $limit);

//echo "current page=".$curr_page;
//echo "next page=".$next_page;

?>

</style>
<!-- BEGIN: Page Content -->
    <title><?php echo $websitetitle ?></title>
    <meta name="description" content="<?php if($webdescription !=NULL) echo $webdescription ; ?>">
    <meta name="keywords" content="<?php if($webkeyword!=NULL) echo $webkeyword;?>">
    <meta charset="UTF-8">
    <!--<title><?php // echo $pagename;?></title>-->
    <h2>Page Name:<?php echo $pagename;?></h2>     
     <h3> <?php echo $pagecontent;?></h3> 
  
<?php if($prev_page){?>
    <a href="preview.php?pageurlid=<?php echo $pagearr[$prev_page]; ?>"> PREV </a>
<?php }    ?>
<?php /*for($i = 1; $i <= $qty_pages; $i++){ 

        //echo  "value of itemes=".$items[$i];
    ?>
    <a href="preview.php?pageurlid=<?php echo $pagearr[$i]; ?>" class="<?php ($i == $curr_page) ? 'curr' : '' ?>"><?php echo $i; ?></a>
<?php }*/?>
<?php if($next_page){ ?>
        <a href="preview.php?pageurlid=<?php echo $pagearr[$next_page]; ?>"> NEXT </a>
<?php } ?>


<?php echo "<br><br>";include_once("footer.php");?>



 
