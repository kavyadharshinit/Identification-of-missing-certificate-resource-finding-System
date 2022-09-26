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
<title></title>
</head>
<body>
<div id="total">
<img src="images/banner.jpg" width="895" height="162" style="animation-direction:alternate;" />
<table width="100%" border="0">
  <tr>
    <td align="right" ><strong>
    <a href="chating.php"><img src="images/live-chat-icon.png" width="117" height="60"/></a></strong></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td>
   <div id='cssmenu'>
<ul>
   <li class='current'><a href='stmat.php'><span>File verification</span></a></li>
   <li><a href='stlogout.php'><span>Logout</span></a></li>
</ul>
</div>
    </td>
  </tr>
</table>
<table width="100%" id="dataTable" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%"><p align="center">&nbsp;</p> 
     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search....">
	 	 <table width="100%" cellpadding="0" cellspacing="20" align="center" id="myTable">
       <br /><br />
		 <tr>		
          <td width="17%" align="center"><strong>Name</strong></td>
		   <td width="18%" align="center"><strong>MobileNo</strong></td>
		    <td width="19%" align="center"><strong>Institution</strong></td>
			<td width="19%" align="center"><strong>CertificateNo</strong></td>
			<td width="25%" align="center"><strong>Description</strong></td>
		   <td width="25%" align="center"><label for="username"><strong>FileLink</strong></label></td>
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
          <td align="center"><?php echo $row->mat_name; ?></td>
		  <td align="center"><?PHP echo $row->mat_mob; ?></td>
		  <td align="center"><?PHP echo $row->mat_ins; ?></td>
		   <td align="center"><?PHP echo $row->mat_certno; ?></td>
		   <td align="center"><?PHP echo $row->mat_desc; ?></td>
		  <td align="center"><a href="uploads/materials/<?php echo $row->mat_file; ?>" style="color:black; text-decoration:none">
         <?php echo $row->mat_file; ?> </a></td>
		</tr>
<?php } ?>     
 </table><br/>
     <?php  echo pagination($statement,$limit,$page);?>
      </td>
    </tr> 
  <tr>
    <td></td>
  </tr> 
</table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>

