<?php
session_start();
include('../utils/conn.php');

//$object = new connection();
//$connection_variable = $object->connect("localhost", "root", "", "manage_website");
?>
<html>
    <head>
        <title> Admin Login Form</title>
        <script type="text/javascript">
            function loginVal()
            {
                var user_name = document.login_form.user_name.value;
                var password = document.login_form.password.value;
                
                if(user_name == null || user_name == "")
                {
                    alert("Please Enter Username");
                    document.login_form.user_name.focus();
                    return false;
                }
                if(password == null || password == "")
                {
                    alert("Please Enter Password");
                    document.login_form.password.focus();
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <form action="" method="post" name="login_form" id="login_form" onsubmit="return loginVal();">
            <table>
                <tr>
                    <td align="center" colspan="2"> Login Form
                    </td>
                </tr>
                <tr>
                    <td> User Name </td>
                    <td> 
                        <input type="text" name="user_name" id="user_name" />
                    </td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td>
                        <input name="password" id="password" type="password"/>
                    </td>
                </tr>
                <tr>
                    <td>   
                    </td>
                    <td>
                        <input type="submit" name="submit" value="Login"/>
                        <input type="reset" name="reset" value="Reset"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    
    $sql = "select * from admin_login where user_name = '$user_name' and password = '$password' and admin_status = 'active'";
    
    $result = $object->query($sql);
 
      /**
       * 
       $num_of_rows = mysql_num_rows($)
 * $array = $object->fetch($result);
 *       echo "<br/>User Name : $array[user_name] <br/ > Password : $array[password]";
 *  
 */
     $num_of_rows = $object->num_rows($result);
     //echo "$num_of_rows";
    
     if($num_of_rows == 1)
      {
          $result_set = $object->fetch($result);
          //echo "$result_set[user_name]";
          $_SESSION['admin_username'] = $result_set['user_name']; 
          echo "<script>alert('Login Successfully');
          self.location = '../Pages/main.php';</script>";
      }
      else{
          echo "<script>alert('The Username or Password is Incorrect !!!!');
          self.location='login.php';</script>";
      }
 
}
?>