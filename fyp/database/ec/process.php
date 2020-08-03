<?php
$con = mysqli_connect('localhost', 'root', '','hardwork');
session_start();
function check_input($data) 
{
		$data = trim($data);
		return $data;
}
if(isset($_POST['evaluate_proposal']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $remarks=check_input($_POST['remarks']);
    if (!preg_match("/^[a-zA-Z ]*$/",$remarks)) 
    {
      $_SESSION['msg'] = " Error, Enter Invalid Input !"; 
      header('location: ../../pages/ec/evaluatepro.php?id_group=<?php echo $group_id; ?>');
    } 
   else
   {
    $group_id = $_POST['id_group'];
    $query=mysqli_num_rows(mysqli_query($con,"select * from evaluate_proposal where group_id='$group_id'"));  
    
  if($query != 1)
  {
      $status=check_input($_POST['status']);
      $remarks=check_input($_POST['remarks']);
       mysqli_query($con,"insert into evaluate_proposal (status,remarks,marker,group_id) values ('$status','$remarks',1,'$group_id')");
       $_SESSION['msg'] = " ***** Proposal Evaluated Successfully ***** ";
      ?>

<script>
  window.location.href='../../pages/ec/evaluatepro.php?id_group=<?php echo $group_id; ?>';
</script>
      <?php
   
  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Evaluated this Proposal ***** ";
     $query1=mysqli_fetch_assoc(mysqli_query($con,"select * from evaluate_proposal where group_id='$group_id'"));  
    if($query1['status'] == 'Reject')
    {
      $status=check_input($_POST['status']);
      $remarks=check_input($_POST['remarks']);
      mysqli_query($con,"update evaluate_proposal set status='$status', remarks='$remarks', marker=1 where group_id='$group_id'");
      $_SESSION['msg'] = " ***** Proposal Re Evaluated Successfully ***** ";
     ?>

<script>
 window.location.href='../../pages/ec/evaluatepro.php?id_group=<?php echo $group_id; ?>';
</script>
     <?php
    }
     ?>

     <script>
       window.location.href='../../pages/ec/evaluatepro.php?id_group=<?php echo $group_id; ?>';
     </script>
           <?php
   }
  }
 }
}
if(isset($_POST['evaluate_phase1']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $remarks=check_input($_POST['ph1_remarks']);
    if (!preg_match("/^[a-zA-Z ]*$/",$remarks)) 
    {
      $_SESSION['msg'] = " Error, Enter Invalid Input !"; 
      header('location: ../../pages/ec/evalauteph1.php?id_group=<?php echo $group_id; ?>');
    } 
   else
   {
    $group_id = $_POST['id_group'];
    $user=$_POST['user'];
    $query=mysqli_num_rows(mysqli_query($con,"select * from evaluate_phase1 where group_id='$group_id' && user_id='$user'"));  
    
  if($query != 1)
  {
      $ph1marks=check_input($_POST['marks']);
      $remarks=check_input($_POST['ph1_remarks']);
      $query7= mysqli_query($con,"insert into evaluate_phase1(ph1_marks,remarks,marker,user_id,group_id) values('$ph1marks','$remarks',1,'$user','$group_id')");
      
      $_SESSION['msg'] = " ***** Phase1 Evaluated Successfully ***** ";
      ?>
      <script>
        window.location.href='../../pages/ec/evalauteph1.php?id_group=<?php echo $group_id; ?>';
      </script>
 
      <?php

  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Evaluated this phase1 ***** ";
    
     ?>
     <script>
       window.location.href='../../pages/ec/evalauteph1.php?id_group=<?php echo $group_id; ?>';
     </script>

     <?php
   }
  }
 }
}

if(isset($_POST['evaluate_phase2']))
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $remarks=check_input($_POST['ph2_remarks']);
    if (!preg_match("/^[a-zA-Z ]*$/",$remarks)) 
    {
      $_SESSION['msg'] = " Error, Enter Invalid Input !"; 
      ?>
      <script>
        window.location.href='../../pages/ec/evalauteph2.php?id_group=<?php echo $group_id; ?>';
      </script>
 
      <?php
    } 
   else
   {
    $group_id = $_POST['id_group'];
    $user=$_POST['user'];
    $query=mysqli_num_rows(mysqli_query($con,"select * from evaluate_phase2 where group_id='$group_id' && user_id='$user'"));  
    
  if($query != 1)
  {
      $ph2marks=check_input($_POST['marks']);
      $remarks=check_input($_POST['ph2_remarks']);
      $query7= mysqli_query($con,"insert into evaluate_phase2(ph2_marks,remarks,marker,user_id,group_id) values('$ph2marks','$remarks',1,'$user','$group_id')");
      
      $_SESSION['msg'] = " ***** Phase2 Evaluated Successfully ***** ";
      ?>
      <script>
        window.location.href='../../pages/ec/evalauteph2.php?id_group=<?php echo $group_id; ?>';
      </script>
 
      <?php

  }
  else
  {
     $_SESSION['msg'] = " ***** Sorry, You Have Already Evaluated this phase2 ***** ";
    
     ?>
     <script>
       window.location.href='../../pages/ec/evalauteph2.php?id_group=<?php echo $group_id; ?>';
     </script>

     <?php
   }
  }
 }
}
?>