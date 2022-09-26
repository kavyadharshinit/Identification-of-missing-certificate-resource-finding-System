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
<title>File Verification System</title>
</head>

<body>
<div id="total">
<img src="images/banner.png" width="895" height="157" style="animation-direction:alternate;" />
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
   <li ><a href='stfindex.php'><span>Study Materials</span></a></li>
   <li><a href='video.php'><span>Video</span></a></li>
   <li><a href='audio.php'><span>Audio</span></a></li>
   <li ><a href='quiz.php'><span>Quiz</span></a></li>
      <li ><a href='quizres.php'><span>Quiz Results</span></a></li>
       <li ><a href='assignment.php'><span>Assignment</span></a></li>
         <li class='current' ><a href='stfiles.php'><span>Files</span></a></li>
           <li ><a href='http://www.way2sms.com'><span>Sms</span></a></li>
       <li ><a href='digital.php'><span>Digital Pad</span></a></li>
   <li><a href='live.php'><span>Live Straeam</span></a></li>
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
        <tr>
          <td colspan="4" align="left"><p style="font-size:18px; ">&nbsp;</p></td>
        </tr>
        <tr style="background-color:rgb(204,51,0)">
          <td width="22%" align="center"><strong>Student</strong></td>
          <td width="23%" align="center"><strong>Submited Date</strong></td>
          <td width="28%" align="center"><strong>Completion Date</strong></td>
          <td width="27%" align="center"><label for="username"><strong>File</strong></label></td>
        </tr>
               <?php 
   $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit =3;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`stud_assign` ";
  $viw = "SELECT * FROM {$statement} order by stass_id Desc LIMIT {$startpoint},{$limit}";
 //echo $viw;
  $gh = mysql_query($viw);
  while($row = mysql_fetch_object($gh)) {
  
  ?>
        <tr>
          <td height="39" align="center"><?php echo $row->stud_name; ?></td>
          <td align="center"><?php echo $row->stass_date; ?></td>
          <td align="center"><?php echo $row->stass_compdate; ?></td>
          <td align="center"><a href="uploads/assignment/<?php echo $row->stass_file; ?>" style="color:#FFF; text-decoration:none">
            <?php echo $row->stass_file; ?> </a></td>
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