<?php 
session_start();
//echo $_SESSION['admin_username'];
if($_SESSION['admin_username']==NULL){
    echo "<script>self.location='../login/login.php';</script>";
}else
{
include('../utils/conn.php');

}
//$name=null;
$name=$_POST['name'];
//$name='Afreen';
$websql = " SELECT * FROM user_info WHERE  name ='$name'";
   
                      $result = $object->query($websql);
                      $array = $object->fetchassoc($result);
                      echo "<table>";
                          echo "<tr>";
                          echo "<td><b>User Name</b> </td><td>: ". ucfirst(strtolower($array['user_name'] ))."</td>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td><b>Name </b></td><td>: ".ucfirst(strtolower($array['name']))."</td>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td><b>User Email </b></td><td>: ".$array['user_email']."</td>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td><b>User Status</b></td><td>: ".ucfirst(strtolower($array['user_status']))."</td>";
                          echo "</tr>";
                      echo "</table>";
                      

?>