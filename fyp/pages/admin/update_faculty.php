<section class=footer>
<?php 
    include('../../database/admin/session.php');
   include('header.php');
    include('../../includes/admin/navbar.php'); 
    $faculty_id = $_GET['faculty_id'];
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
				<div class="dropdown-divider"></div>
			  </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../../../includes/admin/nav.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/admin/nav.php" data-toggle="modal" data-target="#logoutModal">
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
                <div class="form-group p-2 rounded">
                <div class="row justify-content-center">
                <div class="col-md-12 bg-light p-4 rounded nt-5">
                <?php
                 $query=mysqli_query($con,"select * from faculty where faculty_id=''$faculty_id");
                 if($row=mysqli_fetch_array($query))
                 {
                 ?>
                <h4 class="text-center btn btn-success btn-block btn-user btn-block">Update Faculty Members Information </h4>
                <form action="update.php" method="POST" >
                <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="username" value="<?php echo $row['username']; ?>">
               </div>
               <div class="form-group">
               <input type="email" name="email" class="form-control form-control-user" id="email" value="<?php echo $row['email']; ?>">
               </div>
				<div class="form-group">
				<input type="phone" name="contact" pattern="[0-9]{4}[0-9]{7}" class="form-control" placeholder="Contact" value="<?php  echo $row['contact']; ?>" required>
				</div>
				<div class="form-group">
				<input type="text" name="domain" class="form-control" placeholder="Domain" value="<?php  echo $row['domain']; ?>" required>
                </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-success" name="update"> Update</button>
               </div>
               </form>
               <?php }    
               ?>
				</div>
                </div>
                </div>
     </div>
     
                 </section>
     <?php 
      include('../../includes/scripts.php');
      include('footer.php');
     ?>
  

 


