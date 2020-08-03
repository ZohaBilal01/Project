<?php 
    include('../../database/hoc/session.php');
   include('header.php');
    include('../../includes/hoc/navbar.php');
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
            <div class="topbar-divider d-none d-sm-block"></div>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

             <i class="fa fa-bell" aria-hidden="true"></i>
             <?php
                $proposal=mysqli_num_rows(mysqli_query($con,"SELECT * FROM proposal WHERE marker=1"));
                $phase1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM phase1 WHERE marker=1"));   
                $phase2=mysqli_num_rows(mysqli_query($con,"SELECT * FROM phase2 WHERE marker=1"));
               
                if($proposal > 0 || $phase1 > 0 || $phase2 > 0)   
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
          <?php
                }
                ?>
            </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="groupproposal.php?notify=yes">
                Proposal
                <?php
                 if($proposal > 0)   
                 {             
              ?>
              <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
           <?php
                 }
                 ?>
              </a>
              <a class="dropdown-item" href="phase1detail.php?notify=yes">
                Phase 1
                <?php
                 if($phase1 > 0)   
                 {             
              ?>
              <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
           <?php
                 }
                 ?>
              </a>
              <a class="dropdown-item" href="phase2detail.php?notify=yes">
                Phase 2
                <?php
                 if($phase2 > 0)   
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
                 <a class="dropdown-item" href="../../../../includes/hoc/nav.php" data-toggle="modal" data-target="#ProfileModal">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/hoc/nav.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="form-group p-1 rounded">
        <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4 rounded nt-5">
       <h4 class="btn btn-success btn-block btn-user btn-block">Groups Information</h4>
        <table width="100%" class="table table-striped  table-hover" >
        <thead>
            <tr class="table-btn btn-success">
                <th>Group ID</th>
                <th>No of Members</th>
                <th>Project Title</th>
                <th>Project Description</th>
				<th>Date Created</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
            $user_id = $_SESSION['user_id'];
			$query=mysqli_query($con,"select * from groupp,member,register where groupp.group_id = member.group_id and member.user_id = register.user_id and groupp.user_id = register.user_id");
			while($row=mysqli_fetch_array($query)){
				$num=mysqli_query($con,"select * from member where group_id='".$row['group_id']."'");
			?>
			<tr>
                <td><?php echo $row['group_id']; ?></td>
                <td><span class="badge"><?php echo mysqli_num_rows($num); ?></span> </td>
				<td><?php echo $row['project_title']; ?></td>
				<td><?php echo $row['project_description']; ?></td>
				<td><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></td>
				<td><a href="memberdetail.php" class="btn btn-info">Member Info</a>&nbsp;||&nbsp;<a href="addmember.php?id=<?php echo $row['group_id']; ?>" class="btn btn-danger">Delete</a>  
				</td>
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
      <!-- End of Main Content -->
  <?php 
    include('../../includes/scripts.php');
    
   ?>
  

 


