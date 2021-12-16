<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="img/logoatas.png">
        <title>HELPSHI</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="HELPSHI" name="keywords">
        <meta content="HELPSHI" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="fa fa-envelope"></i>
                                <h2>theshesocietymy@gmail.com</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
            <a href="index.php"><img src="assets/img/dashboardlogo.png" alt="logo" class="app-logo"></a></nav>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="#" class="nav-item nav-link">Donate</a>
                        <a href="#" class="nav-item nav-link">Request Help</a>
                        <a href="#" class="nav-item nav-link">Report Help</a>
                        <a href="#" class="nav-item nav-link active">Blog</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1><strong>Blog</strong></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Single Post Start-->
        <?php 
        include 'DB.php';
        $currentPost = $_GET['id'];
        $sql = "SELECT * FROM blog WHERE postID='$currentPost'";
        $sql_name = "SELECT admin.name, admin.email
            FROM admin
            INNER JOIN blog ON admin.email = blog.author_email";
        $res = $conn->query($sql_name);	
        $result = $conn->query($sql);
        $num = 0;

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                while ($row2 = $res->fetch_assoc()){
                    if($row['author_email'] == $row2['email']){
                        $name = $row2['name'];
                    }
                    else continue;
                }  
        ?>
        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content wow fadeInUp">
                            <h1><strong><?= $row['title']; ?></strong></h1>
                            <h6>by <strong><?= $name ?></strong></h6>
                            <h6><?= $row['dates']; ?></h6><br>
                            <img src="img/<?php echo $row['image']; ?>" style=" height: 450px;"/>
                            <p align="justify"><?= $row['content']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        else{
            echo "No results found";
        }
        
        $conn->close();
        ?>
        <!-- Blog End -->


        <!-- Footer Start -->
        <div class="footer wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                <div class="container">
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; <a href="#">HELPSHI</a>, All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Designed By GIT Group</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
