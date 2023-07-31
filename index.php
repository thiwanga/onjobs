<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><a href="#"><img src="images/email.png" alt="#"/> admin@gmail.com</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="images/shopping.png" alt="#"/></a> </li>
                           
                           <?php
                              // Start a new session or resume the existing session
                              session_start();

                              // Check if the user is logged in (check for the existence of the 'username' session variable)
                              if (isset($_SESSION['email'])) {
                                 // If logged in, show logout button
                                 echo '<a href="php/logout.php">Logout</a>';
                              } else {
                                 // If not logged in, show login and signup buttons
                                 echo '<a href="signup.php">Login | Signup</a>';
                              }
                           ?>

                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item ">
                                    <a class="nav-link" href="index.php">Home</a>
                                 </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="about.php">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact Us</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                           <form action="search_service.php">
                              <input class="form_sea" type="text" placeholder="Search" name="search">
                              <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="text-bg" style="border: white;">
                     <h1> <span class="blodark"> OnJobs </span> <br>Marketplace</h1>
                     <p>Get your stuff done from $5</p>
                     <a class="read_more" href="#">Shop now</a>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="ban_img">
                     <figure><img src="images/ban_img.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- six_box section -->
      <div class="six_box">
         <div class="container-fluid">
            <div class="row">
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx yellow_bg">
                        <i><a href="./search_service.php?search=COPY+WRITING"><img src="images/categories/Copywriting.png" alt="Copywriting"/></a></i>
                        <span>Copy Writing</span>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx bluedark_bg">
                        <i><a href="./search_service.php?search=DIGITAL+MARKETING"><img src="images/categories/Digital Marketing.png" alt="Digital Marketing"/></a></i>
                        <span>Digital Marketing</span>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx yellow_bg">
                        <i><a href="./search_service.php?search=GRAPHICS+DESIGN"><img src="images/categories/Graphics & Design.png" alt="Graphics & Design"/></a></i>
                        <span>Graphics & Design</span>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx bluedark_bg">
                        <i><a href="./search_service.php?search=LIFESTYLE"><img src="images/categories/Lifestyle.png" alt="LifeStyle"/></a></i>
                        <span>LifeStyle</span>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx yellow_bg">
                        <i><a href="./search_service.php?search=LOGO+DESIGN"><img src="images/categories/logo design.png" alt="Logo Design"/></a></i>
                        <span>Logo Design</span>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-4 pa_left">
                     <div class="six_probpx bluedark_bg">
                        <i><a href="./search_service.php?search=WEBSITE+PROGRAMMING"><img src="images/categories/Website & Programming.png" alt="Website & Programming"/></a></i>
                        <span>Website & Programming</span>
                     </div>
                  </div>
            </div>
         </div>
      </div>
      <!-- end six_box section -->

      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2023 All Rights Reserved. Design by<a href="https://github.com/thiwanga"> Thiwanga Sandaruwan Dasanayaka </a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

