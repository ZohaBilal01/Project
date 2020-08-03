<?php
	include('../../database/ec/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $evaluate_phasse1_id = $_GET['evaluate_phase1_id'];
    mysqli_query($con,"delete from evaluate_phase1 where group_id='$evaluate_phasse1_id'");
    header('location: ph1_report.php');	
?>
