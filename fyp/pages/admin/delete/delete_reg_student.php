<?php
	include('../../database/admin/session.php');
    $con = mysqli_connect('localhost', 'root', '','hardwork');
    $user_id = $_GET['user_id'];
    $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
    while($row=mysqli_fetch_array($query_get_group_id))
    {
       $group_id = $row['group_id'];
       $member_id = $row['member_id']; 
    }
    $access = 2;
    mysqli_query($con,"delete from register where user_id='$user_id' and access='$access' ");
    mysqli_query($con,"delete from member where member.group_id='$group_id' and member.user_id='$user_id'");
    header('location: ../studentdetail.php');	
?>