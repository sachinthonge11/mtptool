<?php
include_once("header.php");
include_once('includes/website.php');
include_once('includes/library.php');
session_start();
$_SESSION['username']='sachin';
$_SESSION['userid']=2;

//echo $_GET['pageurlid'];
if(isset($_GET['pageurlid']))
{
    $pageid=Mod_addslashes($_GET['pageurlid']);
    $userid=$_SESSION['userid'];
    $delpage=new Website();
    if(isset($_GET[pageurlid])) {
    $res=$delpage->deletepage($pageid);

    $db=new DBConnection();
    $pagerow=$db->affected_rows();
    if($res>0){
                echo "<script>alert('page info is deleted successfuly.')</script>";
                echo "<script>window.location='viewpages.php'</script>";
            }   
            else{
                echo "<script>alert('page info not deleted.');<script>";
                echo "<script>window.location='viewpages.php'</script>";
            }       
               
    }
    
}  

include_once("header.php");
?> 
 
