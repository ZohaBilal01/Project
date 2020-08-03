<?php
include('session.php');
$con = mysqli_connect('localhost', 'root', '','hardwork');
function check_input($data) 
{
		$data = trim($data);
		return $data;
}
 if(isset($_POST['add']))
 {
   $user_id = $_SESSION['user_id'];
   if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      $title=check_input($_POST['project_title']);
      $description=check_input($_POST['project_description']);
      if(!preg_match("/^[a-zA-Z ]*$/",$title) || !preg_match("/^[a-zA-Z0-9. ]*$/",$description)) 
      {
         $_SESSION['group_msg'] = " Error, Enter Invalid Inputs !"; 
         header('location: ../../pages/student/group.php');
      }
      else
      {
      $query_due_date=mysqli_query($con,"select * from dates");
      while($row=mysqli_fetch_array($query_due_date))
      {
         $start_date = $row['startdate'];
         $end_date =  $row['enddate'];
      }
      $st_date = date('Y-m-d',(strtotime($start_date))); 
      $due_date = date('Y-m-d',(strtotime($end_date))); 
      if($st_date != " " && $due_date != " ")
      {
        $current_date = date('Y-m-d',(strtotime('now')));
        if( $current_date <= $due_date)
        {
           $query=mysqli_query($con,"select * from groupp where project_title='$title' and project_description='$description'");
           if(mysqli_num_rows($query)!=1 )
           {
              $query1=mysqli_query($con,"select * from member where  member.user_id='$user_id'");
              if(mysqli_num_rows($query1)!=1)
              {
                  mysqli_query($con,"insert into groupp (project_title,project_description,date_created,user_id) values('$title','$description',NOW(),'$user_id')");
                  $group_id=mysqli_insert_id($con);
                  mysqli_query($con,"insert into member (group_id,user_id,date_added) values ('$group_id','$user_id',NOW())");
                  $_SESSION['group_msg'] = "Record Insert Successfully, You May proceed to next step !";
                  header('location: ../../pages/student/group.php');
               }
               else
               {
                  $_SESSION['group_msg'] = " ***** Sorry, Not Allowed ***** ";
                  header('location: ../../pages/student/group.php');
                }
            }
            else
            {
                  $_SESSION['group_msg'] = " ***** Error, Project Already Registered or Project Description Already Exist ***** ";
                  header('location: ../../pages/student/group.php');
            }
         }
         else
         {
            $_SESSION['group_msg'] = " ***** Error, Check Dates Table  ! ***** ";
            header('location: ../../pages/student/group.php');   
         }
       }
       else
       {
          $_SESSION['group_msg'] = " ***** Error, Check Dates Table ! ***** ";
          header('location: ../../pages/student/group.php');   
       }
    }
   }
 }


if(isset($_POST['addmember']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $user_id = $_SESSION['user_id'];
    $group_id = "";                                  
    $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
    while($row=mysqli_fetch_array($query_get_group_id))
    {
        $group_id = $row['group_id'];                                       /* GET GROUP_ID */
    }
    $username=check_input($_POST['username']);
    $email=check_input($_POST['email']);
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
    {
      $_SESSION['member_msg'] = " Registration Failed, Enter Invalid Username Input !";  
      header('location: ../../pages/student/addmember.php');                /* CHECK FORM VALIDATIONS */
    }    
    else
    {  
      $password = check_input($_POST["password"]);
      $query_due_date=mysqli_query($con,"select * from dates");
      while($row=mysqli_fetch_array($query_due_date))
      {
        $start_date = $row['startdate'];
        $end_date =  $row['enddate'];                                      /* CHECK DATES VALIDATIONS */
      }
      $st_date = date('Y-m-d',(strtotime($start_date))); 
      $due_date = date('Y-m-d',(strtotime($end_date))); 
      $current_date = date('Y-m-d',(strtotime('now')));
      if($st_date!="" && $due_date!="")
      {
        if( $current_date <= $due_date)
        {
          $access = 2;
          $query=mysqli_query($con,"select * from register where  email='$email' and password='$password' and access='$access'");
          if(mysqli_num_rows($query)!=1)                                   /* CHECK STUDENT EXIST IN REGISTER CREATED BY STUDENT */  
          {
            $query1=mysqli_query($con,"select * from student where  username='$username' and email='$email'");
            if(mysqli_num_rows($query1)==1)                                /* CHECK STUDENT IS ELIGIBLE OR NOT */ 
            {
              $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
              if(mysqli_num_rows($query2)==1)                                /* CHECK  */ 
              {
                $query3=mysqli_query($con,"select * from member where group_id='$group_id' "); 
                if(mysqli_num_rows($query3) >= 3)                          /* CHECK MEMBER LIMIT LESS THAN 4 */ 
                {
                  $_SESSION['member_msg'] = " ***** Sorry, Member Limit Exceeded ***** ";
                  header('../../pages/student/addmember.php');
                }
                else                                                       /* RUN WHEN MEMBER LIMIT NOT EXCEED */
                {
                mysqli_query($con,"insert into register (username, email, password,access,date_created) values('$username','$email','$password','$access',NOW())"); /* INSERT STUDENT IN TO REGISTER TABLE */ 
                $user_id=mysqli_insert_id($con);                            /* INSERT STUDENT IN TO REGISTER TABLE */
                mysqli_query($con,"insert into member (group_id,user_id,date_added) values ('$group_id','$user_id',NOW())");
                $_SESSION['member_msg'] = "Member Added Successfully !";    /* INSERT STUDENT IN TO MEMBER TABLE */
                header('location: ../../pages/student/addmember.php');
                }
              }
              else
              {
                $_SESSION['member_msg'] = "Error, Add Project First !";
                header('location: ../../pages/student/addmember.php');        /* RUN WHEN STUDENT NOT ELIGIBLE */     
              }
            }
            else
            {
              $_SESSION['member_msg'] = " Not Eligible to Register to this Portal !";
              header('location: ../../pages/student/addmember.php');        /* RUN WHEN STUDENT NOT ELIGIBLE */     
            }
          }
          else                                                              /* RUN WHEN STUDENT CREATE ACCOUNT ALREADY */
          {
            $_SESSION['member_msg'] = "Sorry, Already Created Account !";             
            header('location: ../../pages/student/addmember.php');         
          }
         }
         else                                                               /* RUN WHEN DUE DATE IS CLOSED */
         {
            $_SESSION['member_msg'] = " ***** Error, Check Dates Table  ***** ";
            header('location: ../../pages/student/addmember.php');   
         }
       }
       else                                                                 /* RUN WHEN DUE DATE NOT SET BY HOC */
       {
         $_SESSION['member_msg'] = " ***** Error, Check Dates Table   ! ***** ";
         header('location: ../../pages/student/addmember.php');   
       }
    }
    header('location: ../../pages/student/addmember.php');            /* RUN WHEN MEMBER LIMIT EXCEED BCZ OF ERROR */
  }
}


if(isset($_POST['select_supervisor']))
{
    $user_id = $_SESSION['user_id'];
    $group_id = "";
    $sql1=mysqli_query($con,"SELECT * FROM groupp WHERE user_id='$user_id'");
    $fetch=mysqli_fetch_assoc($sql1);
    $group_id = $fetch['group_id'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
     $query_due_date=mysqli_query($con,"select * from dates");
      while($row=mysqli_fetch_array($query_due_date))
      {
        $start_date = $row['startdate'];
        $end_date =  $row['enddate'];                                      /* CHECK DATES VALIDATIONS */
      }
      $st_date = date('Y-m-d',(strtotime($start_date))); 
      $due_date = date('Y-m-d',(strtotime($end_date))); 
      $current_date = date('Y-m-d',(strtotime('now')));
      if($st_date!="" && $due_date!="")
      {
        if( $current_date <= $due_date)
        {
          $access = 3;
          $select_supervisor=check_input($_POST['select_supervisor']);
          $query=mysqli_query($con,"select * from select_supervisor where  select_supervisor.user_id='$user_id'");  
          if(mysqli_num_rows($query)!=1)                                   /* CHECK DATES VALIDATIONS */
          {
             $query1=mysqli_query($con,"select * from select_supervisor,groupp,register,member where groupp.group_id = '$group_id' and  select_supervisor.user_id=member.user_id and register.access='$access'");
             if(mysqli_num_rows($query1)!=1)
             {
                $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
                if(mysqli_num_rows($query2)==1)                                /* CHECK  */ 
                {
                $select_supervisor=check_input($_POST['super']);
                $sql2=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM register WHERE access=3 && username='$select_supervisor'"));
                $supervisor_id=$sql2['user_id'];
                mysqli_query($con,"insert into select_supervisor (supervisor_id,group_id,user_id) values ('$supervisor_id','$group_id','$user_id')");
                $_SESSION['supervisor_msg'] = " ***** Supervisor Selected Successfully ***** ";
                header('location: ../../pages/student/selectsupervisor.php');
                }
                else
                {
                 $_SESSION['supervisor_msg'] = " ***** Error, Add Project First ***** ";
                 header('location: ../../pages/student/selectsupervisor.php');
                }  
             }
                else
                {
                 $_SESSION['supervisor_msg'] = " ***** Error, Create Group First ***** ";
                 header('location: ../../pages/student/selectsupervisor.php');
                }          
             }
             else
             {
                $_SESSION['supervisor_msg'] = " ***** Sorry, Your Supervisor is Selected ***** ";
                header('location: ../../pages/student/selectsupervisor.php');
             }
           }
           else
           {
              $_SESSION['supervisor_msg'] = " ***** Sorry, You Have Already Selected a Supervisor ***** ";
              header('location: ../../pages/student/selectsupervisor.php');
           }
         }
         else                                                               /* RUN WHEN DUE DATE IS CLOSED */
         {
            $_SESSION['member_msg'] = " ***** Error, Check Dates Table  ***** ";
            header('location: ../../pages/student/addmember.php');   
         }
       }
       else                                                                 /* RUN WHEN DUE DATE NOT SET BY HOC */
       {
         $_SESSION['member_msg'] = " ***** Error, Check Dates Table   ! ***** ";
         header('location: ../../pages/student/addmember.php');   
       }
    }

  if(isset($_POST['proposal']))
  { 
    $user_id = $_SESSION['user_id'];
    $group_id = "";
    $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
    while($row=mysqli_fetch_array($query_get_group_id))
    {
        $group_id = $row['group_id'];
       
    } 
  $query_due_date=mysqli_query($con,"select * from dates");
  while($row=mysqli_fetch_array($query_due_date))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  $current_date = date('Y-m-d',(strtotime('now')));
  $user_id = $_SESSION['user_id'];
  $query=mysqli_query($con,"select * from proposal where user_id='$user_id'");  
  $link=mysqli_fetch_assoc($query);
  $filename=$link['upload_file'];
  $sql=mysqli_num_rows(mysqli_query($con,"select * from evaluate_proposal where group_id='$group_id' && status='Reject'"));
  if($sql == 1)
  {
    unlink("../../pages/student/upload/".$filename);
    $upload_file = $_FILES['upload_file'];
    $upload_file_name = $_FILES['upload_file']['name']; 
    $upload_file_tem_loc = $_FILES['upload_file']['tmp_name'];
    $upload_file_store = "../../pages/student/upload/".$upload_file_name;
    move_uploaded_file($upload_file_tem_loc,$upload_file_store);
    if($upload_file_name)
    {
     $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
     if(mysqli_num_rows($query2)==1)                              
     {
       mysqli_query($con,"Update proposal set upload_file='$upload_file_name' where user_id='$user_id'");
      $_SESSION['pro_msg'] = " Proposal Re Uploaded ";
     header('location: ../../pages/student/proposal.php');
     }
  }
}
else
{
  $_SESSION['pro_msg'] = " ***** Re Submission ***** ";
   header('location: ../../pages/student/proposal.php');
}
  if($st_date!="" && $due_date!="")
  {
  if( $current_date <= $due_date)
  {
  
  if(mysqli_num_rows($query)!=1)
  {
  $upload_file = $_FILES['upload_file'];
  $upload_file_name = $_FILES['upload_file']['name']; 
  $upload_file_tem_loc = $_FILES['upload_file']['tmp_name'];
  $upload_file_store = "../../pages/student/upload/".$upload_file_name;
  move_uploaded_file($upload_file_tem_loc,$upload_file_store);
  if($upload_file_name)
  {
   $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
   if(mysqli_num_rows($query2)==1)                                /* CHECK  */ 
   {
     mysqli_query($con,"insert into proposal (upload_file,date_uploaded,user_id,marker) values ('$upload_file_name',NOW(),'$user_id',1)");
     $_SESSION['pro_msg'] = " Proposal Uploaded ";
     header('location: ../../pages/student/proposal.php');
   }
  else
  {
     $_SESSION['pro_msg'] = " ***** Error, Add Project First ***** ";
     header('location: ../../pages/student/proposal.php');
  }
  }
  else
  {
     $_SESSION['pro_msg'] = " ***** Sorry,  Already Submit Against this File Name ***** ";
     header('location: ../../pages/student/proposal.php');
  }
  }
  else
  {
     $_SESSION['pro_msg'] = " ***** Re Submission ***** ";
     header('location: ../../pages/student/proposal.php');
  }

  }
  else
  {
     $_SESSION['pro_msg'] = " ***** Error, Check Dates Table  ***** ";
     header('location: ../../pages/student/proposal.php');
  }
  }
  else
  {
     $_SESSION['pro_msg'] = " ***** ***** Error, Check Dates Table  ***** ";
     header('location: ../../pages/student/proposal.php');   
  }
  }

  if(isset($_POST['phase1']))
  { 

  $query_due_date=mysqli_query($con,"select * from phase1dates");
  while($row=mysqli_fetch_array($query_due_date))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  $current_date = date('Y-m-d',(strtotime('now')));
  if($st_date!="" && $due_date!="")
  {
  if( $current_date <= $due_date)
  {
  $user_id = $_SESSION['user_id'];
  $query=mysqli_query($con,"select * from phase1 where  user_id='$user_id'");  
  if(mysqli_num_rows($query)!=1)
  {
    $group_id = "";
    $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
    while($row=mysqli_fetch_array($query_get_group_id))
    {
        $group_id = $row['group_id'];
    } 
  $upload_file = $_FILES['upload_file'];
  $upload_file_name = $_FILES['upload_file']['name']; 
  $upload_file_tem_loc = $_FILES['upload_file']['tmp_name'];
  $upload_file_store = "../../pages/student/upload/".$upload_file_name;
  move_uploaded_file($upload_file_tem_loc,$upload_file_store);
  if($upload_file_name)
  {
   $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
   if(mysqli_num_rows($query2)==1)                                /* CHECK  */ 
   {
     $status="Approved";
     $query_check=mysqli_query($con,"select * from evaluate_proposal where  group_id='$group_id' and status='$status'");  
     if(mysqli_num_rows($query_check)==1)
     {
       mysqli_query($con,"insert into phase1 (upload_file,date_uploaded,user_id,marker) values ('$upload_file_name',NOW(),'$user_id',1)");
       $_SESSION['phase1_msg'] = " Phase 1 Uploaded ";
       header('location: ../../pages/student/phase1.php');
     }
     else
     {
     $_SESSION['phase1_msg'] = " ***** Error, Proposal Not Approved ***** ";
     header('location: ../../pages/student/phase1.php');
     }
   }
   else
   {
     $_SESSION['phase1_msg'] = " ***** Error, Add Project First ***** ";
     header('location: ../../pages/student/phase1.php');
   }
  }
  else
  {
     $_SESSION['phase1_msg'] = " ***** Sorry,  Already Submit Against this File Name ***** ";
     header('location: ../../pages/student/phase1.php');
  }
  }
  else
  {
     $_SESSION['phase1_msg'] = " ***** Sorry, You Have Already Submit Your Phase 1 ***** ";
     header('location: ../../pages/student/phase1.php');
  }
  }
  else
  {
     $_SESSION['phase1_msg'] = " ***** Error, Check Dates Table  ***** ";
     header('location: ../../pages/student/phase1.php');
  }
  }
  else
  {   $_SESSION['phase1_msg'] = " ***** Error, Check Dates Table ! ***** ";
     header('location: ../../pages/student/phase1.php');
  }
  }


  if(isset($_POST['phase2']))
  { 
  $query_due_date=mysqli_query($con,"select * from phase2dates");
  while($row=mysqli_fetch_array($query_due_date))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  $current_date = date('Y-m-d',(strtotime('now')));
  if($st_date!="" && $due_date!="")
  {
  if( $current_date <= $due_date)
  {
  $user_id = $_SESSION['user_id'];
  $query=mysqli_query($con,"select * from phase2 where  user_id='$user_id'");  
  if(mysqli_num_rows($query)!=1)
  {
    $group_id = "";
    $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
    while($row=mysqli_fetch_array($query_get_group_id))
    {
        $group_id = $row['group_id'];
    } 
  $query_check=mysqli_query($con,"select * from evaluate_phase1 where group_id='$group_id'");  
  if(mysqli_num_rows($query_check)>0)
  {
  $upload_file = $_FILES['upload_file'];
  $upload_file_name = $_FILES['upload_file']['name']; 
  $upload_file_tem_loc = $_FILES['upload_file']['tmp_name'];
  $upload_file_store = "../../pages/student/upload/".$upload_file_name;
  move_uploaded_file($upload_file_tem_loc,$upload_file_store);
  if($upload_file_name)
  {
   $query2=mysqli_query($con,"select * from groupp where group_id='$group_id' ");
   if(mysqli_num_rows($query2)==1)                                /* CHECK  */ 
   {
     mysqli_query($con,"insert into phase2 (upload_file,date_uploaded,user_id,marker) values ('$upload_file_name',NOW(),'$user_id',1)");
     $_SESSION['phase2_msg'] = " Phase 2 Uploaded ";
     header('location: ../../pages/student/phase2.php');
   }
   else
   {
     $_SESSION['phase2_msg'] = " ***** Error, Add Project First ! ***** ";
     header('location: ../../pages/student/phase2.php');
   }
  }
  else
  {
     $_SESSION['phase2_msg'] = " ***** Sorry,  Already Submit Against this File Name ***** ";
     header('location: ../../pages/student/phase2.php');
  }
  }
  else
  {
     $_SESSION['phase2_msg'] = " ***** Error, Phase 1 Not Evaluated ***** ";
     header('location: ../../pages/student/phase2.php');
  }
  }
  else
  {
     $_SESSION['phase2_msg'] = " ***** Sorry, You Have Already Submit Your Phase 2 ***** ";
     header('location: ../../pages/student/phase2.php');
  }
  }
  else
  {
     $_SESSION['phase2_msg'] = " ***** Error, Dates Problem  ***** ";
     header('location: ../../pages/student/phase2.php');
  }   
  }
  else
  {
     $_SESSION['phase2_msg'] = " ***** Error, Dates Problem  ***** ";
     header('location: ../../pages/student/phase2.php');   
  }
  }

?>
