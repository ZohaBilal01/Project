<?php
	session_start();
    $con = mysqli_connect('localhost', 'root', '','hardwork');
	
	if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
	header('location:../../index.php');
    exit();
	}
	$sq=mysqli_query($con,"select * from register where user_id='".$_SESSION['user_id']."'");
	$srow=mysqli_fetch_array($sq);
		
	if ($srow['access']!=1){
		header('location:../../index.php');
		exit();
	}
	$username=$srow['username'];
?>