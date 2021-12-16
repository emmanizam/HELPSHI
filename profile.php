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
				<a href="dashboard.html"><img src="assets/img/dashboardlogo.png" alt="logo" class="app-logo"></a>
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
                                        <li><a href="index.php" class="dropdown-item"><i class="fas fa-sign-out-alt" style="color: rgb(134, 37, 77)"></i> Logout</a></li>
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
										    	<img src="img/<?php echo $row['profilePic']; ?>"/>   
												<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
													<h4><strong><?= $row['name']; ?></strong></h4>
													<h5><?= $row['email']; ?></h5>
													<p><?= $row['tel']; ?></p>
												</div>
												<a href="updateprofile.php"> <button type="button" id="submit" name="submit" class="btn btn-success">Update</button></a>
												<a href="delete-process.php"> <button type="button" id="delete" name="delete" class="btn btn-danger">Delete</button></a>
											</div>
										</div>
									</div>
								</div>
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
		</div>
	</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>


</body>

</html>