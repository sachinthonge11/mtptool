<?php
session_start();
//print_r($_SESSION);


if($_SESSION['admin_username'] == NULL)
{
    echo "<script>self.location = '../login/login.php';</script>";
}else{?>
    <script type="text/javascript">
        function updateVal(){
            var user_name = document.change_pass.user_name.value;
            var password = document.change_pass.password.value;
            var confirm_password = document.change_pass.confirm_password.value;
            
            if(user_name == "" || user_name == null)
            {
                alert('Please Enter Username');
                document.change_pass.user_name.focus();
                return false;
            }
            if(password == "" || password == null)
            {
                alert('Please Enter Password');
                document.change_pass.password.focus();
                return false;
            }
            if(confirm_password == "" || confirm_password == null)
            {
                alert('Please Enter Confirm Password');
                document.change_pass.confirm_password.focus();
                return false;
            }
            //alert(password);alert(confirm_password);
            if(password != confirm_password)
            {
                alert('Password and Confirm Password Dont Match!!!');
                //document.change_pass.password.focus();
                return false;
            }
        }
    </script>
    
    <?php
    include('../utils/conn.php');
    $sql = "select * from admin_login";
    $result = $object->query($sql);
    $array = $object->fetch($result);
    ?>
    <form method="post" name="change_pass" id="change_pass" onsubmit="return updateVal();">
        <table>
            <tr>
                <td colspan="2"><b>Change Password</b></td>
            </tr>
            <tr>
                <td>Username *</td>
                <td><?=$array['user_name']?></td>
            </tr>
            <tr>
                <td>Password *</td>
                <td><input type="text" name="password" id="password" value="<?=$array['password']?>"/></td>
            </tr>
            <tr>
                <td>Confirm Password *</td>
                <td><input type="text" name="confirm_password" id="confirm_password" value="<?=$array['password']?>"/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" name="submit" id="submit" value="Update"/>
                <input type="reset" name="reset" id="reset" value="Clear"/>
                </td>
                
            </tr>
        </table>
    </form>
<?php    
if(isset($_POST['submit']))
{
    //$user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $sql_query = "update admin_login set password = '$password' where user_name = '$_SESSION[admin_username]'";
    $result = $object->query($sql_query);
    //$result_set = $object->fetch($result);
    
    if($result)
    {
        echo"<script>alert('Password Updated Successfully!!!!');
        self.location='main.php';</script>";
    }
    else{
        echo "<script>alert('Try Again'):</script>";
    }
}

}





?>