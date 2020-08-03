<?php
	include('../../database/admin/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $faculty_id= $_GET['faculty_id'];
    $query="SELECT * from faculty where faculty_id='$faculty_id'";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	if($count > 0) 
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$username=$row['username'];
			$email=$row['email'];
			$contact=$row['contact'];
			$domain=$row['domain'];
		}
    }
	$username=$_POST['username'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $domain=$_POST['domain'];

     mysqli_query($con,"update faculty set  username='$username',email='$email',contact='$contact',domain='$domain' where faculty_id='$faculty_id'");
	   header('location: facultydetail.php');	
?>
