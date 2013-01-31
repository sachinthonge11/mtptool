<?php
session_start();
//echo $_SESSION['admin_username'];
if($_SESSION['admin_username']==NULL){
    echo "<script>self.location='../login/login.php';</script>";
}else
{
include('../utils/conn.php');

}

?>
<title>jQuery UI Dialog - Modal message</title>
    <link rel="stylesheet" href="jquery-ui.css" />
    <script src="jquery-1.8.2.js"></script>
    <script src="jquery-ui.js"></script>
    <script type="text/javascript" src='website.js'></script>
    <link rel="stylesheet" href="style.css" />
 <div style="width:200px;float:left;font-size:18px;">
            <a href="main.php">Users</a><br />
            <a href="website.php">Websites</a><br />
            <a href="#">Templates</a><br />
            <a href="change_password.php">Change Password</a><br />
            <a href="#">Settings</a><br />
            <a href="../logout/logout.php">Logout</a><br />
  </div> 
  <div style="width: 760px;float:left;">
  <form action="" name="websiteinfo" id="websiteinfo" method="post">
    <div id="dialog-form" title="User profile">
    <fieldset>
      here will be the content of ajax 
    </fieldset>
    </div>
    <div id="users-contain" class="ui-widget">
      
    </div>
                <table border="1">
                        <tr>
                            <th> Sr No </th>
                            <th> Website Name </th>
                            <th>User Name</th>
                            <th> Pages </th>
                            <th> Menus </th>
                        </tr>
                    <?php
                      $cnt = 1;
                      $websql = "SELECT a.website_id, a.website_name, b.name, a.user_id,(
                                  SELECT GROUP_CONCAT( page_name
                                  SEPARATOR  ',' ) 
                                  FROM page
                                  WHERE website_id = a.website_id
                                  ) AS  'websitepages', (

                                  SELECT GROUP_CONCAT( page_name
                                  SEPARATOR  ',' ) 
                                  FROM page
                                  WHERE menu =  'yes'
                                  AND website_id = a.website_id
                                  ) AS  'menupages'
                                  FROM website a, user_info b
                                  WHERE a.user_id = b.user_pk ";
                      $result = $object->query($websql);
                      $count=1;
                      while($array = $object->fetch($result))
                      {
                      		extract($array);
                      		echo "<tr>";
	                            echo "<td> $count </td>";
	                            echo "<td>".ucfirst(strtolower( $array['website_name'])) ."</td>";
	                            echo "<td class='userinfo'>".ucfirst(strtolower($array['name']))."</td>";
                              echo "<td>".ucfirst(strtolower($array['websitepages'])) ."</td>";
	                            echo "<td> ".ucfirst(strtolower($array['menupages']))."</td>";
                            echo "</tr>";
                         $count++;
                      }
                       echo "</table>";
 ?>
 	</form>
</div>
