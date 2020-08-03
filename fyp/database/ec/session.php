<?php
	session_start();
    $con = mysqli_connect('localhost', 'root', '','hardwork');
	
	if (!isset($_SESSION['user_id']) ||(trim ($_SESSION['user_id']) == '')) {
	header('location:../../index.php');
    exit();
	}
	$query=mysqli_query($con,"select * from register where user_id='".$_SESSION['user_id']."'");
	$row=mysqli_fetch_array($query);
		
	if ($row['access']!=4)
    {
		header('location:../../index.php');
		exit();
	}
	$username=$row['username'];
?>