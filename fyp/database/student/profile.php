<?php
	include('session.php');
    if(isset($_POST['update']))
    {
	$password=$_POST['password'];
	$query=mysqli_query($con,"select * from `register` where user_id='".$_SESSION['user_id']."'");
	$row=mysqli_fetch_array($query);	
	if($password==$row['password'])
    {
      $newpassword=$password;
    }
    else
    {
			$newpassword=$password;
    }
     mysqli_query($con,"update `register` set  password='$newpassword' where user_id='".$_SESSION['user_id']."'");
	   header('location: ../../pages/student/student.php');	
    }
?>
