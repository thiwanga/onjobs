<?php

    // Include the database connection file
    require './php/db_connection.php';

    // Check if the product ID is provided as a query parameter
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        // Perform the query to fetch the product details from the database
        $sql = "SELECT * FROM services WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row['title'];
            $description = $row['description'];
            $image = $row['image'];
            // Additional fields can be retrieved similarly
        } else {
            echo "Product not found.";
            exit;
        }
    } else {
        echo "Invalid product ID.";
        exit;
    }

    // Close the database connection
    $conn->close();
?>

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
        <title>Buy Now</title>
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

        <style>
            /* Center the table */
            table {
                margin: 0 auto;
                width: 50%;
                border-collapse: collapse;
            }

            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            img {
                max-width: 100%;
            }

            /* Center the button */
            .buy-now-btn {
                display: block;
                margin: 0 auto;
                text-align: center;
                margin-top: 20px;
            }
        </style>

    </head>
    <!-- body -->
    <body class="main-layout footer_to90 about_page">
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
                            <li><a href="#"><img src="images/email.png" alt="#"/> admin@onjobs.com</a> </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <a class="logo" href="index.html"><img src="images/logo.png" alt="#"/></a>
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
        <br><br>
        <!-- Add your HTML code here to display product details in the centered table -->
        <table>
            <tr>
                <th colspan="2"><h2><?php echo $title; ?></h2></th>
            </tr>
            <tr>
                <td colspan="2"><p><?php echo $description; ?></p></td>
            </tr>
            <tr>
                <td colspan="2"><img src="./admin/uploads/<?php echo $image; ?>" alt="Product Image"></td>
            </tr>
            <!-- Additional table rows for other product details if needed -->
        </table>

        <!-- Center the "Buy Now" button -->
        <div class="buy-now-btn">
            <form action="buy_now.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="submit" value="Pay Now">
            </form>
        </div>
        <br><br>

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

