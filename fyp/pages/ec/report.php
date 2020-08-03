<?php 
    include('../../database/ec/session.php');
   include('header.php');
    include('../../includes/ec/navbar.php'); 
    $status=$_SESSION['user_id'];
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
              $proposal=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_proposal WHERE evaluator='$status' && marker=1"));
              $phase1=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_phase1 WHERE evaluator='$status' && marker=1"));   
              $phase2=mysqli_num_rows(mysqli_query($con,"SELECT * FROM assign_phase2 WHERE evaluator='$status' && marker=1"));
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
       <div class="form-group p-1 rounded">
       <div class="row justify-content-center">
       <div class="col-md-12 bg-light p-4 rounded nt-5">
       <div class="form-group p-1 rounded">
        <h4 class="text-center btn btn-success btn-block btn-user btn-block">Evaluation Groups Grade Report </h4>
        <table width="100%" class="table table-striped  table-hover"><hr>
        <h4 class="btn btn-success btn-block btn-user btn-block">Grade Report</h4>
        <thead>
            <tr class="table-btn btn-success">
                <th>Group ID</th>
                <th>No of Members</th>
                <th>Phase 1 </th>
				<th>Phase 2</th>
                <th>Grade</th>
			</tr>
		</thead>
		<tbody>
		<?php
           $group_id = $_GET['group_id'];
			$query=mysqli_query($con,"SELECT * FROM evaluate_phase1,evaluate_phase2,groupp WHERE groupp.group_id = '$group_id' and evaluate_phase1.group_id='$group_id' and evaluate_phase2.group_id='$group_id' ");
			while($row=mysqli_fetch_array($query))
            {
              $num=mysqli_query($con,"select * from member where group_id='".$row['group_id']."'");
			?>
			<tr>
                <td><?php echo $row['group_id']; ?></td>
                <td><?php echo mysqli_num_rows($num); ?></td>
				<td><?php echo $row['ph1_marks']; ?></td>
				<td><?php echo $row['ph2_marks']; ?></td>	
				<td>
                <?php
                 $marks1 = $row['ph1_marks'];
                 $marks2 = $row['ph2_marks'];
                 $total =   $marks1+$marks2;
                 $avg = ($total/200)*100;
                 $grade="";
                 if($avg < 50  )
                 {
                    $grade=" F ";
                    echo $grade;             
                 }
                 else if($avg > 50 && $avg < 60 )
                 {
                    $grade=" D ";
                    echo $grade;             
                 }                 
                 else if($avg > 60 && $avg < 70 )
                 {
                    $grade=" C ";
                    echo $grade;             
                 }  
                 else if($avg > 70 && $avg < 80 )
                 {
                    $grade=" B ";
                    echo $grade;             
                 }
                 else if($avg > 80 )
                 {
                    $grade=" A ";
                    echo $grade;             
                 }
                ?>
                </td>
			</tr>
			<?php
			}
		?>
        </tbody>
        </table><hr>                     
        </div>
        </div>
  		</div>
        </div >
        
  </div>

  <?php 
    include('../../includes/scripts.php');
    
   ?>
  

 


