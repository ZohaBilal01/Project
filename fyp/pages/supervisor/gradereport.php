<?php 
    include('../../database/supervisor/session.php');
   include('header.php');
    include('../../includes/supervisor/navbar.php'); 
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
             $newapi=$_SESSION['user_id'];
             $chat=mysqli_num_rows(mysqli_query($con,"SELECT * FROM chat WHERE supervisor='$newapi' && sender='student' && marker=1")); 
                if($chat > 0)
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
         <?php
                }
         ?>
            </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="chatgroup.php?notify=yes">
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
                <a class="dropdown-item" href="../../../../includes/supervisor/navbar.php" data-toggle="modal" data-target="#ProfileModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/supervisor/navbar.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="row justify-content-center">
        <div class="col-md-12 bg-light p-4 rounded">
        <table width="100%" class="table table-striped  table-hover" >
        <thead>
            <tr class="table-btn btn-success">
                <th>Group ID</th>
                <th>No of Members</th>
                <th>Project Title</th>
				<th>Project description</th>
				<th>Action </th>
			</tr>
		</thead>
		<tbody>
		<?php
           $group_id = "";
           $query_get_group_id=mysqli_query($con,"select * from groupp,member,register where groupp.group_id = member.group_id and member.user_id=register.user_id");
           while($row=mysqli_fetch_array($query_get_group_id))
           {
            $group_id = $row['group_id'];
           }
            $query=mysqli_query($con,"select * from groupp where groupp.group_id = '$group_id' ");
			while($row=mysqli_fetch_array($query))
            {
				$num=mysqli_query($con,"select * from member where group_id='".$row['group_id']."'");
			?>
			<tr>
                <td><?php echo $row['group_id']; ?></td>
                <td><?php echo mysqli_num_rows($num); ?></td>
				<td><?php echo $row['project_title']; ?></td>
				<td><?php echo $row['project_description']; ?></td>
                <td><a href="report.php?group_id=<?php echo $row['group_id']; ?>" class="btn btn-info">Report</a></td>
			</tr>
			<?php
			}
		?>
        </tbody>
        </table><hr>  
        </div>	
  		</div>
  </div>

  <?php 
    include('../../includes/scripts.php');
     
   ?>
  

 


