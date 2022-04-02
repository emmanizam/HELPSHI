<?php include "header_public.php"; ?>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="donation-form.php" class="nav-item nav-link ">Donate</a>
                        <a href="blog.php" class="nav-item nav-link active">Blog</a>
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
                            <img src="assets/img/blog/<?php echo $row['image']; ?>" />
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


<?php include "footer_public.php"; ?>