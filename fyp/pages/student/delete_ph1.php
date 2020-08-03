<?php
	include('../../database/student/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $phase_id = $_GET['phase1_id'];
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
    mysqli_query($con,"delete from phase1 where phase_id='$phase1_id'");
    header('location: proreport.php');	
    }
    else
    {
     header('location: proreport.php');
    }
   }
    else
    {
     header('location: proreport.php');
    }

?>
