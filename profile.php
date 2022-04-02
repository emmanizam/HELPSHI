<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="img/logoatas.png">
    <title>HELPSHI Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
	<link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-pastelpink">
				<a href="dashboard.html"><img src="assets/img/logo/dashboardlogo.png" alt="logo" class="app-logo"></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user" style="color: rgb(134, 37, 77)"></i><i style="font-size: .8em; color: rgb(134, 37, 77)" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="profile.php" class="dropdown-item"><i class="fas fa-address-card" style="color: rgb(134, 37, 77)"></i> Profile</a></li>
                                        <div class="dropdown-divider"></div>
										<li><a href="users.php" class="dropdown-item"><i class="fas fa-user-friends" style="color: rgb(134, 37, 77)"></i> Users</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt" style="color: rgb(134, 37, 77)"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
			<!-- admin profile component -->
			<?php 
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
					<div class="container">
						<div class="page-title">
							<h3 style="color: rgb(134, 37, 77)">My Profile</h3>
						</div>
					<div class="row gutters">
						<div class="mb-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-profile">
											<div class="user-avatar">  
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <img src="assets/img/user/<?php echo $row['profilePic']; ?>"/> 
													<h4><strong><?= $row['name']; ?></strong></h4>
													<h5><?= $currentUser ?></h5>
													<p><?= $row['tel']; ?></p>
												</div>
												<a href="updateprofile.php"> <button type="button" id="submit" name="submit" class="btn btn-success">Update</button></a>
												<a href="#"> <button type="submit" name="submit" class="btn btn-danger">Delete</button></a>
												<!--<a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--Delete Conformation Model-->
                    <!--<div class="col-lg-6">
                        <div class=""> 
                            <div class="card-body text-center">
                                <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h2 class="modal-title">Delete Confirmation</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                        <form accept-charset="utf-8">
                                            <div class="mb-3">
                                                <label for="month" class="form-label">Are you sure you want to permanently delete this post?<br>This process cannot be undone.</label>
                                            </div>
                                            <div class="mb-3" align="center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                <a href="delete-profile.php" type="submit" class="btn btn-danger">Delete</a>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
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
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>


</body>

</html>