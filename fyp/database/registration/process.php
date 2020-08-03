<?php
$con = mysqli_connect('localhost', 'root', '','hardwork');
session_start();
function check_input($data) 
{
		$data = trim($data);
		return $data;
}
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
    {
      $_SESSION['error_msg'] = " Registration Failed, Enter Invalid Username Input !"; 
      header('location: ../../register.php');
    }    
    else
    { 
      $password = check_input($_POST["password"]);
      $query=mysqli_query($con,"select * from register where  email='$email' and username='$username'");
      if(mysqli_num_rows($query)==1)
      {
        $_SESSION['error_msg'] = "Account, Already Exist !";
        header('location: ../../register.php');
      }
      else
      {
         if($username =='admin' && $email='admin@cuilahore.edu.pk')
         {
           mysqli_query($con,"insert into register (username, email, password,access,date_created) values ('$username','$email','$password','5',NOW())");
           $_SESSION['msg'] = "Registered Successfully, You can login now !"; 
           header('location: ../../index.php');
         }
         else if($username =='Admin' && $email='Admin@cuilahore.edu.pk')
         {
           mysqli_query($con,"insert into register (username, email, password,access,date_created) values ('$username','$email','$password','5',NOW())");
           $_SESSION['msg'] = "Registered Successfully, You can login now !"; 
           header('location: ../../index.php');
         }
         else
         {
          $access = 2;
          $query=mysqli_query($con,"select * from student where  username='$username' and email='$email'");
         $avi = mysqli_num_rows($query);
          if(mysqli_num_rows($query)==1)
          {
          $query1=mysqli_query($con,"select * from register where username='$username' and email='$email' and access='$access'");
           if(mysqli_num_rows($query1)==1)
           {
            $_SESSION['error_msg'] = " ***** Sorry, Already Registered Against this Credentials ***** ";
            header('location: ../../register.php');
           }
           else
           {
             mysqli_query($con,"insert into register (username, email,password,access,date_created) values ('$username','$email','$password','$access',NOW())");
             $_SESSION['msg'] = "Registered successfully !"; 
             header('location: ../../index.php');
           }
          }
          else
          {
            $_SESSION['error_msg'] = " Not Eligible to Register to this Portal !";
            header('location: ../../register.php');
          }
        }
      }
    }
  }
?>
