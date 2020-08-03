    
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
        <a class="nav-link" href="../../pages/student/student.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Student</span></a>
      </li>
      <hr class="sidebar-divider my-0"><br>
      <!-- Heading -->
      <div class="sidebar-heading">
        Student Components
      </div><br>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>CREATE GROUP</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Group Process:</h6>
            <a class="collapse-item" href="../../pages/student/group.php">Add Project</a>
            <a class="collapse-item" href="../../pages/student/addmember.php">Add Member</a>
            <a class="collapse-item" href="../../pages/student/selectsupervisor.php">Select Supervisor</a>
            <a class="collapse-item" href="../../pages/student/details.php">Group Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-book"></i>
          <span> PROPOSAL </span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../../pages/student/proposal.php">Submit Proposal</a>
            <a class="collapse-item" href="../../pages/student/proreport.php">Report</a>
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
            <a class="collapse-item" href="../../pages/student/phase1.php">Submit Phase 1</a>
            <a class="collapse-item" href="../../pages/student/ph1report.php">Report</a>
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
            <a class="collapse-item" href="../../pages/student/phase2.php">Submit Phase 2</a>
            <a class="collapse-item" href="../../pages/student/ph2report.php">Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          <i class="fas fa-fw fa-book"></i>
          <span> GRADE </span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../../pages/student/grade.php">Grade Report</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSix">
          <i class="fas fa-fw fa-book"></i>
          <span> CHAT </span>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <!-- <a class="collapse-item" href="../../pages/student/group_chat.php">Group Chat</a> -->
            <a class="collapse-item" href="../../pages/student/indiv_chat.php">Supervisor Chat</a>
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
        <form action="../../database/student/profile.php" method="POST" >
          
              <div class="form-group">
                <input type="text" name="username" class="form-control form-control-user" id="username" value="<?php echo $row['username']; ?>" disabled >
              </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-user" id="email" value="<?php echo $row['email']; ?>" disabled>
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
  