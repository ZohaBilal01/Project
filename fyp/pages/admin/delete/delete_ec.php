<?php
	include('../../database/admin/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $user_id = $_GET['user_id'];
    $access = 4;
    mysqli_query($con,"delete from register where user_id='$user_id' and access='$access'");
    header('location: ../ecdetail.php');	
?>
