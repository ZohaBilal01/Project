<?php
	include('../../database/hoc/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $proposal_dates_id = $_GET['dates_id'];
    mysqli_query($con,"delete from dates where dates_id='$proposal_dates_id'");
    header('location: setproposal_date.php');	
?>
