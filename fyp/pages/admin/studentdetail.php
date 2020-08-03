<section class=footer>
<?php 
    include('../../database/admin/session.php');
   include('header.php');
    include('../../includes/admin/navbar.php'); 
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
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
				<div class="dropdown-divider"></div>
			  </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../../../includes/admin/navbar.php" data-toggle="modal" data-target="#ProfileModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/admin/navbar.php" data-toggle="modal" data-target="#logoutModal">
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
        <div class="col-md-12 bg-light p-4 rounded nt-5">
        <div class="form-group p-1 rounded">
        <table width="100%" class="table table-striped  table-hover" >
         <h4 class="text-center btn btn-success btn-block btn-user btn-block">Registered Account Information </h4>
        <thead>
            <tr class="table-btn btn-success">
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
				<th>Date Created</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
            $access = 2;
			$query=mysqli_query($con,"select * from register where access='$access' order by date_created asc ");
			while($row=mysqli_fetch_array($query))
            {
			?>
			<tr>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
				<td><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></td>
                <td><a href="delete/delete_reg_student.php?user_id=<?php echo $row['user_id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			</tr>
			<?php
			}
		?>
        </tbody>
        </table>                     
				</div>	
				</div>
  		        </div>
        </div >
        
  </div>
  </section>
  <?php 
    include('../../includes/scripts.php');
    include('footer.php');
   ?>
  

 


