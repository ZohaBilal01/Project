<?php
include('session.php');
$con = mysqli_connect('localhost', 'root', '','hardwork');
function check_input($data) 
{
		$data = trim($data);
		return $data;
}

if(isset($_POST['select_evaluator']))
{
  $group_id = "";
  $query_get_group_id=mysqli_query($con,"select * from groupp,member,register where groupp.group_id = member.group_id and member.user_id=register.user_id");
  while($row=mysqli_fetch_array($query_get_group_id))
  {
    $group_id = $row['group_id'];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $user=$_POST['user'];
    $access = 3;
    $query=mysqli_query($con,"select * from assign_proposal where  assign_proposal.group_id='$group_id'");  
  if(mysqli_num_rows($query)!=1)
  {
       $query1=mysqli_query($con,"select * from assign_proposal,groupp,register where groupp.group_id = '$group_id' and assign_proposal.group_id='$group_id' and register.access='$access'");
     if(mysqli_num_rows($query1)!=1)
     {
       $user=check_input($_POST['user']);
       mysqli_query($con,"insert into assign_proposal (group_id,evaluator,marker) values ('$group_id','$user',1)");
       $_SESSION['msg'] = " ***** Evaluator Selected Successfully ***** ";
       header('location: ../../pages/hoc/selectec.php');
     }
     else
     {
        $_SESSION['supervisor_msg'] = " ***** Sorry, Your Evaluator is Selected ***** ";
        header('location: ../../pages/hoc/selectec.php');
      }
  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Selected a Evaluator ***** ";
     header('location: ../../pages/hoc/selectec.php');
  }
  }
 }

if(isset($_POST['select_evaluator_ph1']))
{
  $group_id = "";
  $query_get_group_id=mysqli_query($con,"select * from groupp,member,register where groupp.group_id = member.group_id and member.user_id=register.user_id");
  while($row=mysqli_fetch_array($query_get_group_id))
  {
    $group_id = $row['group_id'];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $user=check_input($_POST['user']);
    $access = 3;
    $query=mysqli_query($con,"select * from assign_phase1 where  assign_phase1.group_id='$group_id'");  
  if(mysqli_num_rows($query)!=1)
  {
       $query1=mysqli_query($con,"select * from assign_phase1,groupp,register where groupp.group_id = '$group_id' and assign_phase1.group_id='$group_id' and register.access='$access'");
     if(mysqli_num_rows($query1)!=1)
     {
       $user=$_POST['user'];
       mysqli_query($con,"insert into assign_phase1 (group_id,evaluator,marker) values ('$group_id','$user',1)");
       $_SESSION['msg'] = " ***** Evaluator Selected Successfully ***** ";
       header('location: ../../pages/hoc/selectecph1.php');
     }
     else
     {
        $_SESSION['supervisor_msg'] = " ***** Sorry, Your Evaluator is Selected ***** ";
        header('location: ../../pages/hoc/selectecph1.php');
      }
  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Selected a Evaluator ***** ";
     header('location: ../../pages/hoc/selectecph1.php');
  }
  }
 }

if(isset($_POST['select_evaluator_ph2']))
{
  $group_id = "";
  $query_get_group_id=mysqli_query($con,"select * from groupp,member,register where groupp.group_id = member.group_id and member.user_id=register.user_id");
  while($row=mysqli_fetch_array($query_get_group_id))
  {
    $group_id = $row['group_id'];
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $user=check_input($_POST['user']);
    $access = 3;
    $query=mysqli_query($con,"select * from assign_phase2 where  assign_phase2.group_id='$group_id'");  
  if(mysqli_num_rows($query)!=1)
  {
       $query1=mysqli_query($con,"select * from assign_phase2,groupp,register where groupp.group_id = '$group_id' and assign_phase2.group_id='$group_id' and register.access='$access'");
     if(mysqli_num_rows($query1)!=1)
     {
       $user=$_POST['user'];
       mysqli_query($con,"insert into assign_phase2 (group_id,evaluator,marker) values ('$group_id','$user',1)");
       $_SESSION['msg'] = " ***** Evaluator Selected Successfully ***** ";
       header('location: ../../pages/hoc/selectecph2.php');
     }
     else
     {
        $_SESSION['supervisor_msg'] = " ***** Sorry, Your Evaluator is Selected ***** ";
        header('location: ../../pages/hoc/selectecph2.php');
      }
  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Selected a Evaluator ***** ";
     header('location: ../../pages/hoc/selectecph2.php');
  }
  }
 }





if(isset($_POST['setdate']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $date1 = mysqli_real_escape_string($con,$_POST['startdate']);
    $d1 = date('Y-m-d',(strtotime($date1)));
    $date2 = mysqli_real_escape_string($con,$_POST['enddate']);
    $d2 = date('Y-m-d',(strtotime($date2)));  
  }
  $query=mysqli_query($con,"select * from dates");  
  if(mysqli_num_rows($query)!=1)
  {
    mysqli_query($con,"insert into dates (startdate,enddate) VALUES ('$d1','$d2')");
    $_SESSION['date_msg'] = " ***** Dates Selected Successfully ***** ";
    header('location: ../../pages/hoc/setproposal_date.php'); 
  }
  else
  {
        $_SESSION['date_msg'] = " ***** Sorry, You Already Selected Dates ***** ";
        header('location: ../../pages/hoc/setproposal_date.php'); 
  }
}

if(isset($_POST['setphase1date']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $date1 = mysqli_real_escape_string($con,$_POST['startdate']);
    $d1 = date('Y-m-d',(strtotime($date1)));
    $date2 = mysqli_real_escape_string($con,$_POST['enddate']);
    $d2 = date('Y-m-d',(strtotime($date2)));  
  }
  $query=mysqli_query($con,"select * from phase1dates");  
  if(mysqli_num_rows($query)!=1)
  {
  $query_due_date=mysqli_query($con,"select * from dates");
  while($row=mysqli_fetch_array($query_due_date))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  if($st_date!="" && $due_date!="")
  {  
        if( $d1 <= $st_date && $d2 <= $end_date || $d1 <= $st_date || $d2 <= $end_date )
        {
            $_SESSION['date_msg'] = " ***** Error, You Should Enter Phase 1 Dates Greater than Proposal Dates ! ***** ";
            header('location: ../../pages/hoc/setphase1_date.php');   
        }
        else
        {
    
           mysqli_query($con,"insert into phase1dates (startdate,enddate) VALUES ('$d1','$d2')");
           $_SESSION['date_msg'] = " ***** Dates Selected Successfully ***** ";
           header('location: ../../pages/hoc/setphase1_date.php');         
        }
  }
  else
  {
     $_SESSION['date_msg'] = " ***** Sorry, Complete Proposal Phase First ! ***** ";
     header('location: ../../pages/hoc/setphase1_date.php');   
  }
  }
  else
  {
        $_SESSION['date_msg'] = " ***** Sorry, You Already Selected Dates ***** ";
        header('location: ../../pages/hoc/setphase1_date.php'); 
  }
}

if(isset($_POST['setphase2date']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $date1 = mysqli_real_escape_string($con,$_POST['startdate']);
    $d1 = date('Y-m-d',(strtotime($date1)));
    $date2 = mysqli_real_escape_string($con,$_POST['enddate']);
    $d2 = date('Y-m-d',(strtotime($date2)));  
  }
  $query=mysqli_query($con,"select * from phase2dates");  
  if(mysqli_num_rows($query)!=1)
  {
  $query_due_date_proposal=mysqli_query($con,"select * from dates");
  while($row=mysqli_fetch_array($query_due_date_proposal))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  if($st_date != "" && $due_date != "")
  {  
  $query_due_date=mysqli_query($con,"select * from phase1dates");
  while($row=mysqli_fetch_array($query_due_date))
  {
      $start_date = $row['startdate'];
      $end_date =  $row['enddate'];
  }
  $st_date = date('Y-m-d',(strtotime($start_date))); 
  $due_date = date('Y-m-d',(strtotime($end_date))); 
  if($st_date != "" && $due_date != "")
  {
  if( $d1 <= $st_date && $d2 <= $end_date || $d1 <= $st_date || $d2 <= $end_date )
  {
            $_SESSION['date_msg'] = " ***** Error, You Should Enter Phase 2 Dates Greater than Phase 1 Dates ! ***** ";
            header('location: ../../pages/hoc/setphase2_date.php');   
  }
  else
  {
    
           mysqli_query($con,"insert into phase2dates (startdate,enddate) VALUES ('$d1','$d2')");
           $_SESSION['date_msg'] = " ***** Dates Selected Successfully ***** ";
           header('location: ../../pages/hoc/setphase2_date.php');         
  }
  }
  else
  {
     $_SESSION['date_msg'] = " ***** Error, Complete Phase 1 Processes First ! ***** ";
     header('location: ../../pages/hoc/setphase2_date.php');   
  }
  }
  else
  {
     $_SESSION['date_msg'] = " ***** Sorry, Complete Proposal Phases First ! ***** ";
     header('location: ../../pages/hoc/setphase2_date.php');   
  }
  }
  else
  {
        $_SESSION['date_msg'] = " ***** Sorry, You Already Selected Dates ***** ";
           header('location: ../../pages/hoc/setphase2_date.php'); 
  }
}



?>
