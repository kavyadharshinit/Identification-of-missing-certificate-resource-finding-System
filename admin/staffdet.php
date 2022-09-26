<?php  
ob_start();
session_start();
include_once "../database/dbconnect.php";
include "../function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="stylesheet/mystyle.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/menu.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Pagination-->

<link rel="stylesheet" type="text/css" href="stylesheet/pagination/grey.css" />
<link rel="stylesheet" type="text/css" href="stylesheet/pagination/pagination.css" />
<title>File verification system</title>
</head>

<body>
<div id="total">
<img src="images/banner.jpg" width="895" height="157" style="animation-direction:alternate;" />
<table width="100%" border="0">
  <tr>
    <td align="right" >&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li class="current"><a href='staffdet.php'>UploadUser</a></li>
   <li><a href='studentdet.php'><span>DownloadUser</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
 
</ul>
</div>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p>      
      <table width="100%" border="1" cellpadding="0" cellspacing="0" align="center" style="background-color:#000000; color:#FFFFFF">
        <tr style="background-color:rgb(204,51,0)">
          <td width="13%" height="30" align="center"><strong>Name</strong></td>
          <td width="21%" align="center"><strong>Mobile No</strong></td>
          <td width="21%" align="center"><strong>Email ID</strong></td>
          </tr>
               <?php 
   $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit =3;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`staff_register` ";
  $viw = "SELECT * FROM {$statement} order by reg_id Desc LIMIT {$startpoint},{$limit}";
 //echo $viw;
  $gh = mysql_query($viw);
  while($row = mysql_fetch_object($gh)) {
  
  ?>
        <tr>
          <td height="41" align="center"><?php echo $row->reg_name; ?></td>
          <td align="center"><?php echo $row->reg_mobno; ?></td>
          <td align="center"><?php echo $row->reg_email; ?></td>
          <!--<td align="center"><?php echo $row->reg_sub1; ?></td>
          <td align="center"><?php echo $row->reg_sub2; ?></td>-->
        </tr>
<?php } ?>     
 </table><br />
     <?php  echo pagination($statement,$limit,$page);?>

      </td>
    </tr>
 
  <tr>
    <td></td>
  </tr>
 
</table>

</div>
</body>
</html>

<?php 

if(isset($_REQUEST['submit'])){
	
	if($_POST['username'] == "staff" && $_POST['password'] == "staff") {
		
		echo "<script type='text/javascript'> alert('Successfully Login'); </script>";
		
		echo "<meta http-equiv='refresh' content='0;url=stfindex.php'>";
	
	}
	
	else{
		
			echo "<script type='text/javascript'> alert('Invalid Username & Password'); </script>";
	}
	
}

?>