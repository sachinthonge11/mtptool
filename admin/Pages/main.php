<?php
@session_start();
//echo $_SESSION['admin_username'];
if($_SESSION['admin_username']==NULL){
    echo "<script>self.location='../login/login.php';</script>";
}else{
include('../utils/conn.php');
?>
<html>
    <head>
        <title> Main Page </title>
        <!--<script type='text/javascript' src='../js/gen_validatorv31.js'></script>
        <script type='text/javascript' src='../js/fg_ajax.js'></script>-->
        <script type='text/javascript' src='../js/fg_moveable_popup.js'></script>
        <!--<script type='text/javascript' src='../js/fg_form_submitter.js'></script>--> 
        <style type="text/css">
            .clear{
                clear:both;
            }
            .left{
                font-weight:bold;
                float:left;
                width:125px;
            }
            .right{
                float: left;
                width:160px;
            }
        </style>
    </head>
   <body>
    <br /><br />
        <div style="width:200px;float:left;font-size:18px;">
            <a href="main.php">Users</a><br />
            <a href="website.php">Websites</a><br />
            <a href="#">Templates</a><br />
            <a href="change_password.php">Change Password</a><br />
            <a href="#">Settings</a><br />
            <a href="../logout/logout.php">Logout</a><br />
        </div> 
        <div style="width: 760px;float:left;">
            <form action="" name="user_info" id="user_info" method="post">
                <table border="1">
                    <thead>
                        <tr>
                            <th> Sr No </th>
                            <th> Name </th>
                            <th> Username </th>
                            <th> Website Name </th>
                            <th> Email ID</th>
                            <th> Option </th>
                        </tr>
                    </thead>
                        
                     
                    <?php
                      $cnt = 1;
                      $sql = "select * from user_info";
                      $result = $object->query($sql);
                      while($array = $object->fetch($result))
                      {
                        
                      
                      
                    ?>
<style type="text/css">
#contactus fieldset
{
   width:320px;
   padding:20px;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}

#contactus legend, h2
{
   font-family : Arial, sans-serif;
   font-size: 1.3em;
   font-weight:bold;
   color:#333;
}

#fg_formContainer<?php echo $cnt;?>
{
   height:auto;
   width:390px;
   background:#FFFFFF;
   border:1px solid #000;
   padding:0;
   position:absolute;
   z-index:999;
   cursor:default;   
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    -khtml-border-radius: 10px;
    border-radius: 10px;   
    display:none;
}

#fg_container_header<?php echo $cnt;?>
{
   height:30px;
   background:#000066;
   border-top-right-radius:10px;
   -moz-border-radius-topright:10px;
   -webkit-border-top-right-radius:10px;
   -khtml-border-top-right-radius: 10px;
   
   border-top-left-radius:10px;
   -moz-border-radius-topleft:10px;
   -webkit-border-top-left-radius:10px;
   -khtml-border-top-left-radius: 10px;   
}


#fg_box_Title
{
   float:left;
   width:180px;
   margin:5px;
   
   color:#fff;
   font-family:Verdana,Arial;
   font-size:12pt;
   font-weight:bold;   
}

#fg_box_Close
{
   color:#ffffff;
   float:right;
   width:80px;
   margin:5px;
}

#fg_form_InnerContainer<?php echo $cnt;?>
{
   margin:15px;
}


#fg_backgroundpopup<?php echo $cnt;?>
{
   position: fixed; 
   top:0; 
   left:0; 
   bottom:0; 
   right:0;
   
   background:#000000;
   opacity: .3;
   -moz-opacity: .3;
   filter: alpha(opacity=30);
   border:1px solid #cecece;
   z-index:1;
   display:none;
}

</style>
                    
                    
                      <tbody>
                        <tr>
                            <td align="center">
                                <?php
                                $user_pk = $array['user_pk'];
                                ?>
                                <?php echo "$cnt";?>
                            </td>
                            <td align="center"><a href='javascript:fg_popup_form("fg_formContainer<?php echo $user_pk?>","fg_form_InnerContainer<?php echo $user_pk?>","fg_backgroundpopup<?php echo $user_pk?>");'><?php echo "$array[name]";?></a></td>
                            <?php
                            $website_query = "select * from website where user_id = '$array[user_pk]'";
                            $result_website = $object->query($website_query);
                            $res = $object->fetch($result_website);
                            
                            
                            ?>
                            <td align="center"><?php if($array['user_name']==""){echo "NA";}else{echo $array['user_name'];}?></td>
                            <td align="center"> <?php if($res['website_name']==""){echo"NA";}else{echo $res['website_name'];}?></td>
                            <td><?php if($array['user_email']==""){echo"NA";}else{echo $array['user_email'];}?></td>
                            <td><?php if($array['user_status']==""){echo "NA";}else{echo "<a href=\'status.php\'>$array[user_status]</a>";}?></td>
                        </tr> 


<div id='fg_formContainer<?php echo $cnt?>'>
    <div id="fg_container_header<?php echo $cnt?>">
        <div id="fg_box_Title"><?php echo "$array[name]"." Details";?></div>
        <div id="fg_box_Close"><a href="javascript:fg_hideform('fg_formContainer<?php echo $cnt?>','fg_backgroundpopup<?php echo $cnt?>');">Close(X)</a></div>
    </div>
    <div id="fg_form_InnerContainer<?php echo $cnt?>">
    <form id='contactus' action='javascript:fg_submit_form()' method='post' accept-charset='UTF-8'>

        <div style="width:360px;">
            <div class="left"> Name 
            </div>
            <div class="right">   <?php echo $array['name'];?>
            </div>
            
            <div class="clear"></div>
            
            <div class="left"> Username 
            </div>
            <div class="right">   <?php echo $array['user_name'];?>
            </div>
            
            <div class="clear"></div>
            
            <div class="left"> Website Name
            </div>
            <div class="right">   <?php echo $res['website_name'];?>
            </div>
            
            <div class="clear"></div>
            
            <div class="left"> Email ID 
            </div>
            <div class="right">   <?php echo $array['user_email'];?>
            </div>
            
            <div class="clear"></div>
            
        </div>
    </form>
    </div>
    
   
</div>



<div id='fg_backgroundpopup<?php echo $cnt?>'></div>



                        <?php
                            $cnt = $cnt + 1;
                        }?> 
                    </tbody>
                    
                </table>
            </form>
        </div>
    </body>
</html>
<?php
}?>
