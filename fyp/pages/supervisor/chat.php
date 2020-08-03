<?php 
    include('../../database/supervisor/session.php');
   include('header.php');
    include('../../includes/supervisor/navbar.php'); 
    $supervisor=$_SESSION['user_id'];
    $student=$_GET['status'];
    if(isset($_GET['notify']) || isset($_GET['status']))
    {
    mysqli_query($con,"UPDATE chat SET marker=0 WHERE student='$student' && sender='student'");
    }
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
        <div class="form-group p-1 rounded">
            <div class="col-lg-12 bg-light p-4 rounded nt-5">
            <div class="row justify-content-center p-2 rounded">
              <a href="#" data-toggle="modal" data-target="#exampleModal1" class="btn btn-primary ml-auto mb-3"> Send Message </a> 
    
              <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="text-center">Messages</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql3=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM select_supervisor WHERE supervisor_id='$supervisor' && user_id=$student"));
                  $sql2=mysqli_query($con,"SELECT * FROM chat WHERE supervisor='$supervisor' && student='$student' ORDER BY id DESC");
                  foreach($sql2 as $message)
                  {
                  $sender=$message['sender'];
                  ?>
                  <tr>
                    <td class="row"> <?php echo $message['message']; 
                        if($sender == 'student')
                        {
                          ?>
                            <p class="ml-auto">Student</p>
                          <?php
                        }
                        else
                        {
                          ?>
                          <p class="ml-auto">You</p>
                        <?php
                        }
                    ?>
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
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="POST">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <label for="">Enter Your Message <span style="color: red;">*</span></label>
                <textarea class="form-control" name="message" placeholder="Type your Message to your Supervisor Here"></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-secondary" value="Close" data-dismiss="modal">
          <input type="submit" name="send" value="SEND" class="btn btn-primary"> 
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php 
   if(isset($_POST['send']))
   {
     $message=$_POST['message'];
     $sql4=mysqli_query($con,"INSERT INTO chat(message,supervisor,student,sender,marker) 
     VALUES('$message','$supervisor','$student','supervisor',1)");
     ?>
     <script>
       window.location.href="chat.php?status=<?php echo $student; ?>";
     </script>
     <?php
   }
    include('../../includes/scripts.php');
    
   ?>
  

 


