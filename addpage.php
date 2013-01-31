<?php include_once('header.php');?>
<?php //include_once('adminmenu.php');?>
<body>
<script type="text/javascript">
function popup(URL)
{
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500');");
}
</script>
	<h2>Add page</h2>
	
		<tr><td><input type='button'  value="add page " onClick="popup('createpage.php');" ></td></tr>


<?php include_once('footer.php');?>