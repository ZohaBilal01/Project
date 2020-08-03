<?php
	include('../../database/student/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $group_id = $_GET['group_id'];
  $query_due_date=mysqli_query($con,"select * from dates");
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
      $query_get_member_id=mysqli_query($con,"select member_id,user_id from member where group_id = $group_id");
      while($row=mysqli_fetch_array($query_get_member_id))
      {
        $member_id = $row['member_id'];
        $user_id = $row['user_id'];
      }
      mysqli_query($con,"delete from groupp where group_id='$group_id'");
      mysqli_query($con,"delete from member where member.group_id='$group_id' and member.user_id='$user_id'");
      header('location: details.php');
    }
    else
    {
     header('location: details.php');
    }
  }
  else 
  {
    header('location: details.php');
  }
?>
