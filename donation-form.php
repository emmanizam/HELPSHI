<?php include "header_public.php"; ?>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="#" class="nav-item nav-link active">Donate</a>
                        <a href="blog.php" class="nav-item nav-link">Blog</a>
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
                        <h2 style="color:#7a2953">Donate Now</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Form Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                    <h5>EVERY DONATION MAKES A DIFFERENCE</h5> 
                    <p>Fill in the form below to donate via online banking</p> 
                </div>
           <div class="contact">
            <div class="container">
               
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="contact-form">
                            
                            <form action="generate_paymentgateway.php" method="POST">

                                <div class="control-group">
                                    <h6 class="required">Name</h6>
                                    <input type="text" class="form-control" name="donor" placeholder="e.g. John Doe" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <h6 class="required">Email</h6>
                                    <input type="email" class="form-control" name="email" placeholder="e.g. johndoe@email.com" required="required" data-validation-required-message="Please enter your email address" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <h6 class="required">Phone Number</h6>
                                    <input type="tel" class="form-control" name="telNo" pattern="[0]{1}[0-9]{}-[0-9]{7}" placeholder="e.g. 01x-xxxxxxx" required="required" data-validation-required-message="Please enter your phone number" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <h6 class="required">Donation Amount</h6>
                                    <input type="number" class="form-control" name="amount" min="1" pattern="[0-9]{,4}" placeholder="e.g. 10" required="required" data-validation-required-message="Please enter the donation amount" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                    <!--<h6>Upload proof donation here: <input name="proof" type="file" id="proof"></input> </h6>
                                    <p class="help-block text-danger"></p>-->
                                <div align="right">
                                    <input class="btn" type="submit" name="submit" value="Proceed"></input>
                                    <input class="btn btn-cancel" type="reset" value="Reset"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </body>
    <!-- donation form End -->
        
<?php include "footer_public.php"; ?>
