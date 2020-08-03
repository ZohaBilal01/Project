<?php
	include('../../database/ec/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $evaluate_phase2_id = $_GET['evaluate_phase2_id'];
    mysqli_query($con,"delete from evaluate_phase2 where group_id='$evaluate_phase2_id'");
    header('location: ph2_report.php');	
?>
