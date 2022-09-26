<?php  
ob_start();
session_start();
include_once "database/dbconnect.php";

if($_GET['Mode'] =="Edit") {
	$sqlup="Select * from study_mat
	where mat_id='".$_REQUEST['id']."' ";
	//echo $sqlup;
	//exit;
	$we=mysql_query($sqlup);
	$res=mysql_fetch_object($we);
}

if($_GET['Mode'] =="Delete") {
	$sqldel="Delete from study_mat
	where mat_id='".$_REQUEST['id']."' ";
	//echo $sqldel;
	//exit;
	mysql_query($sqldel);
	
    
	echo "<meta http-equiv='refresh' content='0;url=stfindexview.php'>";
	} 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stylesheet/mystyle.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/menu.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FILE VERIFICATION</title>
</head>

<body>
<div id="total">
<img src="images/banner.jpg" width="895" height="157" style="animation-direction:alternate;" />
<table width="100%" border="0">
  <tr>
    <td align="right" ><strong>
    <a href="chat.php"><img src="images/live-chat-icon.png" width="117" height="48"/></a></strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li class='current'><a href='stfindex.php'><span>File submission</span></a></li>  
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>


    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p>      
      <table width="100%" border="0" cellpadding="5" align="center" style="background-color:#000000; color:#FFFFFF">
      <form action="FormProcess.php" method="post" enctype="multipart/form-data" name="admindes">
        <tr>
          <td colspan="2" align="left"><p style="font-size:18px; ">
          <a href="stfindexview.php" style="text-decoration:none;color:rgb(255,0,0)"><img src="images/viewicon.png" width="44" height="45" />View</a></p></td>
        </tr>
        <tr>
          <td width="46%" align="right">Name :</td>
          <td width="54%">
            <input type="text" name="matname" id="matname"/></td>
        </tr>
		 <tr>
          <td width="46%" align="right">Mobile No :</td>
          <td width="54%">
            <input type="text" name="matmob" id="matmob"/></td>
        </tr>
		 <tr>
          <td width="46%" align="right">Institution :</td>
          <td width="54%">
            <input type="text" name="matins" id="matins"/></td>
        </tr>
		 <tr>
          <td width="46%" align="right">Certificate No :</td>
          <td width="54%">
            <input type="text" name="matcertno" id="matcertno"/></td>
        </tr>
        <tr>
          <td align="right">File Upload :</td>
          <td>
            <label for="matfile"></label>
            <input type="file" name="matfile" id="matfile" /></td>
        </tr>
        <tr>
		<tr>
          <td align="right">Description :</td>
          <td><label for="username2"></label>
            <label for="desc"></label>
            <textarea name="matdesc" id="matdesc" cols="35" rows="5"></textarea></td>
        </tr>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" align="center"><input type="hidden" name="id" id="id" value="<?php echo $res->mat_id; ?>" />
            <input type="submit" name="<?php if($_GET['Mode'] =="Edit") { echo "Update"; } else { echo "Submit"; } ?>" id="submit" 
    value="<?php if($_GET['Mode'] =="Edit") { echo "Update"; } else { echo "Submit"; } ?>" style="background-color:#00CCFF; width:90px;" />
            <input type="hidden" name="Submit" id="Submit" value="<?php if($_GET['Mode'] == "Edit") { echo "matUpdate"; } else {
		echo "matSubmit"; }  ?>" /></td>
        </tr>
        <tr>
          <td colspan="3" align="center">&nbsp;</td>
          </tr>
          </form>
      </table>
      </td>
    </tr>
 
  <tr>
    <td></td>
  </tr>
 
</table>

</div>
</body>
</html>



