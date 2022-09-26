<?php  
ob_start();
session_start();
include_once "database/dbconnect.php";
?>
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
    <td align="right" ><strong>
    <a href="chat.php"><img src="images/live-chat-icon.png" width="117" height="48"/></a></strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li ><a><span>Upload</span></a></li>
   <li ><a><span>Download</span></a></li>
   <li class='current'><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p>      
      <table width="100%" border="0" cellpadding="5" align="center" style="background-color:#000000; color:#FFFFFF">
      <form action="logout.php" method="post" enctype="multipart/form-data" name="admindes">
        <tr>
          <td width="100%" align="left"><p style="font-size:18px; ">&nbsp;</p></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center">&nbsp;</td>
          </tr>
          </form>
      </table>
      </td>
    </tr>
 
  <tr>
    <td></td>
  </tr>
 
</table>
<?php 
//$sql = "TRUNCATE student_test";
//echo $sql;
//exit;
//mysql_query($sql);

?>
</div>
</body>
</html>

<?php 

echo '<script type="text/javascript"> alert("Thank You"); </script>';

echo "<meta http-equiv='refresh' content='0;url=staff.php'>";

?>