<?php  
ob_start();
session_start();
include_once "database/dbconnect.php";
include "function.php";
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
    <td align="right" ><strong>
    <a href="chating.php"><img src="images/live-chat-icon.png" width="117" height="48"/></a></strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li ><a href='stmat.php'><span>File verification</span></a></li>
   <li class='current'><a href='stlogout.php'><span>Logout</span></a></li>
</ul>
</div>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p>      
      <table width="100%" border="1" cellpadding="0" cellspacing="0" align="center" style="background-color:#000000; color:#FFFFFF">
        <tr>
          <td colspan="2" align="left"><p style="font-size:18px; ">&nbsp;</p></td>
        </tr>
        <tr style="background-color:rgb(204,51,0)">
          <td width="46%" align="center"><strong>Name</strong></td>
          <td width="54%" align="center"><label for="username"><strong>File</strong></label></td>
        </tr>
               <?php 
   $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit =3;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`study_mat` ";
  $viw = "SELECT * FROM {$statement} order by mat_id Desc LIMIT {$startpoint},{$limit}";
 //echo $viw;
  $gh = mysql_query($viw);
  while($row = mysql_fetch_object($gh)) {
  
  ?>
        <tr>
          <td height="39" align="center"><?php echo $row->mat_name; ?></td>
          <td align="center"><a href="uploads/materials/<?php echo $row->mat_file; ?>" style="color:#FFF; text-decoration:none">
          <?php echo $row->mat_file; ?> </a></td>
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


		
		echo "<script type='text/javascript'> alert('Thank You !'); </script>";
		
		echo "<meta http-equiv='refresh' content='0;url=student.php'>";
	
	

?>