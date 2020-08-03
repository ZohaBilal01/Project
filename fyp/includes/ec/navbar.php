

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion fixed" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">FYP PORTAL <sup>20</sup></div>
      </a>
       <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../../pages/ec/ec.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Evaluation Committee</span></a>
      </li>
      <hr class="sidebar-divider my-0"><br>
      <!-- Heading -->
      <div class="sidebar-heading">
        Evaluation Components
      </div><br>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>PROPOSAL</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proposal Process:</h6>
            <a class="collapse-item" href="../../pages/ec/pro_report.php">Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-book"></i>
          <span> PHASE 1 </span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../../pages/ec/ph1_report.php">Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fas fa-fw fa-book"></i>
          <span> PHASE 2 </span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../../pages/ec/ph2_report.php">Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseF" aria-expanded="true" aria-controls="collapseF">
          <i class="fas fa-fw fa-book"></i>
          <span> GRADE </span>
        </a>
        <div id="collapseF" class="collapse" aria-labelledby="headingF" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../../pages/ec/grade_report.php">Report</a>
        </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block"><br>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Scroll to Top Button-->
    
     <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
     </a>

     <!-- Profile Modal-->
  <div class="modal fade" id="ProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Change?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="../../database/ec/profile.php" method="POST" >
          
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="username" value="<?php echo $row['username']; ?>" required>
              </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-user" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
              <div class="form-group">
                <input type="password" name="password" pattern="(?=.*\d).{4,}" class="form-control form-control-user" id="password" value="<?php echo $row['password']; ?>" required>
              </div>
           <div class="modal-footer">
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="update"> Update</button>
           </div>
          </form>  
        </div>
      </div>
    </div>
  </div>
     <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="../../database/logout/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  