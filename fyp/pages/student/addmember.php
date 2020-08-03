<?php 
    include('../../database/student/session.php');
   include('header.php');
    include('../../includes/student/navbar.php');
    error_reporting(0);
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <?php
              $status=$_SESSION['user_id'];
              $sql=mysqli_num_rows(mysqli_query($con,"SELECT * FROM groupp WHERE user_id='$status'"));
              if($sql == 1)
              { ?>
                <h3 class="mt-3" style="font-weight: bold;">Group Leader</h3>
              <?php }
              else
              {
                ?>
                <h3 class="mt-3" style="font-weight: bold;">Group Member</h3>
              <?php
              }
            ?>
             <div class="topbar-divider d-none d-sm-block"></div>
             <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

             <i class="fa fa-bell" aria-hidden="true"></i>
             <?php
                $sql1=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM member WHERE user_id='$status'"));
                $group=$sql1['group_id'];
                $proposal=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM evaluate_proposal WHERE group_id='$group'"));
                $phase1=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM evaluate_phase1 WHERE group_id='$group' && user_id='$status'"));   
                $phase2=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM evaluate_phase2 WHERE group_id='$group' && user_id='$status'"));
                $chat=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chat WHERE student='$status' && sender='supervisor' && marker=1"));
                $check1=$proposal['marker'];
                $check2=$phase1['marker'];
                $check3=$phase2['marker'];
                if($check1 == 1 || $check2 == 1 || $check3 == 1 || $chat > 0)   
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
          <?php
                }
                ?>
            </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="proreport.php?notify=yes">
                Proposal
                <?php
                 if($check1 == 1)   
                 {             
              ?>
              <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
           <?php
                 }
                 ?>
              </a>
              <a class="dropdown-item" href="ph1report.php?notify=yes">
                Phase 1
                <?php
                 if($check2 == 1)   
                 {             
              ?>
              <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
           <?php
                 }
                 ?>
              </a>
              <a class="dropdown-item" href="ph2report.php?notify=yes">
                Phase 2
                <?php
                 if($check3 == 1)   
                 {             
              ?>
              <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
           <?php
                 }
                 ?>
              </a>
              <a class="dropdown-item" href="indiv_chat.php?notify=yes">
                Message
                <?php
                if($chat > 0)   
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
          <?php
                }
                ?>
              </a>
          </div>

         
             </li>
             <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
          
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
				<div class="dropdown-divider"></div>
			  </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../../../includes/student/navbar.php" data-toggle="modal" data-target="#ProfileModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/student/navbar.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <!-- /.container-fluid -->
                <div class="form-group p-1 rounded">
                <div class="row justify-content-center">
				<div class="col-lg-12 bg-light p-4 rounded nt-5">
                <form action="../../database/student/process.php" method="post" id="form-data">
				<table width="100%" class="table table-striped  table-hover" >
				  <thead>
					<tr class="table-btn btn-success">
					  <th scope="col">Start Date:</th>
					  <th scope="col">Due Date:</th>
					</tr>
				  </thead>
                  <tbody>
		          <?php
                  $query=mysqli_query($con,"select * from dates");
			      while($row=mysqli_fetch_array($query)){
			      ?>
			     <tr>
                <td><?php echo $row['startdate']; ?></td>
				<td><?php echo $row['enddate']; ?></td>
			   </tr>
			<?php
			}
		    ?>
                </tbody>
				</table>
				<div id="member">
				<h4 class="btn btn-success btn-block btn-user btn-block">Add Member </h4><br>
				<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username" required>
				</div>
				<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="E-mail" required>
				</div>
              <div class="form-group">
                <input type="password" name="password" maxlength="4" pattern="\d*" title="Password  Should Contain Only Numbers" class="form-control form-control-user" id="password" placeholder=" Enter Password " required>
              </div>
                <hr>
                <div style="color: green; font-size: 15px;">
		        <div class="text-center">
		        <?php
			    	if(isset($_SESSION['member_msg']))
                    {
				      echo $_SESSION['member_msg'];
				  	  unset($_SESSION['member_msg']);
			    	}
		     	?>
	         	</div>
                </div>
                <hr>
				<div class="form-group ">
                <button type="submit" name="addmember" class="btn btn-success btn-block btn-user btn-block">Add</button><br>
				</div>			
                </div>
                </form>
        <div class="form-group p-1 rounded">
        <table width="100%" class="table table-striped  table-hover" >
        <h4 class="btn btn-success btn-block btn-user btn-block">Member Information </h4>
        <thead>
            <tr class="table-btn btn-success">
                <th>Group ID</th>
                <th>Member Name</th>
                <th>Member Email</th>
				<th>Date Created</th>
			</tr>
		</thead>
		<tbody>
		<?php
           $user_id = $_SESSION['user_id'];
           $group_id = "";
           $query_get_group_id=mysqli_query($con,"select * from groupp,member where groupp.group_id = member.group_id and member.user_id=$user_id");
           while($row=mysqli_fetch_array($query_get_group_id))
           {
            $group_id = $row['group_id'];
           }
			$query=mysqli_query($con,"SELECT groupp.group_id,register.username,register.email,member.date_added FROM register, groupp , member WHERE member.group_id = '$group_id'  and member.user_id = register.user_id and groupp.group_id = '$group_id'");
			while($row=mysqli_fetch_array($query)){
			?>
			<tr>
                <td><?php echo $row['group_id']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo date('M d, Y - h:i A', strtotime($row['date_added'])); ?></td>
				
			</tr>
			<?php
			}
		?>
        </tbody>
        </table>                     
				</div>   
  		        </div>
                </div>
     </div>
     <?php 
      include('../../includes/scripts.php');
      
     ?>
       
 


