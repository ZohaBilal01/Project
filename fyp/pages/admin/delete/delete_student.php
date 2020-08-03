<?php
	include('../../database/admin/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $student_id = $_GET['student_id'];

    mysqli_query($con,"delete from student where student_id='$student_id'");
    header('location: ../addstudentdetail.php');	
?>
