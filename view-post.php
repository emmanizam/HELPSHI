<?php include "header_admin.php"; ?>

			<!-- start of view-post component -->
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
            <div class="content">
                <div class="container">
					<div class="container">
						<div class="page-title">
						<h3>Blog Post
                            <a href="blog-admin.php" class="btn btn-sm btn-outline-primary float-end "><i class="fas fa-caret-left"></i> Return</a>
                        </h3>
						</div>
					<div class="row gutters">
						<div class="mb-12">
							<div class="card h-100">
								<div class="card-body">
									<div class="account-settings">
										<div class="user-avatar">
											<!--This is only interface without PHP-->
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<h4><strong><?= $row['title']; ?></strong></h4>
												<p><strong>by <?= $name ?></strong><br><?= $row['dates']; ?></p>
                                                <p><center><img src="assets/img/blog/<?php echo $row['image']; ?>" style=" height: 450px;"></center> </p>
												<p align="justify"><?= $row['content']; ?></p>
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