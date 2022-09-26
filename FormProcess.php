<?php 
session_start();
ob_start();
include_once "database/dbconnect.php";

switch($_REQUEST['Submit']) {
	
	
	
	
	
case "matSubmit" : 

$add="INSERT INTO study_mat(mat_name,mat_mob,mat_ins,mat_certno,mat_file,mat_desc)
	VALUES ('".$_POST['matname']."','".$_POST['matmob']."','".$_POST['matins']."','".$_POST['matcertno']."','".$_FILES['matfile']['name']."','".$_POST['matdesc']."')";    
	
	
	move_uploaded_file($_FILES['matfile']['tmp_name'],"uploads/materials/".$_FILES['matfile']['name']);
	

	
	//echo $add;
	//exit;
	
	mysql_query($add);
	
	header('location:stfindexview.php');

break;



}
?>