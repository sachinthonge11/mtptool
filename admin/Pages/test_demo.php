<html>
    <meta charset="utf-8" />

    <head>

      <title>CSS3 POPUP</title>
      <link href="../css/style.css" rel="stylesheet"/>
       <link href="../css/popup.css" rel="stylesheet"/>
       <style type="text/css">
       .divHide{
        display:block;
       }
       </style>
    </head>
    <body>
    <?php $cnt = 1;
    while($cnt<=3){?>
        <div id="box">
            <center><h1>CSS POPUP BOX DEMO</h1><br>
            <a href="#overlay<?=$cnt?>" >LOGIN</a><br><br><br><br>
            
            </center>
        </div>
     
        
          <?php
    $cnt = $cnt + 1;
    }?>  
        
        <div id="overlay<?=$cnt?>">
            
            <div id="popup">
            <!-- ANY CONTENTS -->
                <a href=""><img class="close_button" src="../images/close.png"/></a>
                
                <form class="login">

                      <label>Username</label>
            
                      <input type="text" tabindex="1" class="input" placeholder="Webtuts" required><br><br>
            
                      <label>Password</label>
            
                      <input type="password" class="input" tabindex="2" required><br><br>

                      <input type="checkbox" tabindex="3">Keep me logged in
            
                      <input type="submit" id="submitbtn" value="Login" tabindex="4">
            
    
                </form>

            </div>
            
            
        </div>
       
    </body>
</html>