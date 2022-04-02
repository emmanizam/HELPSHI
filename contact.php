<?php include "header_public.php"; ?>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="donation-form.php" class="nav-item nav-link">Donate</a>
                        <a href="blog.php" class="nav-item nav-link ">Blog</a>
                        <a href="#" class="nav-item nav-link active">Contact</a>
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
                        <h2 style="color:#7a2953">Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Request Help Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h5>WE CAN HELP YOU</h5>
                    <p>Reach us out if you need help or if you have question.</p>
                </div>
                
                <div class="row">
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">
                            <div id="success"></div>   
                            <form method="POST">
                                <div class="control-group">
                                    <h6 class="required">Name</h6>
                                    <input type="text" class="form-control" id="contactName" name="contactName" placeholder="e.g. John Doe" required="required" data-validation-required-message="Please enter your name"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <h6 class="required">Email</h6>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="e.g. johndoe@email.com" required="required" data-validation-required-message="Please enter your valid email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <h6 class="required">Message</h6>
                                    <textarea class="form-control" id="message" name="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div align="right">
                                    <input class="btn" type="submit" id="submit" name="submit"></input>
                                    <a href="index.php" button class="btn-cancel" type="reset" id="cancel">Cancel</button></a>
                                </div>
                                <?php
                                if(isset($_POST['submit']))
                                {
                                    include 'DB.php';

                                    $contactName = $_POST['contactName'];
                                    $email = $_POST['email'];
                                    $message = $_POST['message'];
                                    $currdate = date("Y-m-d");

                                    //$img = addslashes(file_get_contents($img));
                                    $sqlCreate = "INSERT INTO contact (name, email, message, date) 
                                        VALUES ('$contactName', '$email',  '$message', '$currdate')";
                                    $insert = $conn->query($sqlCreate);

                                    if($insert)
                                    {
                                        echo '<script type = "text/javascript"> alert("Your message is sent."); window.location.replace("index.php"); </script>';
                                    }
                                    else
                                    {
                                        echo '<script type = "text/javascript"> alert("An error occured! Please try again.") </script>';
                                    }
                                    
                                }
                                
                           
                            ?>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>
        <!--contact End -->
        
<?php include "footer_public.php"; ?>

