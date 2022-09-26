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
<img src="images/banner.png" width="895" height="157" style="animation-direction:alternate;" />
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
   <li ><a href='stmat.php'><span>Materials</span></a></li>
   <li><a href='stvid.php'><span>Video</span></a></li>
   <li ><a href='staud.php'><span>Audio</span></a></li>
   <li ><a href='stquiz.php'><span>Quiz</span></a></li>
    <li class='current'  ><a href='results.php' onclick="reds()"><span>Results</span></a></li>
    <li ><a href='stdigital.php'><span>Digital Pad</span></a></li>
   <li><a href='stlive.php'><span>Live Straeam</span></a></li>
   <li><a href='stlogout.php'><span>Logout</span></a></li>
</ul>
</div>

    </td>
  </tr>
</table>

<table width="100%" border="0" style="margin-top:50px;" >
<form action="results.php" method="post" enctype="multipart/form-data" name="admindes" >
  <tr>
    <td  align="center"><input name="chkans" id="chkans" type="submit" value="Check Answer" style="background-color:rgb(0,153,0)" /></td>
  </tr>
  </form>
</table>

<br /><br />

<?php if(isset($_REQUEST['chkans'])) { 
$frt="Truncate quiztype";
mysql_query($frt);
?>
<input type="text" name="textbo" id="checkbox" size="3" style="background-color:rgb(204,153,0); ;"/>
<label for="checkbox">Student Answer 
  <input type="text" name="checkbox2" size="3" id="checkbox2" style="background-color:rgb(0,204,0)" />
Correct Answer </label>
<table width="100%" border="0" style="background-color:#000; color:#FFFFFF" cellpadding="0" cellspacing="0" >
  <?php 

  $viw = "SELECT * FROM student_test where stud_name = '".$_SESSION['uname']."' order by sttest_id  Desc "; 
 
  //echo $viw;
  $gh = mysql_query($viw);
  while($tyt = mysql_fetch_object($gh)) {
  
  ?>
  <tr>
    <td width="0%" height="39" align="center">&nbsp;</td>
    <td colspan="2" align="center"><?php echo $tyt->question; ?></td>
    <td width="1%" rowspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="33" align="center" style="color:#CC9966">&nbsp;</td>
    <td width="81%" align="center" style="color:#CC9966;"><p style="margin-left:160px;"><?php echo $tyt->studans; ?> </p></td>
    <td width="18%" align="center" style="color:#CC9966">
    <?php if($tyt->studans == $tyt->corans) { ?>
    <img src="images/right.png" /> <?php } else {  ?> 
    <img src="images/wrong-icon5.gif" /> <?php } ?></td>
    </tr>
  <tr>
    <td align="center" style="color:#00CC00">&nbsp;</td>
    <td colspan="2" align="center" style="color:#00CC00"><?php echo $tyt->corans; ?></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="center"><hr /></td>
    </tr>
 
  <?php } } ?>
</table>


</div>
</body>
</html>

<?php 

$sql = "SELECT sum(mark) AS scores, count(sttest_id) AS totalQues FROM student_test
where stud_name = '".$_SESSION['uname']."' ";

$frtsd = mysql_query($sql);

$rows=mysql_fetch_object($frtsd);

$totques = $rows->totalQues;

$scores = $rows->scores;



?>
<script type="text/javascript">

		function res(){
			
			alert("Your score is <?php echo $scores ?> out of <?php echo $totques ?>"); 
		}
			
		</script>

<?php 

$sql = "SELECT sum(mark) AS scores, count(sttest_id) AS totalQues FROM student_test
where stud_name = '".$_SESSION['uname']."' ";

$frtsd = mysql_query($sql);

$rows=mysql_fetch_object($frtsd);

$totques = $rows->totalQues;

$scores = $rows->scores;



?>

<script type="text/javascript">
	
		function res(){
			
			alert("Your score is <?php echo $scores ?> out of <?php echo $totques ?>"); 
			

}
			
		</script>

