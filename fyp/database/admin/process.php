<?php
$con = mysqli_connect('localhost', 'root', '','hardwork');
session_start();
function check_input($data) 
{
		$data = trim($data);
		return $data;
}

if(isset($_POST['faculty']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    $contact=check_input($_POST['contact']);
    $domain=check_input($_POST['domain']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[0-9]*$/",$contact) || !preg_match("/^[a-zA-Z. ]*$/",$domain)) 
    {
       $_SESSION['msg'] = " Registration Failed, Invalid Input !"; 
       header('location: ../../pages/admin/addfaculty.php');
    }    
    else
    { 
      $query=mysqli_query($con,"select * from faculty where  username='$username' and email='$email'");
      if(mysqli_num_rows($query)==1)
      {
        $_SESSION['msg'] = "Account, Already Exist !";
        header('location: ../../pages/admin/addfaculty.php');
      }
      else
      {
        mysqli_query($con,"insert into faculty (username, email,contact,domain,date_created) values ('$username','$email','$contact','$domain',NOW())");
        $_SESSION['msg'] = "Registered Successfully !"; 
        header('location: ../../pages/admin/addfaculty.php');
      }
     }
    }
  }

if(isset($_POST['student']))  
{
  $user_id = $_SESSION['user_id'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    $contact=check_input($_POST['contact']);
    // $cgpa=check_input($_POST['cgpa']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[0-9]*$/",$contact)) 
    {
       $_SESSION['msg'] = " Registration Failed, Invalid Input !"; 
       header('location: ../../pages/admin/addstudent.php');
    }    
    else
    { 
      $query=mysqli_query($con,"select * from student where  username='$username' and email='$email'");
      if(mysqli_num_rows($query)==1)
      {
        $_SESSION['msg'] = "Account, Already Exist !";
        header('location: ../../pages/admin/addstudent.php');
      }
      else
      {
        mysqli_query($con,"insert into student (username, email,contact,date_created) values ('$username','$email','$contact',NOW())");
        $_SESSION['msg'] = "Registered Successfully!"; 
        header('location: ../../pages/admin/addstudent.php');
      }
     }
    }
  }

if(isset($_POST['ec']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $_SESSION['msg'] = " Registration failed, invalid input !"; 
       header('location: ../../pages/admin/addec.php');
    }    
    
  else
  { 
      $password = check_input($_POST["password"]);
      $access = 4;
      $query=mysqli_query($con,"select * from faculty where  username='$username' and email='$email'");
  if(mysqli_num_rows($query)==1)
  {
     $query1=mysqli_query($con,"select * from register where username='$username' and email='$email' and access='$access'");
     if(mysqli_num_rows($query1)==1)
     {
       $_SESSION['msg'] = " ***** Sorry, Already Registered against this Credentials ***** ";
        header('location: ../../pages/admin/addec.php');
     }
     else
     {
         mysqli_query($con,"insert into register (username, email,password,access,date_created) values ('$username','$email','$password','$access',NOW())");
     $_SESSION['msg'] = "Registered successfully!"; 
     header('location: ../../pages/admin/addec.php');

     }
  }
  else
  {
   $_SESSION['msg'] = " Not Exist in Faculty !";
   header('location: ../../pages/admin/addec.php');
  }
  }
  }
 }

if(isset($_POST['supervisor']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $_SESSION['msg'] = " Registration Failed, Invalid Input !"; 
       header('location: ../../pages/admin/addsupervisor.php');
    }    
    
  else
  { 
      $password = check_input($_POST["password"]);
      $access = 3;
      $query=mysqli_query($con,"select * from faculty where  username='$username' and email='$email'");
     if(mysqli_num_rows($query)==1)
     {
     $query1=mysqli_query($con,"select * from register where username='$username' and email='$email' and access='$access'");
     if(mysqli_num_rows($query1)==1)
     {
       $_SESSION['msg'] = " ***** Sorry, Already Registered against this Credentials ***** ";
        header('location: ../../pages/admin/addsupervisor.php');
     }
      else
     {
         mysqli_query($con,"insert into register (username, email,password,access,date_created) values ('$username','$email','$password','$access',NOW())");
     $_SESSION['msg'] = "Registered successfully!"; 
     header('location: ../../pages/admin/addsupervisor.php');

     }
  }
  else
  {
   $_SESSION['msg'] = " Not Exist in Faculty !";
   header('location: ../../pages/admin/addsupervisor.php');
  }
  }
  }
 }

if(isset($_POST['hoc']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username) || !filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $_SESSION['msg'] = " Registration failed, invalid input !"; 
       header('location: ../../pages/admin/addhoc.php');
    }    
    
  else
  { 
      $password = check_input($_POST["password"]);
      $query=mysqli_query($con,"select * from faculty where  username='$username' and email='$email'");
  if(mysqli_num_rows($query)==1)
  {
     $access = 1;
     $query1=mysqli_query($con,"select * from register where  access='$access'");
     if(mysqli_num_rows($query1)==1)
     {
         $_SESSION['msg'] = "  Allowed only 1 Head of Committee Account  !";
         header('location: ../../pages/admin/addhoc.php');
     }
     else
     {
         mysqli_query($con,"insert into register (username, email,password,access,date_created) values ('$username','$email','$password','$access',NOW())");
         $_SESSION['msg'] = "Registered successfully!"; 
         header('location: ../../pages/admin/addhoc.php');
     }
  }
  else
  {
   $_SESSION['msg'] = " Not Exist in Faculty !";
   header('location: ../../pages/admin/addhoc.php');
  }
  }
 }
}
?>
