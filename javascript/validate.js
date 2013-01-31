function validate()
{
	
	var alphanum="^[a-zA-Z\ \]+$";
	var reg = "^[0-9\-\.]+$";
	var error;
	// alert('test');
	x=document.forms["Voucher-Form"]["payDate"].value;
	if (x==null || x=="")
  {
		error="Please select pay date of voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Voucher-Form"]["memo"].value;
	if (x==null || x=="")
  {
		error="Fill the Memo field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  var x=document.forms["Voucher-Form"]["amountRupees"].value;
	if (x==null || x=="")
  {
		error="Fill the Amount Rupees ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="Amount Rupees contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}  
	
	x=document.forms["Voucher-Form"]["inOrOut"].value;
	if (x==null || x=="")
  {
		error="Please select transaction type voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Voucher-Form"]["fundType"].value;
	if (x==null || x=="")
  {
		error="Fill the fund source field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="Fund source field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Voucher-Form"]["paidto"].value;
	if (x==null || x=="")
  {
		error="Fill the Paid to/at field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="Paid to/at field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Voucher-Form"]["payMethod"].value;
	if (x==null || x=="")
  {
		error="Fill the pay method field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Voucher-Form"]["dueRupees"].value;
	if (x==null || x=="")
  {
		error="Fill the Due Rupees ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="Due Rupees contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
  	var x=document.forms["Voucher-Form"]["notes"].value;
	if (x==null || x=="")
	{
		error="Fill the notes field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function monthYear()
{
	year=document.forms["Report-Form"]["year"].value;
	if ((year==null || year==""))
	{
		error="Select year for report generation";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function login()
{
	x=document.forms["Login-Form"]["username"].value;
	
	if (x==null || x=="")
	{
		error="Enter username";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	x=document.forms["Login-Form"]["password"].value
	
	if (x==null || x=="")
	{
		error="Enter password.";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function duelVoucher () {
		
	var alphanum="^[a-zA-Z\ \]+$";
	var reg = "^[0-9\-\.]+$";
	var regDate= "^[0-9\-]+$";
	var error;
	// alert('test');
	x=document.forms["Duel-Form"]["creditpayDate"].value;
	if (x==null || x=="")
  {
		error="Please select credit pay date of voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
    if(!x.match(regDate))
	{
		error="Credit payment date contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	} 
	var x=document.forms["Duel-Form"]["creditmemo"].value;
	if (x==null || x=="")
  {
		error="Fill the credit  Memo field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  var x=document.forms["Duel-Form"]["creditamountRupees"].value;
	if (x==null || x=="")
  {
		error="Fill the credit Amount ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="Credit amount contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}  
	
	x=document.forms["Duel-Form"]["creditinOrOut"].value;
	if (x==null || x=="")
  {
		error="Please select transaction type of credit voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Duel-Form"]["creditfundType"].value;
	if (x==null || x=="")
  {
		error="Fill the credit fund source field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="credit Fund source field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Duel-Form"]["creditpaidto"].value;
	if (x==null || x=="")
  {
		error="Fill the credit Paid to/at field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="credit Paid to/at field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Duel-Form"]["creditpayMethod"].value;
	if (x==null || x=="")
  {
		error="Fill the credit pay method field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Duel-Form"]["creditdueRupees"].value;
	if (x==null || x=="")
  {
		error="Fill the credit Due ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="credit Due contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
  	var x=document.forms["Duel-Form"]["creditnotes"].value;
	if (x==null || x=="")
	{
		error="Fill the credit notes field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
		x=document.forms["Duel-Form"]["debitpayDate"].value;
	if (x==null || x=="")
	  {
		error="Please select debit pay date of voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
	  }
 	 if(!x.match(regDate))
	{
		error="Debit payment date contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	} 
	var x=document.forms["Duel-Form"]["debitmemo"].value;
	if (x==null || x=="")
  {
		error="Fill debit  Memo field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  var x=document.forms["Duel-Form"]["debitamountRupees"].value;
	if (x==null || x=="")
  {
		error="Fill the debit Amount ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="debit Amount contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}  
	
	x=document.forms["Duel-Form"]["debitinOrOut"].value;
	if (x==null || x=="")
  {
		error="Please select transaction type of debit voucher";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Duel-Form"]["debitfundType"].value;
	if (x==null || x=="")
  {
		error="Fill debit  fund source field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="debit Fund source field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Duel-Form"]["debitpaidto"].value;
	if (x==null || x=="")
  {
		error="Fill debit  Paid to/at field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(alphanum))
	{
		error="debit Paid to/at field contain alphabets only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	var x=document.forms["Duel-Form"]["debitpayMethod"].value;
	if (x==null || x=="")
  {
		error="Fill debit  pay method field";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
	var x=document.forms["Duel-Form"]["debitdueRupees"].value;
	if (x==null || x=="")
  {
		error="Fill debit  Due ";
		document.getElementById("validation").innerHTML=error;
		return false;
  }
  if(!x.match(reg))
	{
		error="debit Due  contain numbers only";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
  	var x=document.forms["Duel-Form"]["debitnotes"].value;
	if (x==null || x=="")
	{
		error="Fill the debit notes field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function createUser()
{
	x=document.forms["create-user"]["username"].value;
	if (x==null || x=="")
	{
		error="Enter username field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	if (x.length <6) {
		error = "Username length should be minimum 6 letters";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	x=document.forms["create-user"]["password"].value;
	if (x==null || x=="")
	{
		error="Enter password field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	if (x.length <6) {
		error = "Password length should be min 6 letters";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	if (document.getElementById('add').checked) {
		 // alert('add checked');
	}else if(document.getElementById('view').checked) {
		if (document.getElementById('edit').checked) {
		 // alert('edit checked');
		} else if(document.getElementById('delete').checked) {
		 // alert('delete checked');
		}
	}else if(document.getElementById('report').checked) {
		 // alert('report checked');
	} else {
		error="select at least one privilege";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function updateUser () {
	if (document.getElementById('add').checked) {
		 // alert('add checked');
	}else if(document.getElementById('view').checked) {
		if (document.getElementById('edit').checked) {
		 // alert('edit checked');
		} else if(document.getElementById('delete').checked) {
		 // alert('delete checked');
		}
	}else if(document.getElementById('report').checked) {
		 // alert('report checked');
	} else {
		error="select at least one privilege";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
}

function changePassword () {

	x=document.forms["change-password"]["currentPassword"].value;
	if (x==null || x=="")
	{
		error="Enter current password field";
		document.getElementById("validation").innerHTML=error;
		return false;
	}

	x=document.forms["change-password"]["newPassword"].value;
	if (x==null || x=="")
	{
		error="Enter new password field.";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	if (x.length <6) {
		error = "Password length should be minimum 6 letters";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	x=document.forms["change-password"]["confPassword"].value;
	if (x==null || x=="")
	{
		error="Enter confirm password field.";
		document.getElementById("validation").innerHTML=error;
		return false;
	}
	newPassword = document.forms["change-password"]["newPassword"].value;
	confPassword = document.forms["change-password"]["confPassword"].value;
	if (newPassword != confPassword) {
		error="New password and confirm password should be same.";
		document.getElementById("validation").innerHTML=error;
		return false;	
	}
}

// function pullAjax(){
//     var a;
//     try{
//       a=new XMLHttpRequest();
//     }
//     catch(b)
//     {
//       try
//       {
//         a=new ActiveXObject("Msxml2.XMLHTTP");
//       }catch(b)
//       {
//         try
//         {
//           a=new ActiveXObject("Microsoft.XMLHTTP");
//         }
//         catch(b)
//         {
//           alert("Your browser broke!");return false;
//         }
//       }
//     }
//     return a;
//  }

// function checkPassword () {
// 	alert('in fun');
// 	x=document.forms["change-password"]["currentPassword"].value;
// 	if (x==null || x=="")
// 	{
// 		alert('in if');
// 		error="Enter current password field";
// 		document.getElementById("validation").innerHTML=error;
// 		return false;
// 	}else {
// 		alert("in else");
//     	code = '';
//     	message = '';
//     	result = '';
//     	obj = null;
// 	    obj=pullAjax();
// 	    if (obj!=null) {
// 	    	alert("object not null");
// 		    obj.onreadystatechange=function()
//     		{
// 		      if(obj.readyState==4)
// 		      {
// 		      	alert(""+obj.responseText);
// 		      	/*
// 		        eval("result = "+obj.responseText);
// 		        code = result['code'];
// 		        message = result['result'];
// 		        */
// 		      }
//     		}
//     	}
//     	else
//     	{
//     		alert("object is null");
//     	}
//     params = "password="+password;
//     obj.open("POST","../../includes/checkpassword.php",true);
//     obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// 	obj.setRequestHeader("Content-length", params.length);
// 	obj.setRequestHeader("Connection", "close");
//     obj.send(params);
// 	}
// }

