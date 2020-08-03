    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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
        <a class="nav-link" href="../../pages/hoc/hoc.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Head of Committee</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Due Date Components
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
          <i class="fas fa-fw fa-book"></i>
          <span>Due Date</span>
        </a>
        <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Due Date Process:</h6>
            <a class="collapse-item" href="../../pages/hoc/setproposal_date.php">Set Proposal Date</a>
            <a class="collapse-item" href="../../pages/hoc/setphase1_date.php">Set Phase 1 Date</a>
            <a class="collapse-item" href="../../pages/hoc/setphase2_date.php">Set Phase 2 Date</a>
        </div>
        </div>
      </li>        
      <!-- Divider -->
     <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Supervisor Components
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>SUPERVISOR</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Supervisor Process:</h6>
            <a class="collapse-item" href="../../pages/hoc/supervisordetail.php">Supervisor Account Info</a>
        </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        EC Components
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-book"></i>
          <span>EC</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">EC Process:</h6>
            <a class="collapse-item" href="../../pages/hoc/ecdetail.php">EC Information</a>
            <a class="collapse-item" href="../../pages/hoc/groupproposal.php">Assign Proposal</a>
            <a class="collapse-item" href="../../pages/hoc/phase1detail.php">Assign Phase 1</a>
            <a class="collapse-item" href="../../pages/hoc/phase2detail.php">Assign Phase 2</a>
            <a class="collapse-item" href="../../pages/hoc/gradereport.php">Grade Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Student Components
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-book"></i>
          <span>STUDENT </span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Student Process:</h6>
            <a class="collapse-item" href="../../pages/hoc/groupproposal.php">Groups Proposal Info </a>
            <a class="collapse-item" href="../../pages/hoc/phase1detail.php">Phase-1 Info </a>
            <a class="collapse-item" href="../../pages/hoc/phase2detail.php">Phase-2 Info</a>
            <a class="collapse-item" href="../../pages/hoc/gradereport.php">Grades Report </a>
            
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
        <form action="../../database/hoc/profile.php" method="POST" >
          
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="username" value="<?php echo $row['username']; ?>">
              </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-user" id="email" value="<?php echo $row['email']; ?>">
            </div>
              <div class="form-group">
                <input type="password" name="password" pattern="(?=.*\d).{4,}" class="form-control form-control-user" id="password" value="<?php  echo $row['password']; ?>" required>
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
  