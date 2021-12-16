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
							<h3 style="color: rgb(134, 37, 77)">Update Profile</h3>
						</div>
					<div class="row gutters">
						<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-profile">
											<div class="user-avatar">
											<img src="img/<?php echo $row['profilePic']; ?>"/>
				                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<form action="" method="POST" >
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<h6 class="mb-2">Personal Details</h6>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="name">Fullname</label>
													<input name ="name" type="text" class="form-control" id="fullName" placeholder="<?= $row['name']; ?>" required>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="email">Email</label>
													<input name ="email" type="email" class="form-control" id="email" value="<?= $row['email']; ?>" readonly>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="password" class="form-label">Password</label>
													<input name="password" type="password" class="form-control" placeholder="password" value="<?= $row['password'] ?>" required>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="form-group">
													<label for="tel" class="form-label">Phone Number</label>
													<input name="tel" type="tel" class="form-control" placeholder="<?= $row['tel']; ?>" pattern="[0]{1}[0-9]{}-[0-9]{7}" required>
												</div>
											</div>
											<div class="mb-3">
												<label class="form-label">Image</label>
												<input class="form-control" name="profilePic" type="file" id="profilePic" value="<?= $row['profilePic'] ?>">
												<small class="text-muted">The image must have a maximum size of 2MB</small>
											</div>	
										</div>
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="text-right">
													<a href="profile.php"> <button type="button" class="btn btn-secondary">Cancel</button></a>
													<input type="submit" name="update" value ="Save" class="btn btn-primary"></input>
												</div>
											</div>
										</div>
									</form>
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

			if(isset($_POST['update']))
			{
				$name = $_POST['name'];
				$password = $_POST['password'];
				$tel = $_POST['tel'];
				//$img = $_FILES['profilePic']['tmp_name'];
				//$image = addslashes(file_get_contents($img));
				//$row = mysql_fetch_object($result);
				$image = $_POST['profilePic'];
				$sqlInsert = "UPDATE admin SET name = '$name', password = '$password', tel = '$tel', profilePic = '$image' WHERE  email='$currentUser'";
				$sql_run = $conn->query($sqlInsert);

				if($sql_run)
				{
					echo '<script type = "text/javascript"> alert("Data Updated") </script>';
					header("Location: profile.php");
				}
				else
				{
					echo '<script type = "text/javascript"> alert("Data Not Updated") </script>';
				}
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
			$conn->close();
			?>
		</div>
		</div>
	</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>