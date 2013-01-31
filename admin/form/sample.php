<?php
/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/simple-modal-popup-contact-form.html
*/
//1. First, include the file popup-contactform.php
require_once('popup-contactform.php');

//2. link to the style file contact.css
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      <!--<link rel="STYLESHEET" type="text/css" href="popup-contact.css">-->
      <style type="text/css">
      .divHide{
        display : none;
      }
      </style>
      
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <script type='text/javascript' src='scripts/fg_ajax.js'></script>
    <script type='text/javascript' src='scripts/fg_moveable_popup.js'></script>
    <script type='text/javascript' src='scripts/fg_form_submitter.js'></script>
    
    </head><?php 
    $cnt = 1;
    while($cnt<=3){
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

#fg_formContainer<?=$cnt?>
{
   height:500px;
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

#fg_container_header<?=$cnt?>
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

#fg_form_InnerContainer<?=$cnt?>
{
   margin:15px;
}


#fg_backgroundpopup<?=$cnt?>
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



/* spam_trap: This input is hidden. This is here to trick the spam bots*/


</style>
<body onload="javascript:fg_hideform('fg_formContainer<?=$cnt?>','fg_backgroundpopup<?=$cnt?>');">

<p>

<a href='javascript:fg_popup_form("fg_formContainer<?=$cnt?>","fg_form_InnerContainer<?=$cnt?>","fg_backgroundpopup<?=$cnt?>");'>
Click</a>
</p>

<div id='fg_formContainer<?=$cnt?>'>
    <div id="fg_container_header<?=$cnt?>">
        <div id="fg_box_Title">Contact us</div>
        <div id="fg_box_Close"><a href="javascript:fg_hideform('fg_formContainer<?=$cnt?>','fg_backgroundpopup<?=$cnt?>');">Close(X)</a></div>
    </div>
    <div id="fg_form_InnerContainer<?=$cnt?>">
    <form id='contactus' action='javascript:fg_submit_form()' method='post' accept-charset='UTF-8'>

        khg iabur uh gh <br />
        lsh fiuehf me9fu ne98uf09 fq<br />
        lofuhiwh fm89we9f8 ues9ujfoeimnf enfi 8hf8ewn fhewiuf9sufw<br />
    </form>
    </div>
    
   
</div>



<div id='fg_backgroundpopup<?=$cnt?>'></div>

<div id='fg_submit_success_message'>
    <h2>Thanks!</h2>
    <p>
    Thanks for contacting us. We will get in touch with you soon!
    <p>
        <a href="javascript:fg_hideform('fg_formContainer<?=$cnt?>','fg_backgroundpopup<?=$cnt?>');">Close this window</a>
    <p>
    </p>
</div>

<?php $cnt = $cnt + 1;
}?>
</body>
</html>