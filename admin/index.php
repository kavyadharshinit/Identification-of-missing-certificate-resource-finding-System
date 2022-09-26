<?php  
ob_start();
session_start();
include_once "../database/dbconnect.php"; ?>
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
<img src="images/banner.jpg" width="895" height="157" style="animation-direction:alternate;" />
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
   <li><a href='#'><span>UploadUser</span></a></li>
   <li><a href='#'>DownloadUser</a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
 
</ul>
</div>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><p align="center">&nbsp;</p>      
      <table width="50%" border="0" cellpadding="5" align="center" style="background-color:#000000; color:#FFFFFF">
      <form action="index.php" method="post" enctype="multipart/form-data" name="admindes" 
      onsubmit="return validation(this)">
        <tr>
          <td colspan="2" align="center"><img src="images/admin_login.gif" alt="" width="299" height="71" style="margin-right:-60px;" /></td>
          </tr>
        <tr>
          <td colspan="2" align="right">&nbsp;</td>
          </tr>
        <tr>
          <td width="48%" align="right">Username :</td>
          <td width="51%"><label for="username"></label>
            <input type="text" name="uname" id="uname" /></td>
        </tr>
        <tr>
          <td align="right">Password :</td>
          <td><label for="username2"></label>
            <input type="password" name="pword" id="pword" /></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="submit" id="submit" value="Login"
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
    <td width="51%"><p align="center"><strong>Time Managements Tips to Get Success in Online Learning</strong></p>
      <br />
      <p align="center" style="text-align:justify">Are you an online student and want to learn ways to stay top of your online classes. Online degree programs give students the flexibility to take their classes anytime, anywhere. In order to staying on top of your online education, discipline, commitment, and organization are required. These are the basic traits that any online student must possess in order to get succeed. Online learning involves a dedicated time of independent study and in order to stand out in an online learning course it is very important to incorporate various time management practices into the day. Below are mentioned some of the best time management tips that can help you stay competitive in the online learning. </p></td>
    <td width="3%"><p  style="border-left: 1px solid rgb(102,102,102); margin-left:15px; height:270px;"></p></td>
    <td width="46%"><p align="center"><img src="images/clocks.png" alt="" width="366" height="280" /></p></td>
  </tr>
  <tr>
    <td colspan="3"><hr /></td>
    </tr>
 
</table>

</div>
</body>
</html>

<script type="text/javascript">

document.getElementById('uname').focus();


function validation() {
	
	var frm = document.admindes;
		if(frm.uname.value == "" & frm.pword.value =="") { alert("Please Enter The Username & Password"); frm.uname.focus(); return false }

	if(frm.uname.value =="") { alert("Please Enter the Username."); frm.uname.focus(); return false }
    if(frm.pword.value =="") { alert("Please Enter the Password."); frm.pword.focus(); return false }
	
return true;
}

</script>


<?php
if(isset($_POST['submit']))
{
$_SESSION['uname']=$uname=$_POST['uname'];
$pass=$_POST['pword'];
//echo $sql;
//exit;
$fre=mysql_query($sql);
$count=mysql_num_rows($fre);
//echo $count; exit;
if($uname =="admin" && $pass =="admin")
{
echo "<script type='text/javascript'>alert('Successful Login');</script>";
echo "<meta http-equiv='refresh' content='0;url=staffdet.php'>";
}
else
{
echo "<script type='text/javascript'>alert('Invalid Admin');</script>";
}
}
?>