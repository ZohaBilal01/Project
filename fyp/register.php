<?php
session_start();
include('includes/header.php');?>


<section id="page-banner" class="page-banner-main-block" style="background-image: url('../images/bg/page-banner.jpg');width: 100%;">
  <div class="row">
<div class="col-sm-1 text-center" > </div><br><br><br><br><br>
  <div class="col-sm-10 text-center mt-5" style="color: black;"><h1>Portal</h1> </div></div><br><br><br></div>
    <br>

<section class="register">
<div class="container col-md-6 bg-success mt-4 card">
 <div class="card o-hidden border-0 shadow-lg my-5 ">
   <div class="card-body p-3">
     <div class="row justify-content-center">
         <div class="col-lg-7">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-3">Register Your Account !</h1>
          </div>
          <hr>
          <form action="database/registration/process.php" method="POST" class="user">
          
              <div class="form-group">
                <input type="text" name="username" maxlength="40" class="form-control form-control-user" id="username" placeholder="Enter User Name" required>
              </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Enter Email Address" required>
            </div>
              <div class="form-group">
                <input type="password" name="password" maxlength="4" pattern="\d*" title="Password  Should Contain Only Numbers" class="form-control form-control-user" id="password" placeholder="Enter Password " required>
              </div>
              <hr>
              <div class="text-center">
              <div style="color: red; font-size: 15px;">
			      <?php
                     			    
			    	if(isset($_SESSION['error_msg'])){
				    	echo $_SESSION['error_msg'];
				  	   unset($_SESSION['error_msg']);
			    	}
		     	?>
	       	  </div>
              </div>
              <hr>
              <div class="form-group ">
              <button type="submit" name="register" class="btn btn-success btn-block btn-user btn-block">Register Account</button>
              </div>
          </form>  
          <div class="text-center">
            <a class="small" href="index.php">Already have an account? Login!</a>
          </div>
       
      </div>
    </div>
  </div>
</div>
          </section>
          <br><br>
<?php
include('includes/footer.php');
?>
<?php include('includes/scripts.php');?>

 


