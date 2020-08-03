   <?php 
    session_start();
	$con = mysqli_connect('localhost', 'root', '','hardwork');
	function check_input($data) {
		$data = trim($data);
		return $data;
	}
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
      $email=check_input($_POST['email']);
      $password = check_input($_POST["password"]);
      $query=mysqli_query($con,"select * from register where email='$email' and password='$password'");  
      
       if(mysqli_num_rows($query)==0)
       {
         $_SESSION['msg'] = "Login Failed, User Not Exist !";
         header('location: ../../index.php');
       }
       else
       {
			$row=mysqli_fetch_array($query);
			if ($row['access']==1)
         {
				$_SESSION['user_id']=$row['user_id'];
				?>
				<script>
					window.alert('Login Successfully, Welcome to Head Of Committee!');
					window.location.href='../../pages/hoc/hoc.php';
				</script>
				<?php
         }
            else if ($row['access']==2)
         {
				$_SESSION['user_id']=$row['user_id'];
				?>
				<script>
					window.alert('Login Successfully, Welcome Student!');
					window.location.href='../../pages/student/student.php';
				</script>
				<?php
         }
            else if ($row['access']==3)
         {
				$_SESSION['user_id']=$row['user_id'];
				?>
				<script>
					window.alert('Login Successfully, Welcome to Supervisor!');
					window.location.href='../../pages/supervisor/supervisor.php';
				</script>
				<?php
         }
            else if ($row['access']==4)
         {
				$_SESSION['user_id']=$row['user_id'];
				?>
				<script>
					window.alert('Login Successfully, Welcome to Evaluation Committee!');
					window.location.href='../../pages/ec/ec.php';
				</script>
				<?php
         }
            else if ($row['access']==5)
         {
				$_SESSION['user_id']=$row['user_id'];
				?>
				<script>
					window.alert('Login Successfully, Welcome to Admin!');
					window.location.href='../../pages/admin/admin.php';
				</script>
				<?php
          }
		 }
       }
   ?>