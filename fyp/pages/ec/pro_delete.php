<?php
	include('../../database/ec/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $evaluate_proposal_id = $_GET['evaluate_proposal_id'];
    mysqli_query($con,"delete from evaluate_proposal where group_id='$evaluate_proposal_id'");
    header('location: pro_report.php');	
?>
