<?php
session_start();

$id=$_GET['id'];
//echo "$id";
include('../utils/conn.php');
 
$sql = "select * from user_info where user_pk = '$id'";
$result_set = $object->query($sql);
$res = $object->fetch($result_set);

?>
<form name="edit_user_records" id="edit_user_records" method="post" action="">
    <table border="">
        <tr>
            <th colspan="2">
                Edit User Records 
            </th>
        </tr>
        <br />
        <tr>
            <td> <b>Name</b> </td>
            <td> <? if($res['user_name']==""){echo "NA";}else{echo $res['user_name'];}?></td>
        </tr>
        <tr>
            <td><b>Email Id</b></td>
            <td><? if($res['user_email']==""){echo "NA";}else{echo $res['user_email'];}?></td>
        </tr>
        <tr></tr>
    </table>
</form>