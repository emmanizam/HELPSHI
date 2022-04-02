<?php include "header_admin.php"; 

session_start();
include 'DB.php';
$currentUser = $_SESSION['emailSession'];
$sql = "SELECT * FROM admin WHERE email='$currentUser'";
$result = $conn->query($sql);
$num = 0;

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>

            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">HELPSHI ADMIN</div>
                            <h2 class="page-title" style="color: rgb(134, 37, 77)">Dashboard</h2>
                        </div>
                    </div>
                    <div lass="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card " >
                            <div class="content">
                                <div class="row" style="margin: 50px;">
                                    <div class="col-sm-4">
                                        <div class="icon-big" >
                                            <img src="assets/img/admin/<?php echo $row['profilePic']; ?>" style="border-radius: 50%; width:200px; margin-left: 100px;"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 ">
                                        <div class="detail " >
                                            <span class="number">Hi, <?php echo $row['name']; ?></span>
                                            <hr />
                                            <p class="detail-subtitle"><strong><i class="fas fa-user-shield"></i> Role : </strong> <?php echo $row['role']; ?></p>
                                            <p class="detail-subtitle"><strong><i class="fas fa-envelope"></i> Email : </strong>  <?php echo $row['email']; ?></p>
                                            <p class="detail-subtitle"><strong><i class="fas fa-phone"></i> Phone Number : </strong>  <?php echo $row['tel']; ?></p>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a href="updateprofile.php"> <button type="button" id="submit" name="submit" class="btn btn-outline-success"><i class="fas fa-edit"></i></button></a>
                                                <?php
                                                if ( $row['role'] == "Super Admin") {?>
                                                    <button type="button" class="btn btn-outline-danger" data-id="<?php echo $currentUser ?>" onclick="confirmDelete(this);" disabled><i class="fas fa-trash"></i>
                                                <?php
                                                }
                                                else {?>
                                                    <button type="button" class="btn btn-outline-danger" data-id="<?php echo $currentUser ?>" onclick="confirmDelete(this);"><i class="fas fa-trash"></i>
                                                <?php
                                                }
                                                ?>
											    

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-4 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="">
                                            <div class="icon-big text-center">
                                                <a href="crowdfund.php"><i class="zoom teal fas fa-donate"></i></a>
                                                <p class="detail-subtitle"><a href="crowdfund.php"> <button type="submit" name="submit" class="btn btn-outline-primary"> Manage Crowdfund</button></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-4 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="">
                                            <div class="icon-big text-center">
                                                <a href="blog-admin.php"><i class="zoom blue fas fa-comments"></i></a>
                                                <p class="detail-subtitle"><a href="blog-admin.php"> <button type="submit" name="submit" class="btn btn-outline-primary"> Manage Blog</button></a></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-4 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="">
                                            <div class="icon-big text-center">
                                                <a href="report.php"><i class="zoom orange fas fa-file-alt"></i></a>
                                                <p class="detail-subtitle"><a href="report.php"> <button type="submit" name="submit" class="btn btn-outline-primary"> Manage Report</button></a></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!---Delete confirmation modal starts here-->
             <div id="deleteModal" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete User</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal">×</button>
                                </div>
                    
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this user?<br>This process cannot be undone.</p>
                                    <form method="POST" action="delete-profile.php" id="form-delete-profile">
                                        <input type="hidden" name="id">
                                    </form>
                                </div>
                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="form-delete-profile" class="btn btn-danger">Delete</button>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                    <!---Delete confirmation modal ends here-->
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
    <style>
        .zoom {
            transition: transform .2s; 
        }

        .zoom:hover{
            transform: scale(2);
        }
    </style>
    <script>
        function confirmDelete(self) {
        var id = self.getAttribute("data-id");
    
        document.getElementById("form-delete-profile").id.value = id;
        $("#deleteModal").modal("show");
    }
    </script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>

