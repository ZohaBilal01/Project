<?php 
 session_start();
include('includes/header.php');?>

<section id="page-banner" style="background-image: url('../images/bg/page-banner.jpg');width: 100%;">
    <div class="row">
  <div class="col-sm-1 text-center" > </div><br><br><br><br><br>
    <div class="col-sm-10 text-center mt-5" style="color: black;"><h1>Portal</h1> </div></div><br><br><br></div>
      <br>

<section class="login">
<div class="container col-md-6 bg-success mt-5 card">
 <div class="card o-hidden border-0 shadow-lg my-5 ">
   <div class="card-body p-3">
     <div class="row justify-content-center"> 
         <div class="col-lg-7">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Login Your Account !</h1>
          </div>
           <form action="database/login/process.php" method="POST" class="user">
            <div class="form-group">
              <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Email" required>
            </div>
              <div class="form-group">
                <input type="password" name="password" maxlength="4" pattern="\d*" title="Password  Should Contain Only Numbers" class="form-control form-control-user" id="password" placeholder="Password" required>
              </div>
               <hr>
              <div class="text-center">
               <div style="color: green; font-size: 15px;">
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
              <button type="submit" name="login" class="btn btn-success btn-block btn-user btn-block">Login Account</button>
              </div>
          </form>
          <div class="text-center">
            <a class="small" href="register.php">Create an Account!</a>
          </div>

      </div>
    </div>
  </div>
</div>
</section>
<br><br><br>

<?php
include('includes/footer.php');
?>

  <?php 
    include('includes/scripts.php');
   ?>
   

 


