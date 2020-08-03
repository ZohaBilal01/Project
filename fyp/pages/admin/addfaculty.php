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
                <form action="../../database/admin/process.php" method="post" id="form-data">
				<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Name" required>
				</div>
				<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="E-mail" required>
				</div>
				<div class="form-group">
				<input type="tel" name="contact" pattern="[0-9]{4}[0-9]{7}" class="form-control" placeholder="Contact" required>
				</div>
				<div class="form-group">
				<input type="text" name="domain" class="form-control" placeholder="Domain" required>
				</div>
                <hr>
                <div style="color: green; font-size: 15px;">
		        <div class="text-center">
		        <?php
			    	if(isset($_SESSION['msg']))
                    {
				      echo $_SESSION['msg'];
				  	  unset($_SESSION['msg']);
			    	}
		     	?>
	         	</div>
                </div>
                <hr>
				<div class="form-group ">
                <button type="submit" name="faculty" class="btn btn-success btn-block btn-user btn-block">Add</button>
				</div>			
                </form>
				</div>	  
  		        </div>
                </div>
     </div>
          </section>
     <?php 
      include('../../includes/scripts.php');
      include('footer.php');
     ?>
  

 


