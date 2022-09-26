<?php  
ob_start();
session_start();
include_once "database/dbconnect.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stylesheet/mystyle.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/menu.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File verification system</title>
</head>

<body>
<div id="total">
<table width="100%" border="0">
  <tr>
    <td ><strong></strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li><a href='index.php'><span>Home</span></a></li>
    <li class='current'><a href='staff.php'><span>Upload</span></a></li>
   <li><a href='student.php'><span>Download</span></a></li>
</ul>
</div>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><p align="center">&nbsp;</p>      
      <table width="50%" border="0" cellpadding="5" align="center" style="background-color:#000000; color:#FFFFFF">
      <form action="stfregister.php" method="post" enctype="multipart/form-data" name="admindes" 
      onsubmit="return validation(this)">
        <tr>
          <td colspan="2" align="center"><img src="images/registration_icon.gif" alt="" width="164" height="131" style="margin-right:-60px;" /></td>
          </tr>
        <tr>
          <td align="right">Name :</td>
          <td><label for="username"></label>
            <input type="text" name="names" id="names" /></td>
        </tr>
        <tr>
          <td width="48%" align="right">Mobile No:</td>
          <td width="51%"><label for="username"></label>
            <input type="text" name="mobno" id="mobno" /></td>
        </tr>
        <tr>
          <td width="48%" align="right">Email :</td>
          <td width="51%"><label for="username"></label>
            <input type="text" name="email" id="email" /></td>
          </tr>
		 <tr>
          <td width="48%" align="right">Username :</td>
          <td width="51%"><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
          </tr>
        <tr>
          <td align="right">Password :</td>
          <td><label for="username2"></label>
            <input type="password" name="password" id="password" /></td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="submit" id="submit" value="Register"
           style="background-color:#00CCFF; width:90px;" /></td>
        </tr>
        <tr>
          <td colspan="3" align="center">&nbsp;</td>
        </tr>
          </form>
      </table>
      <p align="center">&nbsp;</p></td>
    </tr>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
    <td width="51%"><p align="center"><strong>FILE VERIFIATION SYSTEM</strong></p>
      <br />
      <p align="center" style="text-align:justify">To manage all the transactions proposed herewith a web application solution which will take care all the necessary user missing files transactions. On implementation of this application it will help them in many ways. </p></td>
    <td width="3%"><p  style="border-left: 1px solid rgb(102,102,102); margin-left:15px; height:270px;"></p></td>
    <td width="46%"><p align="center"><img src="images/file.png" alt="" width="366" height="280" /></p></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
    </tr>
 
</table>

</div>
</body>
</html>
<script type="text/javascript">

document.getElementById('names').focus();


function validation() {
	
	var frm = document.admindes;
	
	if(frm.names.value =="") { alert("Please Enter the Name."); frm.names.focus(); return false }
		if(frm.mobno.value =="") { alert("Please Enter the Mobile No."); frm.mobno.focus(); return false }
			if(frm.email.value =="") { alert("Please Enter the Email."); frm.email.focus(); return false }
			if(frm.username.value =="") { alert("Please Enter the Username."); frm.username.focus(); return false }
             if(frm.password.value =="") { alert("Please Enter the Password."); frm.password.focus(); return false }
	

	
	
	return true;
}

</script>


<?php 

if(isset($_REQUEST['submit'])){
	
	$sql="Insert into staff_register(reg_name,reg_mobno,reg_email,reg_uname,reg_pword)
	values('".$_REQUEST['names']."','".$_REQUEST['mobno']."','".$_REQUEST['email']."',
'".$_REQUEST['username']."','".$_REQUEST['password']."')";

//echo $sql;
//exit;

mysql_query($sql);

echo '<script type="text/javascript">alert("Registered Successfully");</script>';

echo '<meta http-equiv="refresh" content="0,url=staff.php">';

}
?>