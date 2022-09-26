<?php  
ob_start();
session_start();
include_once "database/dbconnect.php";

if($_GET['Mode'] =="Edit") {
	$sqlup="Select * from assign_det
	where as_id='".$_REQUEST['id']."' ";
	//echo $sqlup;
	//exit;
	$we=mysql_query($sqlup);
	$res=mysql_fetch_object($we);
}

if($_GET['Mode'] =="Delete") {
	$sqldel="Delete from assign_det
	where as_id='".$_REQUEST['id']."' ";
	//echo $sqldel;
	//exit;
	mysql_query($sqldel);
	
    
	echo "<meta http-equiv='refresh' content='0;url=assview.php'>";
	} 
	
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
<img src="images/banner.png" width="895" height="157" style="animation-direction:alternate;" />
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
   <li ><a href='stmat.php'><span>Materials</span></a></li>
   <li><a href='stvid.php'><span>Video</span></a></li>
   <li><a href='staud.php'><span>Audio</span></a></li>
   <li class='current'><a href='stassign.php'><span>Assignment</span></a></li>
   <li ><a href='stquiz.php'><span>Quiz</span></a></li>
    <li ><a href='stdigital.php'><span>Digital Pad</span></a></li>
   <li><a href='stlive.php'><span>Live Straeam</span></a></li>
   <li><a href='stlogout.php'><span>Logout</span></a></li>
</ul>
</div>

    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p>      
      <table width="100%" border="0" cellpadding="5" align="center" style="background-color:#000000; color:#FFFFFF">
      <form action="stupload.php" method="post" enctype="multipart/form-data" name="admindes">
        <tr>
          <td colspan="2" align="left"><p style="font-size:18px; ">&nbsp;</p></td>
        </tr>
        <tr>
          <td width="46%" align="right">Date :</td>
          <td width="54%"><label for="username"></label>
            <input type="text" name="assdate" id="assdate" 
             value="<?php if($_GET['id'] < '0') { echo date('d-m-Y'); } 
			else { echo $res->as_date; } ?>"  /></td>
        </tr>
        <tr>
          <td align="right">Topic :</td>
          <td><label for="username2"></label>
            <label for="matfile"></label>
            <input type="text" name="topic" id="topic" readonly="readonly" 
             value="<?php echo $res->as_topic;  ?>"  /></td>
          </tr>
        <tr>
          <td align="right">Completion Date :</td>
          <td><label for="username"></label>
            <input type="text" name="compdate" id="compdate" readonly="readonly" 
             value="<?php if($_GET['id'] < '0') { echo date('d-m-Y'); } 
			else { echo $res->as_compdate; } ?>"  /></td>
          </tr>
        <tr>
          <td align="right">Assignment :</td>
          <td><label for="username"></label>
            <label for="assfile"></label>
            <input type="file" name="assfile" id="assfile" /></td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="hidden" name="id" id="id" value="<?php echo $res->as_id; ?>" />
            <input type="submit" name="submit" id="submit" value="Submit" style="background-color:rgb(0,102,255)" /></td>
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

<?php 

if(isset($_REQUEST['submit'])){
	
	
	$sql = "Select * from assign_det";
	$de=mysql_query($sql);
	$frts=mysql_fetch_object($de);
	
	$subdate = $frts->as_compdate;
	
	$subdate = explode("-",$subdate);
    $submitdate = $subdate[0].$subdate[1].$subdate[2].'<br>';
	
	$yourdate = explode("-",$_POST['assdate']);
    $studdate = $yourdate[0].$yourdate[1].$yourdate[2];
	//echo $yourdate;
	//
	//echo $yourdate;
	
	//exit;
	
	if($submitdate < $studdate) { echo '<script type="text/javascript">alert("Your Date Is Expired");</script>'; 
	echo '<meta http-equiv="refresh" content="0,url=stupload.php">';
	} 
	
   else{
	
	$add="INSERT INTO stud_assign(stass_date,stud_name,stass_topic,stass_compdate,stass_file)
	VALUES ('".$_POST['assdate']."','".$_SESSION['uname']."' ,'".$_POST['topic']."' ,
	'".$_POST['compdate']."' ,'".$_FILES['assfile']['name']."' )";    
	
      move_uploaded_file($_FILES['assfile']['tmp_name'],"uploads/assignment/".$_FILES['assfile']['name']);
	
	//echo $add;
	//exit;
	
	mysql_query($add);
	header('location:stupload.php');

}}

?>
	
	
	