<?php include "header_public.php"; ?>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="donation-form.php" class="nav-item nav-link">Donate</a>
                        <a href="#" class="nav-item nav-link active">Blog</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="admin.html" button class="nav-item nav-link">Admin Login</button></a>
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
                    <h2 style="color:#7a2953">Blog</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <p>Learn More About Period Poverty</p>
                </div>
                <div class="row blog-page">
                    <?php 
                        include 'DB.php';
                        $sql = "SELECT * FROM blog";
                        $result = $conn->query($sql);
                        $num = 0;

                        if($result->num_rows > 0){   
                            while($row = $result->fetch_assoc()){
                                $currentPost = $row['postID'];
                    ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="1s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <!--<img src="img/blog-6.jpg" alt="Blog">-->
                              
                            </div>
                            <div class="blog-text">
                                <h2><?= $row['title']; ?></h2>
                                <div class="blog-meta">
                                    <p><i class="far fa-calendar-alt"></i><?= $row['dates']; ?></p>
                                </div>
                                <a class="btn" href="read-more.php?id= <?php echo $currentPost ?>">Read More <i class="fa fa-angle-right"></i></a>
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
                </div>
            </div>
        </div>
        </body>
        <!-- Blog End -->
        
<?php include "footer_public.php"; ?>

