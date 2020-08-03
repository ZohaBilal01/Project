<?php
	include('../../database/admin/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $faculty_id = $_GET['faculty_id'];
    mysqli_query($con,"delete from faculty where faculty_id='$faculty_id'");
    header('location: ../facultydetail.php');	
?>
