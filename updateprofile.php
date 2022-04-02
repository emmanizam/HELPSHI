<?php include "header_admin.php"; ?>

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
							<h3 style="color: rgb(134, 37, 77)">Update Profile <a href="dashboard.php" class="btn btn-sm btn-outline-primary float-end "><i class="fas fa-caret-left"></i> Return</a></h3>
						</div>
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-profile">
											<div class="user-avatar">
											<img src="assets/img/admin/<?php echo $row['profilePic']; ?>"/>
				                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="ccol-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card h-100">
								<div class="card-body">
									<form action="" method="POST" enctype="multipart/form-data" >
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
												<input class="form-control" name="image" type="file" id="image" >
												<small class="text-muted">The image must have a maximum size of 2MB</small>
											</div>	
										</div>
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="text-right" align='right'>
													<a href="dashboard.php"> <button type="button" class="btn btn-secondary">Cancel</button></a>
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
				$image =$_FILES['image']['name'];
				    $dir = "assets/img/admin/";
				    $file = $dir . basename($_FILES['image']['name']);
				    move_uploaded_file($_FILES['image']['tmp_name'],$dir.$image);
				    $imageFileType = strtolower(pathinfo($dir,PATHINFO_EXTENSION));
				    
				    $extensions_arr = array("jpg","jpeg","png","gif");
				    if( in_array($imageFileType,$extensions_arr) ){
				            
				    
				    
				    }

				$sqlInsert = "UPDATE admin SET name = '$name', password = '$password', tel = '$tel', profilePic = '$image' WHERE  email='$currentUser'";
				$sql_run = $conn->query($sqlInsert);

				if($sql_run)
				{
					echo '<script type = "text/javascript"> alert("Data Updated") </script>';
  					echo "<script type = 'text/javascript'> location.href = 'dashboard.php'</script>";
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