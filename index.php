<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2020 .
**********************************************************************************************************  -->

<html lang="en">

<head>
  <title>Home</title>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description" content="Industrial" />
<meta name="keywords" content="Industrial, html template,industry template,">
<meta name="author" content="udayraj" />
<meta name="MobileOptimized" content="320" />
<link rel="icon" type="image/icon" href="images/favicon/favicon.ico"> <!-- favicon-icon -->
<!-- theme style -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/> <!-- fontawesome css -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,500i,700,900" rel="stylesheet"> <!-- google font -->
<link href="css/themify-icons.css" rel="stylesheet" type="text/css"/> <!-- themify icons css -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
<link href="css/style.css" rel="stylesheet" type="text/css"/> <!-- custom css -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
</head>
<!-- end theme style -->
</head>
<!-- end head -->
<!--body start-->
<body>
<!--  top bar -->
  <div class="container-fluid mt-4">
    <div class="row" style="width:100%;">
      <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
        <div class="logo1">
          <a href="index.php">
            <img height="43" width="191" src="logo.png" >
          </a>
        </div>
      </div>
      
       
             <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
            <div class="info-nav" style="font-family:'Roboto', sans-serif;font-size:14px;line-height:1.57;letter-spacing:0.3px;">
                   <div class="info-nav-heading" style="font-size:14px;font-weight:300;color:rgb(160, 97, 97);">Phone Number</div>
              <div class="info-nav-dtl" ><a href="tel:#" style="font-size:14px;font-weight:500;color:#232323;">042-3594281</a></div>
            </div>
            </div>
            <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
            <div class="info-nav">
              <div class="info-nav-heading" style="font-size:14px;font-weight:300;color:rgb(160, 97, 97);">Email Address:</div>
              <div class="info-nav-dtl"><a href="mailto:#" style="font-size:14px;font-weight:500;color:#232323;">info@FYPPortal.com</a></div>
            </div>
          </div>
            <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
            <div class="info-nav">
              <div class="info-nav-heading" style="font-size:14px;font-weight:300;color:rgb(160, 97, 97);">Contact</div>
              <div class="info-nav-dtl" style="font-size:14px;font-weight:500;color:#232323;">COMSATS University Islamabad</div>
            </div>
          </div>
          </div>
      </div>
  
<!--  end top bar -->
<!--  navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-4">
    <a class="navbar-brand" href="index.html">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active" style="font-family: Arial, Helvetica, sans-serif; margin-left: 0.5in;">
          <a class="navbar-brand" href="about-us.html">About us<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active" style="font-family: Arial, Helvetica, sans-serif; margin-left: 0.5in;">
          <a class="navbar-brand" href="searchprojects.php">Search Project</a>
        </li>
        <li class="nav-item " style="font-family: Arial, Helvetica, sans-serif; margin-left: 0.5in;">
          <a a class="navbar-brand" href="contact.html" tabindex="-1" aria-disabled="true">
            Contact Us
          </a>
        </li>
        
        <li class="nav-item" style="font-family: Arial, Helvetica, sans-serif; margin-left: 0.5in;">
            <a class="navbar-brand" href="fyp/index.php" tabindex="-1" aria-disabled="true">Portal</a>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<!--  end navigation -->
<!--  page banner -->
<!-- counter  -->
  <section id="counter" class="counter-main-block">
    <div class="parallax" style="background-image: url('images/bg/counter1.JFIF')">
       <div class="overlay-bg" style="background-image: url('images/bg/facts-bg.jpg')"></div>  
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="counter-section">
              <h2 class="counter-heading"><span>Choose the right FYP Idea  </span> @ the Right Place.</h2>
            </div>
          </div>
            <div class="col-md-3 col-sm-4">
              <div class="counter-block">
                <h1 class="counter-number counter"><?php 
                include 'connection.php';
                $comp_projects=0;
                $sql6 =mysqli_query($con,"SELECT * FROM groupp");
                foreach($sql6 as $per)
                {
                  $user = $per['user_id'];
                  $checker=mysqli_num_rows(mysqli_query($con,"SELECT * FROM evaluate_phase2 WHERE user_id='$user'"));
                  if($checker == 1)
                  {
                    $comp_projects++;
                  }
                }
                
                echo $comp_projects;
                ?></h1>
                <h6 class="counter-text">completed Projects</h6>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="counter-block">
                <h1 class="counter-number counter"><?php 
               $sql5 =mysqli_num_rows(mysqli_query($con,"SELECT * FROM groupp"));
               echo $sql5;
                ?></h1>
                <h6 class="counter-text">Ongoing Projects</h6>
              </div>
            </div>
            <div class="col-md-3 col-sm-4">
              <div class="counter-block">
                <h1 class="counter-number counter">
                <?php 
                
                $sql =mysqli_num_rows(mysqli_query($con,"SELECT * FROM register"));
                echo $sql;
                ?>
                </h1>
                
                <h6 class="counter-text">No. of Users</h6>
              </div>
        </div>
      </div>
    </div>
  </section>
<!-- end counter  -->
<!--  slider -->
  <section id="home-slider" class="home-slider">

    <div class="item home-slider-bg" style="background-image: url('images/bg/slider3.jpg'); height: 250; width: 1520; ">
      <div class="container">
        <div class="slider-dtl top-effect">
          <h1 class="slider-heading">Building Up <span> Your Vision,</span>Towards Future</h1>
          <h5 class="slider-sub-heading">Get Ideas Regarding Your Project</h5>
          
        </div>  
      </div>      
    </div>



    <div class="item home-slider-bg" style="background-image: url('images/bg/sliderpic2.JPG'); height: 200; width: 1420; ">
      <div class="container">
        <div class="slider-dtl top-effect">
          <h1 class="slider-heading">Building Up <span> Your Vision,</span>Towards Future</h1>
          <h5 class="slider-sub-heading">Get Ideas Regarding Your Project</h5>
          
        </div>  
      </div>      
    </div>
    <div class="item home-slider-bg" style="background-image: url('images/bg/slider 5.PNG'); height: 250; width: 1420; ">
      <div class="container">
        <div class="slider-dtl top-effect">
          <h1 class="slider-heading">Building Up <span> Your Vision,</span>Towards Future</h1>
          <h5 class="slider-sub-heading">Platform For Students To Get FYP Ideas</h5>
          
        </div>  
      </div>      
    </div>
  
    <div class="item home-slider-bg" style="background-image: url('images/bg/slider 4.JPG'); height: 80; width: 1220;">
      <div class="container">
        <div class="slider-dtl left-effect">
                   <h1 class="slider-heading">Building Up <span> Your Vision,</span>Towards Future</h1>
          <h5 class="slider-sub-heading">Platform For Students To Get FYP Ideas
            </h5>
         
        </div> 
      </div>      
    </div>

  </section>
<!--  end slider -->
<!-- solutions  -->
<section id="about" class="about-main-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">
        <div class="about-block">
          <h3 class="about-heading">About Us</h3>
          <p>Final Year Project (FYP) is an important subject which the student has to take in order to graduate from the university. The Final Year Project is comprised of Phase 1 and phase 2. Students must pass the Phase 1 in order to take the Phase 2. Students who are taking the project have to build a system or application that is related to Information Technology (IT) at the end of the semester to pass.</p>
            <p> The FYP Management Portal is meant to help the FYP Committee by reducing the workload, making management of records easier and records are long-lasting. Italso allows the user to produce report easily with the clicks of few buttons located on the screen. </p>

          <a href="about-us.html" class="plain-btn">About More</a>
        </div>        
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4">


        <div class="about-features-block">
          <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="about-features-icon">
                <span class="ti-world"></span>
              </div>
            </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
              
                <h6 class="about-features-heading">Expert Advise</h6>
                <p>Get the best advise for your FYP and other projects.</p>
              
            </div>
          </div>
        </div>

        <div class="about-features-block">
          <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="about-features-icon">
                <span class="ti-medall"></span>
              </div>
            </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
              
              <h6 class="about-features-heading">Deliverables Management</h6>
              <p>Manage the deliverables of FYP as per defined in presenation.</p>
              
            </div>
          </div>
        </div>

        <div class="about-features-block">
          <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <div class="about-features-icon">
                <span class="ti-truck"></span>
              </div>
            </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
              
              <h6 class="about-features-heading">Online Status Check</h6>
              <p>Check status of on going Fyps and their completion time.</p>
              
            </div>
          </div>
        </div>

        </div>

        
        <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4" style="padding-top: 3%; padding-left: 2%;">
       
          <img src="images/about/homeabout.JPEG";  class="img-fluid img-responsive" alt="about" style="width: 500px;height: 350px;">
        
      </div>
                 
      </div>        
      
    </div>
  
</section>

  






  <div class="container-fluid">
    <h2 style="color:green;" class="text-center"><b>Latest Projects</b></h2>
  </div>
  <div  style="margin-top:10px; " class="container">
    <h2 class="text-center" style="color: green;">FYP Summary</h2>
    <table style="margin-top:30px; "class="table table-bordered" >
        <thead>
            <tr>
                <th style="color: green;">Group ID</th>
                <th style="color:green;">No of Members</th>
                <th style="color:green;">Project Title</th>
        <th style="color:green;">Project description</th>
        
				
			</tr>
		</thead>
		<tbody>
    <?php
    $sql7 =mysqli_query($con,"SELECT * FROM groupp");
      foreach($sql7 as $comp)
      {
			?>
			<tr>
                <td><?php echo $comp['group_id']; ?></td>
                <?php
                $g_id=$comp['group_id'];
                $sql8=mysqli_num_rows(mysqli_query($con,"SELECT * FROM member WHERE group_id='$g_id'"));
                ?>
                <td><?php echo $sql8; ?></td>
                <?php
               $sql8=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM groupp WHERE group_id='$g_id'"));

                ?>
				<td><?php echo $sql8['project_title']; ?></td>
        <td><?php echo $sql8['project_description']; ?></td>
     
        
                
			</tr>
			<?php
			}
		?>
        </tbody>
        </table>        

    </div>





  
  <div class="container-fluid">
    <h2 style="color:green;" class="text-center"><b>Completed Projects</b></h2>
  </div>
  <div  style="margin-top:10px; " class="container">
    <h2 class="text-center" style="color: green;">Details</h2>
    <table style="margin-top:30px; "class="table table-bordered" >
        <thead>
            <tr>
                <th style="color: green;">Group ID</th>
                <th style="color:green;">No of Members</th>
                <th style="color:green;">Project Title</th>
                <th style="color:green;">Project description</th>
			</tr>
		</thead>
		<tbody>
    <?php
     $sql6 =mysqli_query($con,"SELECT * FROM groupp");
     foreach($sql6 as $per)
     {
       $user = $per['user_id'];
       $id = $per['group_id'];
       $checker=mysqli_num_rows(mysqli_query($con,"SELECT * FROM evaluate_phase2 WHERE user_id='$user'"));
       if($checker == 1)
       {
         $members=mysqli_num_rows(mysqli_query($con,"SELECT * FROM member WHERE group_id='$id'"));
			?>
			<tr>
                <td><?php echo $id; ?></td> 
                <td><?php echo $members; ?></td>
                <td><?php echo $per['project_title']; ?></td>
                <td><?php echo $per['project_description']; ?></td>
			</tr>
      <?php
       }
     }
		?>
        </tbody>
        </table>        

    </div>

<br><br>
<br><br>









    
<!-- end solutions  -->
<!-- featured product  -->
  <section id="featured" class="featured-main-block">
    <div class="section">
      <div class="container">
        <h3 class="section-heading">Completed Projects</h3>
      </div>
    </div>
    <div class="container">
      <div id="featured-slider" class="featured-slider">
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/11.JPG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
            <h5 class="featured-heading">01 Health Guide (Medical.
guidance online system) </h5>
<h6 style="color: whitesmoke;"> Supervisor:</h6>
            <h6 style="color: white;"> Ms. Saman Safdar</h6>
          </div>
        </div>
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/222.JPG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
            <h5 class="featured-heading">02  Umeed (Online Psychological Counselling System)

               
               </h5>
              <h6 style="color: whitesmoke;"> Supervisor:</h6>
                          <h6 style="color: white;"> Ms. Humaira Afzal</h6>
          </div>
        </div>
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/3.JPG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
            <h5 class="featured-heading">03  Music Instrument Rental System (MIRS)

             </h5>
              <h6 style="color: whitesmoke;"> Supervisor:</h6>
                          <h6 style="color: white;"> Ms. Sabeen Amjad</h6>
          </div>
        </div>
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/56.JPEG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
        <h5 class="featured-heading">04 Course Folder System  </h5>
<h6 style="color: whitesmoke;"> Supervisor:</h6>
            <h6 style="color: white;"> shuja akbar</h6>
          </div>
        </div>
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/57.JPEG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
            <h5 class="featured-heading">05  Online education counsellor

               
               </h5>
              <h6 style="color: whitesmoke;"> Supervisor:</h6>
                          <h6 style="color: white;">Ms saman safdar</h6>
          </div>
        </div>
        <div class="item featured-block"> 
          <div class="featured-img">
            <img height="240" width="270" src="images/projects/58.JPEG" class="img-responsive" alt="featured">
            <div class="overlay-bg"></div>
          </div>
          <div class="featured-dtl">
            <h5 class="featured-heading">06  RecycleiT

             </h5>
              <h6 style="color: whitesmoke;"> Supervisor:</h6>
                          <h6 style="color: white;">Ms. Sabeen amjad</h6>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
<!-- end featured product  -->
<!-- quote -->
  <section id="quote" class="quote-main-block" style="background-image: url('images/bg/quote-bg.jpg')"> 
    <div class="quote-text text-center">
      <p><b>"An investment in knowledge pays the best interest.”</b></p>
    </div>       
  </section>
<!-- end quote  -->
<!-- about -->
 
<!-- end about  -->
<!-- testimonials  -->
  <section id="testimonials" class="testimonials-main-block" style="background-image: url('images/bg/testimonial-bg.jpg')">
    <div class="container">
      <div class="section">
        <h3 class="section-heading">Testimonials</h3>
      </div>
      <div class="row">
        <div id="testimonials-slider" class="testimonials-slider">
          <div class="item">
            <div class="testimonial-block">
              <div class="testimonial-detail">
                <p>“It is really a great work”
                </p> 
                <div class="testimonial-arrow">
                  <img src="images/icons/testimonial-arrow-2.png" alt="arrow">
                </div>                              
              </div>               
              <div class="testimonial-img">
                <img src="images/testimonial/testimonial-1.JPG" class="img-responsive" alt="testimonial">
              </div>
              <div class="testimonial-client-dtl">
                <div class="testimonial-client">Dr. Syed Asad Hussain <span>- Professor</span></div>
                <div class="rating">     
                  <ul>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                </div> 
              </div>
            </div>            
          </div>    
          <div class="item">
            <div class="testimonial-block">
              <div class="testimonial-detail">
                <p>“I even believe in helping a student function more product.
                ”
                </p>
                <div class="testimonial-arrow">
                  <img src="images/icons/testimonial-arrow-2.png" alt="arrow">
                </div>
              </div>
              <div class="testimonial-img">
                <img src="images/testimonial/testimonial-2.JPG" class="img-responsive" alt="testimonial">
              </div>
              <div class="testimonial-client-dtl">
                <div class="testimonial-client">Dr. Rao Muhammad Adeel Nawab <span>- Asst Professor</span></div>
                <div class="rating">     
                  <ul>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  </ul>
                </div> 
              </div>
            </div>            
          </div>     
        </div>
      </div>
    </div>
  </section>
<!-- end testimonials  -->

<!-- team  -->
 
<!-- end team  -->
<!--  clients -->
 
<!--  end call out -->
<!--  footer -->
<footer id="footer" class="footer-main-block" style="background-image: url('images/bg/footer-bg.jpg')">
  <div class="footer-block">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="footer-about footer-widget">
            <h5 class="footer-heading">About Us</h5>
            <p>The FYP is a student-driven learning experience, and it gives you the opportunity to study a topic of your own choosing in depth and at a point when you are reaching academic maturity. A successful FYP combines the skills of acquiring, managing and critically analysing information with those of planning, collating and communicating.</p>     
            <a href="about-us.html" class="plain-btn">About More</a>     
          </div>            
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-solutions footer-widget">
            <h5 class="footer-heading">Our Solutions</h5>
            <ul>
            <li><a href="index.php">Home</a></li>
              <li><a href="about-us.html">About US</a></li>
              <li><a href="searchprojects.php">Search Projects</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="fyp/index.php">Portal</a></li>
             
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-news footer-widget">
            <h5 class="footer-heading">Latest News</h5>
            <ul>
              <li><a href="#">Here’s How Advanced Manufacture Is Transforming The Factory</a> - July 20, 2020</li>
              <li><a href="#">Here’s How Advanced Manufacture Is Transforming The Factory</a> - July 20, 2020</li>
            </ul>           
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="footer-contact footer-widget">
            <h5 class="footer-heading">Quick Contact</h5>
            <p>If you want to contact us about any issue, our support available to help you 8am-7pm Monday to Saturday.</p>
            <ul class="footer-address">
              <li><span>Address:</span> COMSATS University Islamabad</li>
              <li><span>Call:</span> <a href="tel:#">042-4545588</a></li>
              <li><span>Email:</span> <a href="mailto:#">info@FYPPortal.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>      
  </div>
  <div class="copyright" style="background-image: url('images/bg/copy-bg.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="copyright-text">
            <p>FYP Management System | &copy; 2020. | All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-sm-6">
         
        </div>
      </div>
    </div>
  </div>
</footer>
<!--  end footer -->
<!-- jquery -->
<script type="text/javascript" src="js/jquery.min.js"></script> <!-- jquery library js -->
<script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- bootstrap js -->
<script type="text/javascript" src="js/menumaker.js"></script> <!-- menumaker js -->
<script type="text/javascript" src="js/owl.carousel.js"></script> <!-- owl carousel js -->
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script> <!-- magnify popup js -->
<script type="text/javascript" src="js/jquery.elevatezoom.js"></script> <!-- product zoom js -->
<script type="text/javascript" src="js/jquery.ajaxchimp.js"></script> <!-- mail chimp js -->
<script type="text/javascript" src="js/smooth-scroll.js"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="js/waypoints.min.js"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="js/jquery.counterup.js"></script> <!-- facts count js-->
<script type="text/javascript" src="js/price-slider.js"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="js/theme.js"></script> <!-- custom js -->  
<!-- end jquery -->
</body>
<!--body end -->


</html>