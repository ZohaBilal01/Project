

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion fixed" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">FYP PORTAL <sup>20</sup></div>
      </a>
      <hr class="sidebar-divider my-0"><br>
      <!-- Heading -->
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../../pages/admin/admin.php">
          <i class="fas fa-fw fa-home"></i>
          <span>ADMIN</span></a>
      </li>
      <div class="sidebar-heading">
        Admin Components
      </div><br>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>ADD FACULTY</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Faculty Process:</h6>
            <a class="collapse-item" href="../../pages/admin/addfaculty.php">Add Faculty</a>
            <a class="collapse-item" href="../../pages/admin/facultydetail.php">Faculty Detail</a>
        </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseStudent">
          <i class="fas fa-fw fa-book"></i>
          <span>ADD STUDENT</span>
        </a>
        <div id="collapseStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Faculty Process:</h6>
            <a class="collapse-item" href="../../pages/admin/addstudent.php">Add Student</a>
            <a class="collapse-item" href="../../pages/admin/addstudentdetail.php">Student Details</a>
        </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-book"></i>
          <span>CREATE ACCOUNT</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Faculty Process:</h6>
            <a class="collapse-item" href="../../pages/admin/addhoc.php">HOC</a>  
            <a class="collapse-item" href="../../pages/admin/addsupervisor.php">Supervisor</a>
            <a class="collapse-item" href="../../pages/admin/addec.php">Evaluation Committee</a>
            <a class="collapse-item" href="../../pages/admin/supervisordetail.php">Supervisor Detail</a>
            <a class="collapse-item" href="../../pages/admin/ecdetail.php">EC Detail</a>
        </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
     <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-book"></i>
          <span>REGISTERED STUDENT</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Student Process:</h6>
            <a class="collapse-item" href="../../pages/admin/studentdetail.php">Groups Detail</a>
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
        </div>
        <div class="modal-body">
        <form action="../../database/admin/profile.php" method="POST">
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
  