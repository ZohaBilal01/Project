<?php 
    include('../../database/ec/session.php');
   include('header.php');
    include('../../includes/ec/navbar.php'); 
    $user=$_SESSION['user_id'];
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

            <i class="fa fa-bell" aria-hidden="true"></i>
            <?php
               $proposal=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_proposal WHERE evaluator='$user' && marker=1"));
               $phase1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_phase1 WHERE evaluator='$user' && marker=1"));   
               $phase2=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_phase2 WHERE evaluator='$user' && marker=1"));
               if($proposal == 1 || $phase1 == 1 || $phase2 == 1)   
               {             
            ?>
            <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
         <?php
               }
               ?>
           </a>
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
           <a class="dropdown-item" href="pro_report.php?notify=yes">
               Proposal
               <?php
                if($proposal == 1)   
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
          <?php
                }
                ?>
             </a>
             <a class="dropdown-item" href="ph1_report.php?notify=yes">
               Phase 1
               <?php
                if($phase1 == 1)   
                {             
             ?>
             <span class="label label-primary label-indicator animation-floating text-danger" style="font-size: 25px;"> * </span>
          <?php
                }
                ?>
             </a>
             <a class="dropdown-item" href="ph2_report.php?notify=yes">
               Phase 2
               <?php
                if($phase2 == 1)   
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
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
				<div class="dropdown-divider"></div>
			  </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../../../includes/ec/nav.php" data-toggle="modal" data-target="#ProfileModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../../includes/ec/nav.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">
          </div>
        </div><br>
        <!-- /.container-fluid -->

                <div class="form-group p-1 rounded">
                <div class="row justify-content-center">
				<div class="col-md-12 bg-light p-4 rounded nt-5">
				</div>
  		        </div>
        </div >
        
  </div>

  <?php 
    include('../../includes/scripts.php');
     
   ?>
  

 


